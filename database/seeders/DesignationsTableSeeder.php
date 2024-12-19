<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Nette\Utils\FileInfo;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $jsonData = File::get(storage_path() . "/../database/datas/designation_types.json");

        $jsonArray = json_decode($jsonData);

        Department::truncate();
        foreach ($jsonArray as $value) {
            Designation::create([
                'name' => $value->name
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
