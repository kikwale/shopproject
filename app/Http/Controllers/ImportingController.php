<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ImportingController extends Controller
{
  
    public function sellerImportProducts(Request $request){
        $validatedData = $request->validate([
 
            'file' => 'required',
  
         ]);
  
        if ($request->file('file')) {
           
            Excel::import(new ProductsImport,$request->file);
 
            return back()->with('success','Products Imported Successfuly...');
            // return redirect('excel-csv-file')->with('status', 'The file has been ');
        }
    }
}
