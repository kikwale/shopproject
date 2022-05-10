<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\YearPeriod;

class YearPeriodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userInputs = [
            ['year' => '2022'],

            ['year' => '2021'],

              ['year' => '2020'],

              ['year' => '2018'],
              ['year' => '2017'],
              ['year' => '2016'],
              ['year' => '2015'],
              ['year' => '2014'],
              ['year' => '2013'],
              ['year' => '2012'],
              ['year' => '2011'],
              ['year' => '2010'],
              ['year' => '2009'],
              ['year' => '2008'],
              ['year' => '2007'],
              ['year' => '2006'],
              ['year' => '2005'],
              ['year' => '2004'],
              ['year' => '2003'],
              ['year' => '2002'],
              ['year' => '2001'],
              ['year' => '2000'],
              ['year' => '1999'],
              ['year' => '1998'],
              ['year' => '1997'],
              ['year' => '1996'],
              ['year' => '1995'],
              
            ];       

            foreach($userInputs as $userInput){
                YearPeriod::create($userInput); 
            }
    }

}
