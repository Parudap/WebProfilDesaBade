<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdminCommand extends Command
{
    protected $signature = 'make:admin {--name= : Nama admin} {--email= : Email admin} {--password= : Password admin}';
    protected $description = 'Membuat akun administrator baru';

    public function handle()
    {
        $name = $this->option('name') ?: $this->ask('Masukkan Nama Admin');
        $email = $this->option('email') ?: $this->ask('Masukkan Email Admin');
        
        if (User::where('email', $email)->exists()) {
            $this->error("Email '{$email}' sudah terdaftar!");
            return Command::FAILURE;
        }

        $password = $this->option('password') ?: $this->secret('Masukkan Password Admin');

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);

        $this->info("✅ Akun Admin '{$email}' berhasil dibuat!");
        return Command::SUCCESS;
    }
}
