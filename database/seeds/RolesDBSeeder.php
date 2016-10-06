<?php

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

class RolesDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = Role::create([
            'name' => 'Managing Director',
            'slug' => 'admin',
        ]);

        $driver  = Role::create([
            'name' => 'Driver',
            'slug' => 'driver'
        ]);

        $project_manager = Role::create([
            'name' => 'Manager',
            'slug' => 'manager'
        ]);

        $owner = Role::create(['name' => 'Owner', 'slug' => 'owner']);
        $boss = User::where('email', '=', 'owner@owner.com')->first();
        $boss->attachRole($owner);

        $staff = Role::create(['name' => 'Staff', 'slug' => 'staff']);
        $staff_user = \App\User::where('email' ,'=', 'staff@staff.com')->first();
        $staff_user->attachRole($staff);

        $admin_user = User::where('email', '=', 'admin@admin.com')->first();
        $admin_user->attachRole($adminRole);


        $driver_ = User::where('email', '=', 'driver@driver.com')->first();
        $driver_->attachRole($driver);

        $projectManager = User::where('email', '=', 'manager@admin.com')->first();
        $projectManager->attachRole($project_manager);
    }
}
