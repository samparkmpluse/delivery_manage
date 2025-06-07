<?php
namespace Database\Seeders;

use App\Models\DeliveryPerson;
use Illuminate\Database\Seeder;

class DeliveryPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Persons = [
            ['name' => 'A', 'capacity' => 2],
            ['name' => 'B', 'capacity' => 4],
            ['name' => 'C', 'capacity' => 5],
            ['name' => 'D', 'capacity' => 3],
        ];

        foreach ($Persons as $per) {
     
              DeliveryPerson::updateOrCreate(
                                    ['name' => $per['name']],
                                    ['capacity' => $per['capacity']]
                                );

        }

    }
}
