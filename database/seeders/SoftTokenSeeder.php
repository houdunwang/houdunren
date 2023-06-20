<?php

namespace Database\Seeders;

use App\Models\SoftToken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoftToken::create([
            'user_id' => 1,
            'soft_id' => 1,
            'token' => md5(now())
        ]);
    }
}
