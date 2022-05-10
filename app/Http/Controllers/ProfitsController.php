<?php

namespace App\Http\Controllers;

use App\Models\YearPeriod;
use App\Models\Mauzo;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;

class ProfitsController extends Controller
{
   public function ownerExpenses(){
        return view('owner.profits.expenses')->with('data','');
   }

   public function ownerNetProfit(){
        $data = YearPeriod::join('month_periods','year_periods.id', '=', 'month_periods.year_periods_id');
                               
    return view('owner.profits.net_profits')->with('data',$data);
}

public function ownerNetProfitForm(Request $request){
     $request->all();
     if($request->condition == 1){
     
          foreach ($request->all() as $key => $value) {
            $expenses = new Expenses();
            if($request->year != "" && $request->month != ""){

               try {
                 $expenses['shop_id'] = $request['shop_id'];
                 $expenses['year'] = $request['year'];
                 $expenses['month'] = $request['month'];
                 $expenses['name'] = $key;
                 $expenses['amount'] = $value;
                 $expenses->save();

                 $profit = Mauzo::where('shop_id',$request['shop_id'])->where('year',$request['year'])->where('month',$request['month'])->sum('profit');
                 return $profit - ($request['rent']+$request['wage']+$request['transport']+$request['salary']+$request['communication']
                        +$request['security']+$request['electricity']+$request['water']+$request['stationery']+$request['other_expenses']);
            }catch(Exception $e){
                 
               if (Str::contains($e->getMessage(), ['Duplicate entry'])) {
                  return back()->with('error', "Duplicate data is not allowed");
               }
            }
           }
            else{
                  return back()->with('period_empty','Empty Year or Month');
            }
          }
        }else{
         $profit = Mauzo::where('shop_id',$request['shop_id'])->where('year',$request['year'])->where('month',$request['month'])->sum('profit');
         return $profit - ($request['rent']+$request['wage']+$request['transport']+$request['salary']+$request['communication']
                +$request['security']+$request['electricity']+$request['water']+$request['stationery']+$request['other_expenses']);
        }
     
     
}
}
