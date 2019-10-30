<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user = User::where('email', 'lepfsd00@gmail.com')->get();

        if(!$user) {
            User::create([
                'name' => 'maria flores',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('Admin123')
            ]);
        }
    }
}
