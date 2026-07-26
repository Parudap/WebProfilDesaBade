<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatistikPenduduk;
use App\Models\Apbdes;
use App\Models\Stunting;
use App\Models\Bansos;
use App\Models\Idm;
use App\Models\Sdgs;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfografisController extends Controller
{
    // ── PENDUDUK ──────────────────────────────────────────────
    public function penduduk()
    {
        $kategoriList = ['usia','pendidikan','pekerjaan','agama','perkawinan','pemilih'];
        $data = [];
        foreach ($kategoriList as $k) {
            $data[$k] = StatistikPenduduk::getByKategori($k);
        }
        $dusunList = Dusun::orderBy('urutan')->get();
        return view('admin.infografis.penduduk', compact('data', 'dusunList'));
    }

    public function pendudukStore(Request $request)
    {
        $request->validate([
            'kategori'       => ['required','string'],
            'label'          => ['required','string','max:100'],
            'value_laki'     => ['required','integer','min:0'],
            'value_perempuan'=> ['required','integer','min:0'],
            'urutan'         => ['nullable','integer','min:0'],
        ]);
        StatistikPenduduk::create($request->only(['kategori','label','value_laki','value_perempuan']) + ['urutan'=>$request->urutan??0]);
        return back()->with('success','Data penduduk berhasil ditambahkan!')->with('active_tab', $request->kategori);
    }

    public function pendudukUpdate(Request $request, StatistikPenduduk $statistik)
    {
        $request->validate([
            'label'          => ['required','string','max:100'],
            'value_laki'     => ['required','integer','min:0'],
            'value_perempuan'=> ['required','integer','min:0'],
            'urutan'         => ['nullable','integer','min:0'],
        ]);
        $statistik->update($request->only(['label','value_laki','value_perempuan','urutan']));
        return back()->with('success','Data berhasil diperbarui!')->with('active_tab', $statistik->kategori);
    }

    public function pendudukDestroy(StatistikPenduduk $statistik)
    {
        $kategori = $statistik->kategori;
        $statistik->delete();
        return back()->with('success','Data berhasil dihapus.')->with('active_tab', $kategori);
    }

    public function dusunStore(Request $request)
    {
        $request->validate([
            'nama'      => ['required','string','max:100'],
            'kk'        => ['required','integer','min:0'],
            'laki'      => ['required','integer','min:0'],
            'perempuan' => ['required','integer','min:0'],
            'urutan'    => ['nullable','integer','min:0'],
        ]);

        Dusun::create([
            'nama'      => $request->nama,
            'kk'        => $request->kk,
            'laki'      => $request->laki,
            'perempuan' => $request->perempuan,
            'jiwa'      => $request->laki + $request->perempuan,
            'urutan'    => $request->urutan ?? 0,
        ]);

        return back()->with('success', 'Data dusun berhasil ditambahkan!')->with('active_tab', 'dusun');
    }

    public function dusunUpdate(Request $request, Dusun $dusun)
    {
        $request->validate([
            'nama'      => ['required','string','max:100'],
            'kk'        => ['required','integer','min:0'],
            'laki'      => ['required','integer','min:0'],
            'perempuan' => ['required','integer','min:0'],
            'urutan'    => ['nullable','integer','min:0'],
        ]);

        $dusun->update([
            'nama'      => $request->nama,
            'kk'        => $request->kk,
            'laki'      => $request->laki,
            'perempuan' => $request->perempuan,
            'jiwa'      => $request->laki + $request->perempuan,
            'urutan'    => $request->urutan ?? $dusun->urutan,
        ]);

        return back()->with('success', 'Data dusun berhasil diperbarui!')->with('active_tab', 'dusun');
    }

    public function dusunDestroy(Dusun $dusun)
    {
        $dusun->delete();
        return back()->with('success', 'Data dusun berhasil dihapus.')->with('active_tab', 'dusun');
    }

    // ── APBDES ────────────────────────────────────────────────
    public function apbdes()
    {
        $list = Apbdes::orderBy('tahun','desc')->get();
        return view('admin.infografis.apbdes', compact('list'));
    }

    public function apbdesStore(Request $request)
    {
        $request->validate([
            'judul'     => ['required','string','max:200'],
            'tahun'     => ['required','integer','min:2000','max:2099'],
            'file_pdf'  => ['required','file','mimes:pdf','max:10240'],
            'keterangan'=> ['nullable','string'],
            'is_active' => ['nullable','boolean'],
        ]);
        $path = $request->file('file_pdf')->store('apbdes','public');
        Apbdes::create([
            'judul'     => $request->judul,
            'tahun'     => $request->tahun,
            'file_pdf'  => $path,
            'keterangan'=> $request->keterangan,
            'is_active' => $request->boolean('is_active', true),
        ]);
        return back()->with('success','APBDes berhasil diunggah!');
    }

    public function apbdesDestroy(Apbdes $apbdes)
    {
        Storage::disk('public')->delete($apbdes->file_pdf);
        $apbdes->delete();
        return back()->with('success','APBDes berhasil dihapus.');
    }

    // ── STUNTING ──────────────────────────────────────────────
    public function stunting()
    {
        $list = Stunting::orderBy('tahun','desc')->get();
        return view('admin.infografis.stunting', compact('list'));
    }

    public function stuntingStore(Request $request)
    {
        $request->validate([
            'judul'     => ['required','string','max:200'],
            'tahun'     => ['required','integer','min:2000','max:2099'],
            'file_pdf'  => ['required','file','mimes:pdf','max:10240'],
            'keterangan'=> ['nullable','string'],
            'is_active' => ['nullable','boolean'],
        ]);
        $path = $request->file('file_pdf')->store('stunting','public');
        Stunting::create([
            'judul'     => $request->judul,
            'tahun'     => $request->tahun,
            'file_pdf'  => $path,
            'keterangan'=> $request->keterangan,
            'is_active' => $request->boolean('is_active', true),
        ]);
        return back()->with('success','Dokumen Stunting berhasil diunggah!');
    }

    public function stuntingDestroy(Stunting $stunting)
    {
        if ($stunting->file_pdf) {
            Storage::disk('public')->delete($stunting->file_pdf);
        }
        $stunting->delete();
        return back()->with('success','Dokumen Stunting berhasil dihapus.');
    }

    // ── BANSOS ────────────────────────────────────────────────
    public function bansos()
    {
        $list = Bansos::orderBy('tahun','desc')->get();
        return view('admin.infografis.bansos', compact('list'));
    }

    public function bansosStore(Request $request)
    {
        $request->validate([
            'judul'     => ['required','string','max:200'],
            'tahun'     => ['required','integer','min:2000','max:2099'],
            'file_pdf'  => ['required','file','mimes:pdf','max:10240'],
            'keterangan'=> ['nullable','string'],
            'is_active' => ['nullable','boolean'],
        ]);
        $path = $request->file('file_pdf')->store('bansos','public');
        Bansos::create([
            'judul'     => $request->judul,
            'tahun'     => $request->tahun,
            'file_pdf'  => $path,
            'keterangan'=> $request->keterangan,
            'is_active' => $request->boolean('is_active', true),
        ]);
        return back()->with('success','Dokumen Bansos berhasil diunggah!');
    }

    public function bansosDestroy(Bansos $banso)
    {
        if ($banso->file_pdf) {
            Storage::disk('public')->delete($banso->file_pdf);
        }
        $banso->delete();
        return back()->with('success','Dokumen Bansos berhasil dihapus.');
    }

    // ── IDM ───────────────────────────────────────────────────
    public function idm()
    {
        $list = Idm::orderBy('tahun','desc')->get();
        return view('admin.infografis.idm', compact('list'));
    }

    public function idmStore(Request $request)
    {
        $request->validate([
            'judul'     => ['required','string','max:200'],
            'tahun'     => ['required','integer','min:2000','max:2099'],
            'file_pdf'  => ['required','file','mimes:pdf','max:10240'],
            'keterangan'=> ['nullable','string'],
            'is_active' => ['nullable','boolean'],
        ]);
        $path = $request->file('file_pdf')->store('idm','public');
        Idm::create([
            'judul'     => $request->judul,
            'tahun'     => $request->tahun,
            'file_pdf'  => $path,
            'keterangan'=> $request->keterangan,
            'is_active' => $request->boolean('is_active', true),
        ]);
        return back()->with('success','Dokumen IDM berhasil diunggah!');
    }

    public function idmDestroy(Idm $idm)
    {
        if ($idm->file_pdf) {
            Storage::disk('public')->delete($idm->file_pdf);
        }
        $idm->delete();
        return back()->with('success','Dokumen IDM berhasil dihapus.');
    }

    // ── SDGs ──────────────────────────────────────────────────
    public function sdgs()
    {
        Sdgs::seedDefaultsIfEmpty();
        $list = Sdgs::orderBy('tahun','desc')->orderBy('goal_nomor')->get();
        $grouped = $list->groupBy('tahun');
        $masterGoals = Sdgs::$masterGoals;
        $avgScore = round($list->avg('capaian'), 2);
        return view('admin.infografis.sdgs', compact('list','grouped','masterGoals','avgScore'));
    }

    public function sdgsStore(Request $request)
    {
        $request->validate([
            'tahun'      => ['required','integer','min:2000','max:2099'],
            'goal_nomor' => ['required','integer','min:1','max:18'],
            'goal_nama'  => ['nullable','string','max:200'],
            'capaian'    => ['required','numeric','min:0','max:100'],
        ]);

        $masterNama = Sdgs::$masterGoals[$request->goal_nomor]['nama'] ?? $request->goal_nama;

        Sdgs::updateOrCreate(
            ['tahun'=>$request->tahun,'goal_nomor'=>$request->goal_nomor],
            [
                'goal_nama' => $masterNama,
                'capaian'   => $request->capaian,
            ]
        );
        return back()->with('success','Data SDGs berhasil disimpan!');
    }

    public function sdgsBatchUpdate(Request $request)
    {
        $request->validate([
            'tahun' => ['required','integer','min:2000','max:2099'],
            'capaian' => ['required','array'],
            'capaian.*' => ['required','numeric','min:0','max:100'],
        ]);

        $tahun = $request->tahun;
        foreach ($request->capaian as $goalNomor => $val) {
            $master = Sdgs::$masterGoals[$goalNomor] ?? null;
            if ($master) {
                Sdgs::updateOrCreate(
                    ['tahun' => $tahun, 'goal_nomor' => $goalNomor],
                    [
                        'goal_nama' => $master['nama'],
                        'capaian'   => $val,
                    ]
                );
            }
        }
        return back()->with('success', 'Seluruh nilai 18 SDGs Desa berhasil disimpan!');
    }

    public function sdgsDestroy(Sdgs $sdgs)
    {
        $sdgs->delete();
        return back()->with('success','Data berhasil dihapus.');
    }
}