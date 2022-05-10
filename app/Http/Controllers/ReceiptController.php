<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReceiptModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ReceiptController extends Controller
{
    public function showReceiptData(Request $request){
        $date = date('Y-m-d');
        $date1=date('Y-m-d');
        $nameOfDay = date('l', strtotime($date));
        $nameOfMonth = date('M', strtotime($date));
        $nameOfYear = date('Y');

        $data = DB::table('products')
        ->join('mauzos', 'products.id', '=', 'mauzos.product_id')
        ->where('mauzos.shop_id', $request->shop_id)->orderBy('mauzos.id','DESC')
        ->cursor();
        $sales = DB::table('mauzos')->where('shop_id',$request->shop_id)->cursor();
        Session::put('owner_id',$request->id);
        Session::put('shop_id',$request->shop_id);
        return view('seller/receipt_data')->with('data',$data)->with('sales',$sales);

    }

    public function printReceipt(Request $request){
     
        //id	user_id	owner_id	shop_id	product_id	created_at	updated_at	
        $receiptNo = ReceiptModel::where('selling_id',$request->id)->first();
        if ($receiptNo == "") {
            $receipt = new ReceiptModel();
            $receipt['user_id'] = Auth::id();
            $receipt['owner_id'] =  Session::get('owner_id');
            $receipt['shop_id'] = $request->shop_id;
            $receipt['selling_id'] = $request->id;
            $receipt->save();
            
            $receipt_id = $receipt->id;
            $data = DB::table('products')
            ->join('mauzos', 'products.id', '=', 'mauzos.product_id')
            ->where('mauzos.id', $request->id)->where('mauzos.shop_id', $request->shop_id)
            ->cursor();
    
          
            return view('seller.print_receipt')->with('data',$data)->with('receiptNo',$receipt_id);
        } else{
          
            
           
            $data = DB::table('products')
            ->join('mauzos', 'products.id', '=', 'mauzos.product_id')
            ->where('mauzos.id', $request->id)->where('products.shop_id', $request->shop_id)
            ->cursor();
    
          
            return view('seller.print_receipt')->with('data',$data)->with('receiptNo',$receiptNo->id);
        }
        
        
    }

    public function printedReceipt(Request $request){

        $data = DB::table('products')
        ->join('mauzos', 'products.id', '=', 'mauzos.product_id')
        ->join('receipt_models', 'receipt_models.selling_id', '=', 'mauzos.id')
        ->where('mauzos.shop_id', $request->shop_id)
        ->cursor();

        Log::info($data);
        return view('seller.printed_receipt')->with('data',$data);
    }

    public function ownerReceipt(){
        return view('owner.receipt');
    }

    public function annualReceiptForm(Request $request){

        $data = DB::table('mauzos')
        ->join('products', 'products.shop_id', '=', 'mauzos.shop_id')
        ->join('receipt_models', 'receipt_models.selling_id', '=', 'mauzos.id')->where('products.shop_id', $request->shop_id)
        ->where('mauzos.year', $request->year)
        ->cursor();

        return view('owner.receipt_data')->with('data',$data)->with('type',$request->type)->with('val',$request->year);
    
    }

    public function annualReceiptData(Request $request){
        
        $data = DB::table('mauzos')
        ->join('products', 'products.shop_id', '=', 'mauzos.shop_id')
        ->join('receipt_models', 'receipt_models.selling_id', '=', 'mauzos.id')->where('products.shop_id', $request->shop_id)
        ->where('mauzos.year', $request->year)
        ->cursor();

        return view('owner.receipt_data')->with('data',$data)->with('type',$request->type)->with('val',$request->year);
    }

    public function ownerMonthlyReceipt(Request $request){
        $data = DB::table('mauzos')
        ->join('products', 'products.shop_id', '=', 'mauzos.shop_id')
        ->join('receipt_models', 'receipt_models.selling_id', '=', 'mauzos.id')->where('products.shop_id', $request->shop_id)
        ->where('mauzos.month', $request->month)->where('mauzos.year', $request->year)
        ->cursor();

        return view('owner.receipt_data')->with('data',$data)->with('type',$request->type)->with('year',$request->year)->with('month',$request->month);
    }

    public function ownerMonthlyReceiptFormSearch(Request $request){
        $data = DB::table('mauzos')
        ->join('products', 'products.shop_id', '=', 'mauzos.shop_id')
        ->join('receipt_models', 'receipt_models.selling_id', '=', 'mauzos.id')->where('products.shop_id', $request->shop_id)
        ->where('mauzos.month', $request->month)->where('mauzos.year', $request->year)
        ->cursor();

        return view('owner.receipt_data')->with('data',$data)->with('type',$request->type)->with('year',$request->year)->with('month',$request->month);
    }

    public function ownerDailyReceipt(Request $request){
        $data = DB::table('mauzos')
        ->join('products', 'products.shop_id', '=', 'mauzos.shop_id')
        ->join('receipt_models', 'receipt_models.selling_id', '=', 'mauzos.id')->where('products.shop_id', $request->shop_id)
        ->where('mauzos.sales_date', $request->day)
        ->cursor();

        return view('owner.receipt_data')->with('data',$data)->with('type',$request->type)->with('date',$request->day);
    }

public function ownerDailyReceiptFormSearch(Request $request){
    $data = DB::table('mauzos')
    ->join('products', 'products.shop_id', '=', 'mauzos.shop_id')
    ->join('receipt_models', 'receipt_models.selling_id', '=', 'mauzos.id')->where('products.shop_id', $request->shop_id)
    ->where('mauzos.sales_date', $request->day)
    ->cursor();

    return view('owner.receipt_data')->with('data',$data)->with('type',$request->type)->with('date',$request->day);
}

}


