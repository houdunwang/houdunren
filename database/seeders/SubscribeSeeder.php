<?php

namespace Database\Seeders;

use App\Models\SoftSecret;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscribe::create(['user_id' => 1, 'end_time' => now()->addDay(3)]);
    }
}
