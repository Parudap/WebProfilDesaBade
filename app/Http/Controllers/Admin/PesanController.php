<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller {
    public function index(Request $request) {
        $filter = $request->get('filter', 'all');
        $query = Pesan::latest();
        if ($filter === 'unread') $query->where('is_read', false);
        elseif ($filter === 'read') $query->where('is_read', true);
        $pesans = $query->paginate(15)->withQueryString();
        $unreadCount = Pesan::where('is_read', false)->count();
        return view('admin.pesan', compact('pesans', 'filter', 'unreadCount'));
    }
    public function markRead(Pesan $pesan) {
        $pesan->update(['is_read' => true]);
        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }
    public function markAllRead() {
        Pesan::where('is_read', false)->update(['is_read' => true]);
        return back()->with('success', 'Semua pesan ditandai sudah dibaca.');
    }
    public function destroy(Pesan $pesan) {
        $pesan->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
