<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukBelanja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BelanjaController extends Controller
{
    public function index(Request $request)
    {
        $query = ProdukBelanja::orderBy('urutan', 'asc')->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $products = $query->get();

        $totalProducts   = ProdukBelanja::count();
        $activeProducts  = ProdukBelanja::where('is_active', true)->count();
        $inactiveProducts = ProdukBelanja::where('is_active', false)->count();
        $categoriesCount = ProdukBelanja::distinct('category')->count('category');

        $categoriesList  = ProdukBelanja::distinct()->pluck('category')->filter()->values();

        return view('admin.belanja', compact(
            'products',
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'categoriesCount',
            'categoriesList'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'category'    => ['required', 'string', 'max:100'],
            'price'       => ['required', 'string', 'max:100'],
            'whatsapp'    => ['nullable', 'string', 'max:50'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'images.*'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'description' => ['nullable', 'string'],
            'rating'      => ['nullable', 'numeric', 'min:0', 'max:5'],
            'is_active'   => ['nullable', 'boolean'],
            'urutan'      => ['nullable', 'integer'],
        ]);

        $imagesList = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagesList[] = $file->store('produk', 'public');
            }
        }
        if ($request->hasFile('image')) {
            $single = $request->file('image')->store('produk', 'public');
            if (!in_array($single, $imagesList)) {
                array_unshift($imagesList, $single);
            }
        }

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (ProdukBelanja::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $maxUrutan = ProdukBelanja::max('urutan') ?? 0;

        ProdukBelanja::create([
            'name'        => $request->name,
            'slug'        => $slug,
            'category'    => $request->category,
            'price'       => $request->price,
            'whatsapp'    => $request->whatsapp,
            'image'       => $imagesList[0] ?? null,
            'images'      => $imagesList,
            'description' => $request->description,
            'rating'      => $request->rating ?: 5.0,
            'rating_count'=> 1,
            'is_active'   => $request->has('is_active') ? (bool) $request->is_active : true,
            'urutan'      => $request->filled('urutan') ? $request->urutan : ($maxUrutan + 1),
        ]);

        return back()->with('success', 'Produk UMKM berhasil ditambahkan ke katalog!');
    }

    public function update(Request $request, ProdukBelanja $produk)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'category'    => ['required', 'string', 'max:100'],
            'price'       => ['required', 'string', 'max:100'],
            'whatsapp'    => ['nullable', 'string', 'max:50'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'images.*'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'description' => ['nullable', 'string'],
            'rating'      => ['nullable', 'numeric', 'min:0', 'max:5'],
            'is_active'   => ['nullable', 'boolean'],
            'urutan'      => ['nullable', 'integer'],
        ]);

        $data = [
            'name'        => $request->name,
            'category'    => $request->category,
            'price'       => $request->price,
            'whatsapp'    => $request->whatsapp,
            'description' => $request->description,
            'is_active'   => $request->has('is_active') ? (bool) $request->is_active : false,
        ];

        if ($request->filled('rating')) {
            $data['rating'] = $request->rating;
        }

        if ($request->filled('urutan')) {
            $data['urutan'] = $request->urutan;
        }

        $existingImages = $produk->images ?: ($produk->image ? [$produk->image] : []);
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
                $existingImages[] = $file->store('produk', 'public');
            }
        }

        // Process single cover upload
        if ($request->hasFile('image')) {
            $imagesChanged = true;
            $single = $request->file('image')->store('produk', 'public');
            array_unshift($existingImages, $single);
        }

        if ($imagesChanged) {
            $existingImages = array_values(array_unique(array_filter($existingImages)));
            $data['images'] = $existingImages;
            $data['image']  = !empty($existingImages) ? $existingImages[0] : null;
        }

        if ($produk->name !== $request->name) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;
            while (ProdukBelanja::where('slug', $slug)->where('id', '!=', $produk->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
            $data['slug'] = $slug;
        }

        $produk->update($data);

        return back()->with('success', 'Data produk berhasil diperbarui!');
    }

    public function toggleActive(ProdukBelanja $produk)
    {
        $produk->is_active = !$produk->is_active;
        $produk->save();

        $statusText = $produk->is_active ? 'ditampilkan di katalog' : 'disembunyikan';
        return back()->with('success', "Status produk berhasil {$statusText}!");
    }

    public function destroy(ProdukBelanja $produk)
    {
        if (!empty($produk->images) && is_array($produk->images)) {
            foreach ($produk->images as $img) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }
        }
        if ($produk->image && Storage::disk('public')->exists($produk->image)) {
            Storage::disk('public')->delete($produk->image);
        }
        $produk->delete();

        return back()->with('success', 'Produk berhasil dihapus dari katalog.');
    }
}
