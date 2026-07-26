<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create
                            {--name= : Nama lengkap admin}
                            {--email= : Alamat email admin}
                            {--password= : Password admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat akun admin baru untuk panel admin web profil desa';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('');
        $this->info('╔══════════════════════════════════════════╗');
        $this->info('║    Buat Akun Admin - Web Profil Desa     ║');
        $this->info('╚══════════════════════════════════════════╝');
        $this->info('');

        // Nama
        $name = $this->option('name') ?: $this->ask('Nama lengkap admin');

        // Email
        $email = $this->option('email');
        if (! $email) {
            $email = $this->ask('Alamat email admin');
        }

        // Cek email sudah digunakan atau belum
        if (User::where('email', $email)->exists()) {
            // Tanya apakah ingin update ke admin
            $existing = User::where('email', $email)->first();
            if ($existing->is_admin) {
                $this->warn("Email [{$email}] sudah terdaftar sebagai admin!");
                return self::FAILURE;
            }

            if ($this->confirm("Email [{$email}] sudah terdaftar (bukan admin). Jadikan sebagai admin?", true)) {
                $existing->update(['is_admin' => true, 'name' => $name]);
                $this->info('');
                $this->info('✅ Akun berhasil dijadikan admin!');
                $this->showCredentials($existing->email, '(password tidak berubah)');
                return self::SUCCESS;
            }

            return self::FAILURE;
        }

        // Password
        $password = $this->option('password');
        if (! $password) {
            $password = $this->secret('Password (minimal 8 karakter)');
            $passwordConfirm = $this->secret('Konfirmasi password');

            if ($password !== $passwordConfirm) {
                $this->error('Password dan konfirmasi tidak cocok!');
                return self::FAILURE;
            }
        }

        // Validasi
        $validator = Validator::make([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ], [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return self::FAILURE;
        }

        // Buat user admin
        $user = User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);

        $this->info('');
        $this->info('✅ Akun admin berhasil dibuat!');
        $this->showCredentials($user->email, $password);

        return self::SUCCESS;
    }

    private function showCredentials(string $email, string $password): void
    {
        $this->info('');
        $this->line('┌─────────────────────────────────────────┐');
        $this->line('│           Informasi Login Admin          │');
        $this->line('├─────────────────────────────────────────┤');
        $this->line("│  URL      : /admin                       │");
        $this->line("│  Email    : {$email}");
        $this->line("│  Password : {$password}");
        $this->line('└─────────────────────────────────────────┘');
        $this->info('');
        $this->warn('⚠️  Simpan informasi login ini dengan aman!');
        $this->info('');
    }
}
