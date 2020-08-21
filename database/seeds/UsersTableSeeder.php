<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        DB::table('role_user')->truncate();


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@madrassa.mr',
            'password' => bcrypt('admin'),
            'avatar' => 'admin.png',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@madrassa.mr',
            'password' => bcrypt('0000'),
            'avatar' => 'teacher.png',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $student = User::create([
            'name' => 'student',
            'email' => 'student@madrassa.mr',
            'password' => bcrypt('0000'),
            'avatar' => 'student.png',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@madrassa.mr',
            'password' => bcrypt('0000'),
            'avatar' => 'default.png',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $adminRole = Role::where('name' , 'admin')->first();
        $teacherRole = Role::where('name' , 'teacher')->first();
        $studentRole = Role::where('name' , 'student')->first();
        $userRole = Role::where('name' , 'user')->first();

        $admin->roles()->attach($adminRole);
        $teacher->roles()->attach($teacherRole);
        $student->roles()->attach($studentRole);
        $user->roles()->attach($userRole);

    }
}
