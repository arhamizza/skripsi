<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
  
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            "name" => "Anik",
            "email" => "Anik@gmail.com",
            "password" => Hash::make("12345678"),
            "is_active" => 0
        ]);
        User::create([
            "name" => "Ahmad",
            "email" => "Ahmad@gmail.com",
            "password" => Hash::make("12345678"),
            "is_active" => 0
        ]);
        User::create([
            "name" => "Sri",
            "email" => "Sriwahyuni@gmail.com",
            "password" => Hash::make("12345678"),
            "is_active" => 0
        ]);
        User::create([
            "id" => "99",
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("12345678"),
            "is_active" => 1
        ]);
    }
}