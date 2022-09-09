<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        \DB::table('users')->insert([
            [
                'name' => 'Gardener',
                'email' => 'gardener@mail.com',
                'password' => \Hash::make('gardener123'),
                'role' => '1'
            ],
            [
                'name' => 'Designer',
                'email' => 'designer@mail.com',
                'password' => \Hash::make('designer123'),
                'role' => '2'
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => \Hash::make('user123'),
                'role' => '3'
            ]
        ]);

        \DB::table('projects')->insert([
            [
                'nama' => 'Taman Ceria',
                'keterangan' => '',
                'status' => '1'
            ],
            [
                'nama' => 'Mini Garden',
                'keterangan' => '',
                'status' => '2'
            ],
            [
                'nama' => 'Taman Mawar',
                'keterangan' => '',
                'status' => '4'
            ],
            [
                'nama' => 'Taman Anggrek',
                'keterangan' => '',
                'status' => '3'
            ]
        ]);
    }
}
