<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ListAdminCommand extends Command
{
    protected $signature = 'list:admin';
    protected $description = 'Menampilkan daftar seluruh akun administrator';

    public function handle()
    {
        $admins = User::where('is_admin', true)->get(['id', 'name', 'email', 'created_at']);

        if ($admins->isEmpty()) {
            $this->warn('Belum ada akun admin yang terdaftar.');
            return Command::SUCCESS;
        }

        $this->info("📋 Daftar Akun Administrator Desa Bade:");
        $this->table(
            ['ID', 'Nama Admin', 'Email', 'Tanggal Dibuat'],
            $admins->map(fn($user) => [
                'ID' => $user->id,
                'Nama Admin' => $user->name,
                'Email' => $user->email,
                'Tanggal Dibuat' => $user->created_at ? $user->created_at->format('d M Y H:i') : '-',
            ])
        );

        return Command::SUCCESS;
    }
}
