<?php

namespace Database\Seeders;

use App\Models\SoftSecret;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftSecretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoftSecret::create(['user_id' => 1, 'secret' => md5(now()), 'end_time' => now()->addYear(3)]);
    }
}
