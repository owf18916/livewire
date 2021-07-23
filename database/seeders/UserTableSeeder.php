<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            [
                'name' => 'Conan Edogawa',
                'email' => 'conan@edogawa.com',
                'password' => Hash::make('Abcde123')
            ],
            [
                'name' => 'Tsubaza Ozora',
                'email' => 'tsubaza@ozora.com',
                'password' => Hash::make('Abcde123')
            ],
            [
                'name' => 'Nobi Nobita',
                'email' => 'nobi@nobita.com',
                'password' => Hash::make('Abcde123')
            ]
        ]);

        $users->each(function($u) {
            User::create($u);
        });
    }
}
