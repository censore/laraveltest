<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->fill([
            'name' => 'FirstUser',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $user->save();
        $user->assignRole('admin');
    }
}
