<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_user=Role::where('role','user')->get();
        $role_admin=Role::where('role','admin')->get();

        $user=new User;
        $user->username='David';
        $user->email='david@gmail.com';
        $user->password=Hash::make('123456');
        $user->role_id= Role::where('role','user')->first()->id;
        $user->save();

        $user=new User;
        $user->username='Admin';
        $user->email='admin@gmail.com';
        $user->password=Hash::make('123456');
        $user->role_id=Role::where('role','admin')->first()->id;
        $user->save();
    }
}
