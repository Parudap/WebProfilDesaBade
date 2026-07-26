<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteAdminCommand extends Command
{
    protected $signature = 'delete:admin {--email= : Email admin yang ingin dihapus}';
    protected $description = 'Menghapus akun administrator';

    public function handle()
    {
        $email = $this->option('email') ?: $this->ask('Masukkan Email Admin yang ingin dihapus');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("Akun dengan email '{$email}' tidak ditemukan!");
            return Command::FAILURE;
        }

        if ($this->confirm("Apakah Anda yakin ingin menghapus akun admin '{$user->name}' ({$email})?")) {
            $user->delete();
            $this->info("✅ Akun Admin '{$email}' berhasil dihapus!");
            return Command::SUCCESS;
        }

        $this->warn('Penghapusan dibatalkan.');
        return Command::SUCCESS;
    }
}
