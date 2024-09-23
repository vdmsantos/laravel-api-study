<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where("email", "vitor6890@gmail.com")->first()) {
            User::create([
                "email" => "vitor6890@gmail.com",
                "password" => Hash::make(
                    '123456',
                    ['rounds' => 12]
                ),
                "name" => "Vitor Daniel Mendes dos Santos",
            ]);
        }
    }
}
