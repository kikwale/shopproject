<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitTable;

class UnitsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userInputs = [
            ['name' => 'Kg'],
            ['name' => 'piece/package'],
            ['name' => 'Dozen'],
            ['name' => 'Set'],
            ['name' => 'Tabs (Tablets)'],
            ['name' => 'Inj (Injection)'],
            ['name' => 'Lozenges'],
            ['name' => 'Caps'],
            ['name' => 'Syringe'],
            ['name' => 'Ointment'],
            ['name' => 'Cream'],
            ['name' => 'Lotion'],
            ['name' => 'Solution'],
            ['name' => 'Suppository'],
            ['name' => 'Gell'],
            // ['name' => 'Litre'],
            // ['name' => 'Litre'],
            // ['name' => 'Litre'],
            // ['name' => 'Litre'],
            // ['name' => 'Litre'], 
            // ['name' => 'Litre'],
            // ['name' => 'Litre'],
            // ['name' => 'Litre'],
            ];               
            foreach($userInputs as $userInput){
                UnitTable::create($userInput); 
            }
    }
}
