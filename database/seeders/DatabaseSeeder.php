<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $defaultUser = new User();
        $defaultUser->setAttribute('name', 'pruebas');
        $defaultUser->setAttribute('email', 'pruebas@pruebas.com');
        $defaultUser->setAttribute('password', Hash::make('prueba123'));
        $defaultUser->save();
    }
}
