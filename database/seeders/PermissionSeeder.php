<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $laboratRole = Role::create(['name' => 'laboratorium']);
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $administratorRole = Role::create(['name' => 'administration']);


        $user = User::factory()->create([
            'name' => 'Laboratory',
            'email' => 'lab@mail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($laboratRole);

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($superAdminRole);

        $user = User::factory()->create([
            'name' => 'Administrasi',
            'email' => 'administrasi@mail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($administratorRole);

    }
}
