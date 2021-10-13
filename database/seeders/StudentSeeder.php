<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/Records.csv"), "r");

        // $firstLine = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== false) {
            Student::create([
                "name" => $data[0],
                "contact" => $data[1],
                "class" => $data[2],
                "course" => $data[3],
            ]);
        }
        fclose($csvFile);
    }
}
