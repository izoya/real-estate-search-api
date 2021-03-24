<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class PropertySeeder extends Seeder
{
    /** @var string $dataFile - csv file in storage directory */
    private string $dataFile = 'data/property-data.csv';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert($this->getData());
    }

    /**
     * Prepare data for insert
     * @return array
     */
    private function getData(): array
    {
        $filename = storage_path($this->dataFile);
        $file = fopen($filename, 'r');

        if ($file === false) {
            throw new FileNotFoundException($filename);
        }

        $data = [];
        $rowNumber = 0;

        while (($row = fgetcsv($file)) !== FALSE) {
            $data[$rowNumber] = [
                'name' => $row[0],
                'price' => $row[1],
                'bedrooms' => $row[2],
                'bathrooms' => $row[3],
                'storeys' => $row[4],
                'garages' => $row[5],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $rowNumber++;
        }

        fclose($file);
        unset($data[0]);

        return $data;
    }
}
