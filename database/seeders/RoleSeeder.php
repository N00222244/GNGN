<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'an administrator user';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';
        $role_user->save();

        $role_editor = new Role();
        $role_editor->name = 'editor';
        $role_editor->description = 'An editorial user';
        $role_editor->save();

        $role_organizer = new Role();
        $role_organizer->name = 'organizer';
        $role_organizer->description = 'An organizer user';
        $role_organizer->save();
    }
}
