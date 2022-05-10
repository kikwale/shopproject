<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MadukaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function owner_shop(Request $request){
        Session::put('owner_id',$request->owner_id);
        Session::put('shop_id',$request->shop_id);
        $data = DB::table('products')->where('owner_id',$request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','desc')->cursor();
        return view('owner.shop')->with('data',$data);
    }

    public function shop_worker(Request $request){
        $owner_id = $request->ower_id;
        $shop_id = $request->shop_id;
        $data = DB::table('sellers')->where('owner_id', $owner_id)->where('shop_id',$shop_id)->orderBy('id','asc')->cursor();
        return view('owner.workers')
               ->with('owner_id',$owner_id)->with('shop_id',$shop_id)->with('data',$data);
    }

    public function create_worker(Request $request){

        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = new User();
        $user->fname = $request->fname; 
        $user->mname = $request->mname; 
        $user->lname = $request->lname; 
        $user->gender = $request->gender; 
        $user->phone = $request->phone; 
        $user->email = $request->email; 
        $user->password = Hash::make(strToUpper($request->lname));
        $user->role = 'Seller'; 
        $user->save();
        $id = $user->id;

        $seller = new seller();
        $seller->user_id = $id;
        $seller->shop_id = $request->shop_id;
        $seller->owner_id = $request->owner_id;
        $seller->fname = $request->fname; 
        $seller->mname = $request->mname; 
        $seller->lname = $request->lname; 
        $seller->gender = $request->gender; 
        $seller->phone = $request->phone; 
        $seller->email = $request->email; 
        $seller->save();
        $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('owner.workers')
               ->with('owner_id',$request->owner_id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
       

    }

    public function owner_add_jumla_product(Request $request){
        $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('owner.owner_add_jumla_product')
               ->with('owner_id',$request->id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
   
    }

    public function saveJumlaProduct(Request $request){
        // {{-- id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	location	created_at	updated_at	 --}}
       
       $product = new Product();
       $product->name = $request->name;
       $product->owner_id = $request->owner_id;
       $product->shop_id  = $request->shop_id;
       $product->category = 'Jumla';
       $product->unit = $request->unit;
       $product->quantity = $request->quantity;
       $product->total = $request->amount;
       $product->notification = $request->notification;
       $product->money_unit = $request->money_unit; 
       $product->purchased_price = $request->purchased_price;
       $product->sold_price = $request->sold_price;
       $product->expire = $request->expire;
       $product->location = $request->location;
       $product->save();

       return redirect()->to('/owner_add_jumla_product?id='.Session::get('owner_id').'&&shop_id='.Session::get('shop_id').'')->with('success','Successfully Product(s) Registered......!!');

       
    }

    public function owner_add_rejareja_product(Request $request){
        $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('owner.owner_add_rejareja_product')
               ->with('owner_id',$request->id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
   
    }

    public function saveRejarejaProduct(Request $request){
        // {{-- id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	location	created_at	updated_at	 --}}
        if ( empty($request->subquantity)) {
            $amount = $request->amount*$request->quantity;
            $product = new Product();
            $product->name = $request->name;
            $product->owner_id = $request->owner_id;
            $product->shop_id  = $request->shop_id;
            $product->category = 'Rejareja';
            $product->unit = $request->unit;
            $product->quantity = $request->quantity;
            $product->total = $amount;
            $product->notification = $request->notification;
            $product->money_unit = $request->money_unit; 
            $product->purchased_price = $request->purchased_price;
            $product->sold_price = $request->sold_price;
            $product->expire = $request->expire;
            $product->location = $request->location;
            $product->save();
     
            return redirect()->to('/owner_add_rejareja_product?id='.Session::get('owner_id').'&&shop_id='.Session::get('shop_id').'')->with('success','Successfully Product(s) Registered......!!');
        } elseif(!empty($request->subquantity)){
            $amount = ($request->quantity+$request->subquantity)*$request->amount;
            $product = new Product();
            $product->name = $request->name;
            $product->owner_id = $request->owner_id;
            $product->shop_id  = $request->shop_id;
            $product->category = 'Rejareja';
            $product->unit = $request->unit;
            $product->quantity = $request->quantity;
            $product->total = $amount;
            $product->notification = $request->notification;
            $product->money_unit = $request->money_unit; 
            $product->purchased_price = $request->purchased_price;
            $product->sold_price = $request->sold_price;
            $product->expire = $request->expire;
            $product->location = $request->location;
            $product->save();
     
            return redirect()->to('/owner_add_rejareja_product?id='.Session::get('owner_id').'&&shop_id='.Session::get('shop_id').'')->with('success','Successfully Product(s) Registered......!!');
        }
       
 

    }

    
}
