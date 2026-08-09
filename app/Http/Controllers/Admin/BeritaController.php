<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::orderBy('published_at', 'desc')->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        $newsList = $query->get();

        $totalNews = Berita::count();
        $publishedCount = Berita::where('is_published', true)->count();
        $draftCount = Berita::where('is_published', false)->count();
        $totalViews = Berita::sum('views');

        return view('admin.berita', compact(
            'newsList',
            'totalNews',
            'publishedCount',
            'draftCount',
            'totalViews'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'summary'      => ['nullable', 'string', 'max:500'],
            'content'      => ['required', 'string'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'images'       => ['nullable', 'array', 'max:5'],
            'images.*'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'author'       => ['nullable', 'string', 'max:100'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $uploadedCount = $request->hasFile('images') ? count($request->file('images')) : 0;
        if ($request->hasFile('image')) $uploadedCount++;
        if ($uploadedCount > 5) {
            return back()->withErrors(['images' => 'Maksimal 5 foto yang dapat diunggah.'])->withInput();
        }

        $imagesList = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagesList[] = $file->store('berita', 'public');
            }
        }
        if ($request->hasFile('image')) {
            $single = $request->file('image')->store('berita', 'public');
            if (!in_array($single, $imagesList)) {
                array_unshift($imagesList, $single);
            }
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        Berita::create([
            'title'        => $request->title,
            'slug'         => $slug,
            'summary'      => $request->summary ?: Str::limit(strip_tags($request->content), 180),
            'content'      => $request->content,
            'image'        => $imagesList[0] ?? null,
            'images'       => $imagesList,
            'author'       => $request->author ?: 'Admin Desa Bade',
            'is_published' => $request->has('is_published') ? (bool) $request->is_published : true,
            'published_at' => $request->published_at ?: now(),
        ]);

        return back()->with('success', 'Berita baru berhasil ditambahkan!');
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'summary'      => ['nullable', 'string', 'max:500'],
            'content'      => ['required', 'string'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'images'       => ['nullable', 'array', 'max:5'],
            'images.*'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'author'       => ['nullable', 'string', 'max:100'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        // Hitung total foto setelah proses
        $existingCount = count($berita->images ?: ($berita->image ? [$berita->image] : []));
        $deletedCount  = $request->has('delete_images') ? count((array) $request->input('delete_images', [])) : 0;
        $newCount      = ($request->hasFile('images') ? count($request->file('images')) : 0) + ($request->hasFile('image') ? 1 : 0);
        $totalAfter    = $existingCount - $deletedCount + $newCount;
        if ($totalAfter > 5) {
            return back()->withErrors(['images' => 'Total foto tidak boleh lebih dari 5. Hapus beberapa foto lama terlebih dahulu.'])->withInput();
        }

        $data = [
            'title'        => $request->title,
            'summary'      => $request->summary ?: Str::limit(strip_tags($request->content), 180),
            'content'      => $request->content,
            'author'       => $request->author ?: 'Admin Desa Bade',
            'is_published' => $request->has('is_published') ? (bool) $request->is_published : false,
        ];

        if ($request->filled('published_at')) {
            $data['published_at'] = $request->published_at;
        }

        $existingImages = $berita->images ?: ($berita->image ? [$berita->image] : []);
        $imagesChanged = false;

        // Process deletion of selected images
        if ($request->has('delete_images')) {
            $toDelete = (array) $request->input('delete_images', []);
            if (!empty($toDelete)) {
                $imagesChanged = true;
                foreach ($toDelete as $delImg) {
                    $delClean = trim($delImg, '/');
                    $existingImages = array_values(array_filter($existingImages, function($img) use ($delClean) {
                        return trim($img, '/') !== $delClean;
                    }));
                    if (Storage::disk('public')->exists($delClean)) {
                        Storage::disk('public')->delete($delClean);
                    }
                }
            }
        }

        // Process new multiple uploads
        if ($request->hasFile('images')) {
            $imagesChanged = true;
            foreach ($request->file('images') as $file) {
                $existingImages[] = $file->store('berita', 'public');
            }
        }

        // Process single cover upload
        if ($request->hasFile('image')) {
            $imagesChanged = true;
            $single = $request->file('image')->store('berita', 'public');
            array_unshift($existingImages, $single);
        }

        if ($imagesChanged) {
            $existingImages = array_values(array_unique(array_filter($existingImages)));
            $data['images'] = $existingImages;
            $data['image']  = !empty($existingImages) ? $existingImages[0] : null;
        }

        if ($berita->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            while (Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
            $data['slug'] = $slug;
        }

        $berita->update($data);

        return back()->with('success', 'Berita berhasil diperbarui!');
    }

    public function togglePublish(Berita $berita)
    {
        $berita->is_published = !$berita->is_published;
        $berita->save();

        $statusText = $berita->is_published ? 'diterbitkan' : 'dijadikan draf';
        return back()->with('success', "Status berita berhasil {$statusText}!");
    }

    public function destroy(Berita $berita)
    {
        if (!empty($berita->images) && is_array($berita->images)) {
            foreach ($berita->images as $img) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }
        }
        if ($berita->image && Storage::disk('public')->exists($berita->image)) {
            Storage::disk('public')->delete($berita->image);
        }
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }
}
