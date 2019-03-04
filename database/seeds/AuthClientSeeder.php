<?php

use Illuminate\Database\Seeder;

class AuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'name' => 'hdCms',
            'secret' => '2xO1f9cEq1A8WyCg0FKyhEkN99FEYIsjuqclqLgF',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0,
        ]);
    }
}
