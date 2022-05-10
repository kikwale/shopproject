<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Money;

class MoneySymbolSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $userInputs = [
            ['shop_id' => '1', 'name' => 'Tsh'],

            ['shop_id' => '2','name' => 'Tsh'],

              ['shop_id' => '3','name' => 'Ksh'],

              ['shop_id' => '4','name' => 'Doller'],
              
            ];       

            foreach($userInputs as $userInput){
                Money::create($userInput); 
            }
    }
}
