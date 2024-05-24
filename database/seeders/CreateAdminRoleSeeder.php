<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Créer un rôle d'administrateur
    $adminRole = DB::table('roles')->insertGetId([
        'name' => 'admin',
    ]);

    // Associer le rôle d'administrateur à un utilisateur
    $user = DB::table('users')->where('email', 'pierre.mitou1@gmail.com')->first();
    DB::table('role_user')->insert([
        'user_id' => $user->id,
        'role_id' => $adminRole,
    ]);
    }
}
