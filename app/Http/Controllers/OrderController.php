<?php

namespace App\Http\Controllers;

use App\Models\Maduka;
use App\Models\Mauzo;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Exception;
use Carbon\Carbon;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    

    public function sellerPlaceOrder(Request $request){
        $data = Maduka::where('products.shop_id','!=',$request->shop_id)
                ->where('products.expire','>=',date('Y-m-d'))
                ->where('products.total','!=', 0)
                ->join('users','madukas.user_id', '=', 'users.id')
                // ->join('sellers','madukas.id', '=', 'sellers.shop_id')
                ->join('products','madukas.id', '=', 'products.shop_id')
                ->get();
     Log::alert($data);
        return view('seller.order.place_order')->with('data',$data);
    }

    public function sellerPlacedOrder(Request $request){
        // $date = date('Y-m-d');
        // $date1=date('Y-m-d');
        // $nameOfDay = date('l', strtotime($date));
        // $nameOfMonth = date('M', strtotime($date));
        // $nameOfYear = date('Y');

        // Tuta select huko baadae
        $data = Order::select('Orders.id as id','madukas.shop_name as shop_name',
        'products.name as product_name','madukas.country as country',
        'madukas.region as region',
        'madukas.district as district','madukas.street as street',
        'orders.total_order as total',
        'products.unit as unit','products.sold_price as sold_price',
        'products.category as category'
        ,'orders.status as status')->
         where('orders.ordering_shop_id',$request->shop_id)
        ->join('madukas','orders.ordered_shop_id', '=', 'madukas.id')
        ->join('products','orders.product_id', '=', 'products.id')
        ->orderBy('orders.id','desc')
        ->get();
        
        // Mail::to('harithijuma@gmail.com')->send(new NotifyMail($data));
 
        // if (Mail::failures()) {
        //      return response()->Fail('Sorry! Please try again latter');
        // }else{
        //      return 'Great! Successfully send in your mail';
        //    }
        Log::info($data);
        return view('seller.order.placed_order')->with('data',$data);
    }

    public function sellerPutOrder(Request $request){
   
      
        
    //    return  Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y H:i:s');
        
       
            $product = Product::where('id',$request->product_id)->first();
            if( $product->total < ($request->total_quantity+$request->subquantity)) {
                return back()->with('large_quantity','message.about');
            }else{
               
                $date = date('Y-m-d');
                $nameOfDay = date('l', strtotime($date));
                $nameOfMonth = date('M', strtotime($date));
                $nameOfYear = date('Y');

                $order = new Order();
                $order['user_id'] = Auth::id();
                $order['product_id'] = $request->product_id;
                $order['ordering_shop_id'] = Session::get('shop_id');
                $order['ordered_shop_id'] = $product->shop_id;
                $order['total_order'] = ($request->total_quantity+$request->subquantity);
                $order['description'] = $request->description;
                $order['year'] = $nameOfYear;
                $order['month'] = $nameOfMonth;
                $order->save();
    
                // $notification = new Notification();
                // $notification['shop_id'] = $product->shop_id; 
                // $notification['product_id'] = $request->product_id;
                // $notification['description'] = $request->description;
                // $notification->save();
        
                return back()->with('success','Successfuly Order placed Wait for confirmation  ....');
            }
       
           
          
    }

    
    public function sellerIncomingOrder(Request $request){

        $data = Order::select('Orders.id as id','madukas.shop_name as shop_name',
         'products.name as product_name','madukas.country as country','madukas.region as region',
         'madukas.district as district','madukas.street as street','orders.total_order as total',
         'products.unit as unit','orders.status as status')
        ->where('orders.ordered_shop_id',$request->shop_id)
        ->where('orders.status','normal')->where('orders.isConfirmed',0)
        ->join('madukas','orders.ordering_shop_id', '=', 'madukas.id')
        ->join('sellers','sellers.user_id','=','orders.user_id')
        ->join('products','orders.product_id', '=', 'products.id')->orderBy('Orders.id','desc')
        ->get();
        Log::info($data);
        return view('seller/order.seller_incoming_order')->with('data',$data);
    }

    public function sellerDeliveredorder(Request $request){

        $data = Order::select('Orders.id as id','madukas.shop_name as shop_name',
        'products.name as product_name','madukas.country as country',
        'madukas.region as region',
        'madukas.district as district','madukas.street as street',
        'orders.total_order as total',
        'products.unit as unit','products.sold_price as sold_price',
        'products.category as category'
        ,'orders.status as status')->
         where('orders.ordering_shop_id',$request->shop_id)
         ->where('orders.status','delivered')->where('orders.isConfirmed',0)
        ->join('madukas','orders.ordered_shop_id', '=', 'madukas.id')
        ->join('products','orders.product_id', '=', 'products.id')
        ->orderBy('orders.id','desc')
        ->get();
        Log::info($data);
        return view('seller/order.delivered_order')->with('data',$data);
    }

    public function sellerAcceptOrder(Request $request){
      
        try {
            
            $data =  Order::where('id',$request->id)->first();
            try {
                $product =  Product::where('id',$data['product_id'])->where('expire','>=',date('Y-m-d'))->first();
                if( $product->total < $data['total_order']) {
                    return back()->with('large_quantity','message.about');
                } else {

                    $product['total'] =  $product['total'] - $data['total_order'];
                    $product->save();

                    $data['status'] = 'accepted';
                    $data->save();
                    return back()->with('success2','Order accepted Successfull.');
                }
          
            } catch (Exception  $e) {
                if (Str::contains($e->getMessage(),['null'])) {
                    return back()->with('expire','A product has been Expired, You may reject it');
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $product['total'];
    }

    public function sellerRejectOrder(Request $request){
        $data =  Order::where('id',$request->id)->first();
        $data['status'] = 'rejected';
        $data['isConfirmed'] = 1;
        $data->save();
        return back()->with('success2','Order Rejected.');
    }

    public function sellerConfirmDelivery(Request $request)
    {
        $data =  Order::where('id',$request->id)->first();
        $data['status'] = 'delivered';
        $data->save();
        return back()->with('success2','Order Already Delivered..');
    }

    public function ownerPlacedOrder(Request $request){
        // $date = date('Y-m-d');
        // $date1=date('Y-m-d');
        // $nameOfDay = date('l', strtotime($date));
        // $nameOfMonth = date('M', strtotime($date));
        // $nameOfYear = date('Y');

        // Tuta select huko baadae
        $data = Order::select('Orders.id as id','madukas.shop_name as shop_name',
        'products.name as product_name','madukas.country as country',
        'madukas.region as region',
        'madukas.district as district','madukas.street as street',
        'orders.total_order as total',
        'products.unit as unit','products.sold_price as sold_price',
        'products.category as category'
        ,'orders.status as status')->
         where('orders.ordering_shop_id',Session::get('shop_id'))
        ->join('madukas','orders.ordered_shop_id', '=', 'madukas.id')
        ->join('products','orders.product_id', '=', 'products.id')
        ->orderBy('orders.id','desc')
        ->get();
        
        // Mail::to('harithijuma@gmail.com')->send(new NotifyMail($data));
 
        // if (Mail::failures()) {
        //      return response()->Fail('Sorry! Please try again latter');
        // }else{
        //      return 'Great! Successfully send in your mail';
        //    }
        Log::info($data);
        return view('owner.order.placed_order')->with('data',$data);
    }

    public function ownerIncomingOrder(Request $request){

        $data = Order::select('Orders.id as id','madukas.shop_name as shop_name',
         'products.name as product_name','madukas.country as country','madukas.region as region',
         'madukas.district as district','madukas.street as street','orders.total_order as total',
         'products.unit as unit','orders.status as status')
        ->where('orders.ordered_shop_id',Session::get('shop_id'))
        ->where('orders.status','normal')->where('orders.isConfirmed',0)
        ->join('madukas','orders.ordering_shop_id', '=', 'madukas.id')
        ->join('sellers','sellers.user_id','=','orders.user_id')
        ->join('products','orders.product_id', '=', 'products.id')->orderBy('Orders.id','desc')
        ->get();
        Log::info($data);
        return view('owner/order.owner_incoming_order')->with('data',$data);
    }

    public function ownerDeliveredorder(Request $request){

        $data = Order::select('Orders.id as id','madukas.shop_name as shop_name',
        'products.name as product_name','madukas.country as country',
        'madukas.region as region',
        'madukas.district as district','madukas.street as street',
        'orders.total_order as total',
        'products.unit as unit','products.sold_price as sold_price',
        'products.category as category'
        ,'orders.status as status')->
         where('orders.ordering_shop_id',Session::get('shop_id'))
         ->where('orders.status','delivered')->where('orders.isConfirmed',0)
        ->join('madukas','orders.ordered_shop_id', '=', 'madukas.id')
        ->join('products','orders.product_id', '=', 'products.id')
        ->orderBy('orders.id','desc')
        ->get();
        Log::info($data);
        return view('owner/order.delivered_order')->with('data',$data);
    }

}
