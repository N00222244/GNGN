<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_editor = Role::where('name', 'editor')->first();
        $role_organizer = Role::where('name', 'organizer')->first();



        //created admin user

        $admin = new User();
        $admin->name = 'Adam Doyle';
        $admin->email = 'adam@larfest.ie';
        $admin->password = Hash::make('password');
        $admin->save();

        $admin->roles()->attach($role_admin);

        //created user

        $user = new User();
        $user->name = 'Joe Jones';
        $user->email = 'joejones@larfest.ie';
        $user->password = Hash::make('password');
        $user->save();

        $user->roles()->attach($role_user);


        //created editor user

        $editor = new user();
        $editor->name = 'editor';
        $editor->email = 'editor@larfest.ie';
        $editor->password = Hash::make('password');
        $editor->save();

        $editor->roles()->attach($role_editor);

        

        //created organizer user 

        $organizer = new user();
        $organizer->name = 'organizer';
        $organizer->email = 'organizer@larfest.ie';
        $organizer->password = Hash::make('password');
        $organizer->save();

        $organizer->roles()->attach($role_organizer);

    }
}
