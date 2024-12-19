<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = File::get(storage_path() . "/../database/datas/department_types.json");

        $jsonArray = json_decode($jsonData);

        foreach ($jsonArray as $value) {
            Department::create([
                'name' => $value->name
            ]);
        }
    }
}
