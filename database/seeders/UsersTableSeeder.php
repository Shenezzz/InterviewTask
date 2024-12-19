<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $jsonData = File::get(storage_path() . "/../database/datas/users.json");

        $jsonArray = json_decode($jsonData);

        User::truncate();
        foreach ($jsonArray as $value) {
            User::create([
                'name' => $value->name,
                'designation_id' => $value->designation_id,
                'department_id' => $value->department_id,
                'phone_number' => $value->phone_number
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
