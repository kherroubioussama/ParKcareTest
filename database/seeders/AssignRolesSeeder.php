<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AssignRolesSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all users
        $users = User::all();

        // Retrieve admin and user roles
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        // Assign roles to users
        foreach ($users as $user) {
            // Assign admin role to the first user and user role to others
            $role = $user->id === 1 ? $adminRole : $userRole;
            $user->role()->associate($role);
            $user->save();
        }
    }
}
