<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Image;
use App\PayoutTransactions;
use App\User;
use App\Incentive;
use App\DirectReferral;
use App\IndirectReferral;
use Carbon\Carbon;
use App\Products;
use App\ProductOrders;
use App\ProductOrderDetails;
use App\GadgetIncentive;
use App\Videos;


class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
         $check_user = User::where('id', Auth::user()->id)->where('status', '0')->count();
        
         if($check_user != null ){ Auth::logout(); return view('welcome'); } else {


          /** $updatewallet = DB::table('indirect_referrals')
                  ->select('user_com_one', 'user_com_two','user_com_three', 'user_com_four','user_com_five', 'user_com_six','user_com_seven', 'user_com_eight','user_com_nine', 'user_com_ten')
                  ->where('user_id','=',Auth::user()->id)->get();


            $com1 = 0;   $com2 = 0;   $com3 = 0;   $com4 = 0;   $com5 = 0;   $com6 = 0;
            $com7 = 0;  $com8 = 0;  $com9 = 0;  $com10 = 0;

            foreach ($updatewallet as $key => $value) {
                # code...
                   $com1 = $com1+$value->user_com_one;
                   $com2 = $com2+$value->user_com_two;
                   $com3 = $com3+$value->user_com_three;
                   $com4 = $com4+$value->user_com_four;
                   $com5 = $com5+$value->user_com_five;
                   $com6 = $com6+$value->user_com_six;
                   $com7 = $com7+$value->user_com_seven;
                   $com8 = $com8+$value->user_com_eight;
                   $com9 = $com9+$value->user_com_nine;
                   $com10 = $com10+$value->user_com_ten;
                  
              }

            $twallet = $com1 + $com2+ $com3+ $com4+ $com5+ $com6+ $com7+ $com8+ $com9+ $com10;
        
            $updatedrp = User::where('id',Auth::user()->id)->first();

                if($updatedrp){
                    $updatedrp->wallet = $updatedrp->wallet + $twallet;
                   
                    if($updatedrp->save()){
                        DB::table('indirect_referrals')
                        ->where('user_id', Auth::user()->id)
                        ->update(['user_com_one' =>0,'user_com_two' =>0,'user_com_three' =>0,'user_com_four' =>0,'user_com_five' =>0,'user_com_six' =>0,'user_com_seven' =>0,'user_com_eight' =>0,'user_com_nine' =>0,'user_com_ten' =>0]);
                    }
                      
                } **/

        $referrals_today = User::where('referral_id', Auth::user()->id)->where('status', '1')->whereDate('created_at', Carbon::today())->count();
        $referrals_all = User::where('referral_id', Auth::user()->id)->where('status', '1')->count();


           //$date = today()->format('Y-m-d');
        $signup_today  = User::where('referral_id', Auth::user()->id)->whereDate('created_at', '>', Carbon::now())->count();

        $yesterday = date("Y-m-d", strtotime( '-1 days' ));
        $countYesterday = User::where('referral_id', Auth::user()->id)->whereDate('created_at', $yesterday)->count();



        $today =Carbon::today();
        $countLastSevenDays = User::where('referral_id', Auth::user()->id)->where('created_at', '>', $today->subDays(7))->count();

        $usersChart = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count'); 

         $jan = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '01')
                    //->WHERE MONTH(create_date) = 5
                    ->pluck('count');

         $feb = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '02')
                    ->pluck('count');  

         $march = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '03')
                    ->pluck('count');    

         $april = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '04')
                    ->pluck('count');    


         $may = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '05')
                    ->pluck('count');    

         $june = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '06')
                    ->pluck('count');    

         $july = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '07')
                    ->pluck('count');    

         $aug = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '08')
                    ->pluck('count');    

         $sep = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '09')
                    ->pluck('count');    

         $oct = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '10')
                    ->pluck('count');    

         $nov = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '11')
                    ->pluck('count');    

         $dec = User::select(\DB::raw("COUNT(*) as count"))
                    ->where('referral_id', Auth::user()->id)
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '12')
                    ->pluck('count');    

        return view('user/dashboard', compact('referrals_all', 'referrals_today','usersChart','signup_today','countYesterday','countLastSevenDays','jan','feb','march','april','may','june','july','aug','sep','oct','nov','dec'));

      }
    }

    public function profile() {

         $sponsor = User::where('id', Auth::user()->referral_id)->first();

        return view('user/profile', compact('sponsor'));
    }

    public function update_avatar(Request $request) {

        // Handle the user upload of avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        $sponsor = User::where('id', Auth::user()->referral_id)->first();

        return view('user/profile', array('user' => Auth::user(),'sponsor' => $sponsor));
    }


    public static function getAvatar($id) {

         $avatar = User::select('avatar')->where('id', $id)->first();

         if($avatar){
            $temp = $avatar->avatar;
            return $temp;
            }else{
              $temp = 'noavatar.jpg';
            return  $temp;
        }
    }

    public static function getUsername($id) {

         $username = User::select('username')->where('id', $id)->first();

         if($username){
            return $username->username;
        }else{
            return null;
        }
    }




    public function update_profile(Request $request) {

        $validatedData = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'incentive_option' => 'required|max:255',
            'contact' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|max:55',
            'travel_agency_name' => 'min:6',
            'birthdate' => 'required',
        ]);

        User::whereId(Auth::user()->id)->update($validatedData);

        //return redirect('user/profile')->with('success', 'Your profile is successfully updated');

        return redirect()->back()->withSuccess('Your profile is successfully updated');
    }

    public function earn() {
        $referrals = User::where('referral_id', Auth::user()->id)->where('status', '1')->get();

        return view('user/earn', compact('referrals'));
    }

    public function update_encash(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->wallet = Auth::user()->wallet - $request['amount'];

        if($request['amount'] <= 499){
            return redirect()->back()->with('errors', 'Minimum amount to withdraw is P500');
              exit(); 
        }else{
        $user->save();

        PayoutTransactions::create($request->all());

        return redirect()->back()->withSuccess('Payout Encash Successfully Done.');
     }
    }

    public function monoline() {
        $referral_one = User::where('referral_id', Auth::user()->id)->where('status', '1')->get();

              /**  $referral_one = DB::table('indirect_referrals')
                ->select('users.id as id', 'users.firstname as firstname','users.referral_id as referral_id','users.username as username','users.avatar as avatar', 'users.lastname as lastname', 'users.contact as contact', 'users.package_option as package_option', 'indirect_referrals.user_ref_one as user_ref_one', 'indirect_referrals.user_ref_two as user_ref_two', 'indirect_referrals.user_ref_three as user_ref_three', 'indirect_referrals.user_ref_four as user_ref_four', 'indirect_referrals.user_ref_five as user_ref_five', 'indirect_referrals.user_ref_six as user_ref_six', 'indirect_referrals.user_ref_seven as user_ref_seven', 'indirect_referrals.user_ref_eight as user_ref_eight', 'indirect_referrals.user_ref_nine as user_ref_nine', 'indirect_referrals.user_ref_ten as user_ref_ten', 'indirect_referrals.user_ref_eleven as user_ref_eleven')
                ->leftJoin('users', 'indirect_referrals.user_id','=','users.id')
                ->where('user_id', Auth::user()->id)
                ->get(); **/

                //var_dump($referrals); exit();

        return view('user/monoline', compact('referral_one'));
    }

    public function downline($id) {
       // $referrals = User::where('referral_id', Auth::user()->id)->get();

               /** $downlines = DB::table('indirect_referrals')
                ->select('users.id as id', 'users.firstname as firstname','users.referral_id as referral_id','users.username as username','users.avatar as avatar', 'users.lastname as lastname', 'users.contact as contact', 'users.package_option as package_option', 'indirect_referrals.user_ref_one as user_ref_one', 'indirect_referrals.user_ref_two as user_ref_two', 'indirect_referrals.user_ref_three as user_ref_three', 'indirect_referrals.user_ref_four as user_ref_four', 'indirect_referrals.user_ref_five as user_ref_five', 'indirect_referrals.user_ref_six as user_ref_six', 'indirect_referrals.user_ref_seven as user_ref_seven', 'indirect_referrals.user_ref_eight as user_ref_eight', 'indirect_referrals.user_ref_nine as user_ref_nine', 'indirect_referrals.user_ref_ten as user_ref_ten', 'indirect_referrals.user_ref_eleven as user_ref_eleven')
                ->leftJoin('users', 'indirect_referrals.user_id','=','users.id')
                ->where('user_id', $id)
                ->get(); **/


          $downlines = User::where('referral_id', $id)->where('status', '1')->get();

   

        return view('user/downline', compact('downlines','id'));
    }


    public function upgrade_vip(Request $request) {  
         $validatedData = $request->validate([
                //'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);     
        

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/payment_receipt'), $imageName);

            DB::table('payment_receipts')->insert(
                [
                    'user_id' => $_POST['user_id'], 
                    'type' => $_POST['incentive_option'],
                    'file' => $imageName,
                    'pre_package' => $_POST['prepackage_option'],
                    'upgrade' => 'yes',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
            
        
        return redirect()->back()->withSuccess('Request for Account Upgrade successfully sent. Please wait while we verify your payment. Thank you!');
    }

    public function transactions() {
        $encashments = PayoutTransactions::where('user_id', Auth::user()->id)->get();
        $pending = PayoutTransactions::where('user_id', Auth::user()->id)->where('status', '0')->sum('amount');
        $payout = PayoutTransactions::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');

        return view('user/transactions', compact('encashments', 'pending', 'payout'));
    }

    public function withdraw() {
        $encashments = PayoutTransactions::where('user_id', Auth::user()->id)->get();
        $pending = PayoutTransactions::where('user_id', Auth::user()->id)->where('status', '0')->sum('amount');
        $payout = PayoutTransactions::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        return view('user/withdraw', compact('encashments', 'pending', 'payout'));
    }

     public function cart()
    {
        //$cart = session()->get('cart');
        //$cart = null;
        //session()->flush();
        return view('user/cart');
    }

    public function product_order(Request $request) {  

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/payment_receipt'), $imageName);

        $order = new ProductOrders;
        $order->user_id = Auth::user()->id;
        $order->name = $_POST['name'];
        $order->address = $_POST['address'];
        $order->phone = $_POST['phone'];
        $order->total = $_POST['total'];
        $order->payment_option = $_POST['payment_option'];
        $order->order_receipt = $imageName;
        $order->status = 'ongoing';
        $order->save();
        $order_id = $order->id;

        $cart = session()->get('cart');

        foreach(session('cart') as $id => $details){
            $orderDetails = new ProductOrderDetails;
            $orderDetails->order_id = $order_id;
            $orderDetails->product_id = $id;
            $orderDetails->price = $details['price'];
            $orderDetails->quantity = $details['quantity'];
            $orderDetails->save();
             unset($cart[$id]);
        }


       
        session()->put('cart', $cart);

        return redirect()->back()->withSuccess('Thank you for shopping with us! <br><br>
Our Administrator is currently reviewing your details, please make sure you include your payment receipt copy.<br>
Once verified, Please take note that due to pandemic issue, your item will be delivered within 3 to 15 days.!');
    }


    public function add_to_cart($id) {
         $product = Products::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->image
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update_cart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove_product(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }



    public function travel_portal() {
        return view('user/travel-portal');
    }

    public function travel_tours() {
        return view('user/travel-tours');
    }

    public function eloading() {
        return view('user/e-loading');
    }

    public function products() {
        $products = DB::table('products')->get();        
        return view('user/products', ['products' => $products]);
    }

    public function social() {
        return view('user/social');
    }

    public function incentives() {
        return view('user/incentives');
    }

    public function gadget_incentives() {
        $data = DB::table('gadget_incentives')->where('status', '1')->get();  
        $id = Auth::id();        
        return view('user/gadget-incentive', compact('data','id'));
    }

    public function car_incentives() {        
        $data = DB::table('car_incentives')->where('status', '1')->get();  
        $id = Auth::id();
        return view('user/car-incentive', compact('data','id'));
    }

    public function save_incentives(Request $request) {

        $user = User::find(Auth::user()->id);
        $user->drp = Auth::user()->drp - $_POST['drp'];
        $user->save();
         
        DB::table('incentive_transaction')->insert(
            array('incentive_id' => $_POST['incentive_id'], 'user_id' => $_POST['user_id'], 'type' => $_POST['type'])
        );
        return redirect()->back()->withSuccess('Congratulations! You have successfully avail this incentive.');
    }

    public function travel_incentives() {
        $data = DB::table('travel_incentives')->where('status', '1')->get();  
        $id = Auth::id();
        return view('user/travel-incentive', compact('data','id'));
    }

    public function video_tutorial() {        
        $data = Videos::where('status', '1')->where('category', 'tutorial')->get();
    
        return view('user/video-tutorial', ['data' => $data]);
    }

    public function vip_trainings() {
         $data = Videos::where('status', '1')->where('category', 'vip')->get();
        return view('user/vip-trainings', ['data' => $data]);
    }

    public function testmail() {
        $to_name = '‘RECEIVER_NAME’';
        $to_email = 'harreyson.chavez@gmail.com';
        $data = array('name'=>"Ogbonna Vitalis(sender_name)", "body" => "A test mail");
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Laravel Test Mail');
        $message->from('SENDER_EMAIL_ADDRESS','Test Mail');
        });
    }

}
