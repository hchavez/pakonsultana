<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Auth;
use DB;
use Image;
use App\User;
use App\Incentive;
use App\IndirectReferral;
use App\PaymentDetails;
use App\IncentiveSettings;
use App\IncentiveTransaction;
use App\SiteSettings;
use App\GadgetIncentive;
use App\TravelIncentive;
use App\CarIncentive;
use Carbon\Carbon;
use App\Products;
use App\ProductOrders;
use App\Vip;
use App\VideoPresentation;
use App\Videos;
use App\PayoutTransactions;
use App\Announcements;
use Config;



class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {

        //update referrals ammount

         $updatewallet = DB::table('indirect_referrals')
                  ->select('user_id','user_com_one', 'user_com_two','user_com_three', 'user_com_four','user_com_five', 'user_com_six','user_com_seven', 'user_com_eight','user_com_nine', 'user_com_ten')
                  ->where('status','1')->get();


            $com1 = 0;   $com2 = 0;   $com3 = 0;   $com4 = 0;   $com5 = 0;   $com6 = 0;
            $com7 = 0;  $com8 = 0;  $com9 = 0;  $com10 = 0;
            $user_id = 0;

            foreach ($updatewallet as $key => $value) {
                # code...
                   $com1 = $value->user_com_one;
                   $com2 = $value->user_com_two;
                   $com3 = $value->user_com_three;
                   $com4 = $value->user_com_four;
                   $com5 = $value->user_com_five;
                   $com6 = $value->user_com_six;
                   $com7 = $value->user_com_seven;
                   $com8 = $value->user_com_eight;
                   $com9 = $value->user_com_nine;
                   $com10 = $value->user_com_ten;
                  $user_id = $value->user_id;
              

            $twallet = $com1 + $com2+ $com3+ $com4+ $com5+ $com6+ $com7+ $com8+ $com9+ $com10;
        
            $updatedrp = User::where('id',$user_id)->first();

                if($updatedrp){
                    $updatedrp->wallet = $updatedrp->wallet + $twallet;
                   
                    if($updatedrp->save()){
                        DB::table('indirect_referrals')
                        ->where('user_id', $user_id)
                        ->update(['user_com_one' =>0,'user_com_two' =>0,'user_com_three' =>0,'user_com_four' =>0,'user_com_five' =>0,'user_com_six' =>0,'user_com_seven' =>0,'user_com_eight' =>0,'user_com_nine' =>0,'user_com_ten' =>0,'status' =>0]);
                    }
                      
                }
            }
        

        $active_users = User::where('status', '1')->count();
        $all_users = User::where('status','<>', '2')->count();
        $total_payout = User::where('status', '1')->sum('wallet');

        $premium_users = User::where('package_option', 'premium')->count();
        $vip_users = User::where('package_option', 'vip')->count();

        $total_expenses = DB::table('income_reports')->where('status','1')->sum('expenses');
        $total_netincome = DB::table('income_reports')->where('status','1')->sum('net_income');
        $total_revenue = DB::table('income_reports')->where('status','1')->sum('revenue');

        $active = User::where('status','1')->get();
        $active_count = count($active);

        //$date = today()->format('Y-m-d');
        $signup_today  = User::whereDate('created_at', '>', Carbon::now())->count();

        $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
        $countYesterday = User::whereDate('created_at', $yesterday )->count();



        $today =Carbon::today();
        $countLastSevenDays = User::where('created_at', '>', $today->subDays(7))->count();

        $usersChart = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');   

        $jan = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '01')
                    //->WHERE MONTH(create_date) = 5
                    ->pluck('count');  


         $feb = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', '=', '02')
                    //->WHERE MONTH(create_date) = 5
                    ->pluck('count');  

         $march = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '03')
                    ->pluck('count');  

         $april = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '04')
                    ->pluck('count');  

         $may = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '05')
                    ->pluck('count');  

         $june = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '06')
                    ->pluck('count');  

         $july = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '07')
                    ->pluck('count');  

         $aug = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '08')
                    ->pluck('count');  

         $sep = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '09')
                    ->pluck('count');  

         $oct = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '10')
                    ->pluck('count');  

         $nov = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '11')
                    ->pluck('count');  

         $dec = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                     ->whereMonth('created_at', '=', '12')
                    ->pluck('count');  

        
    return view('admin', compact('all_users','active_users','total_payout','total_expenses','active_count','usersChart','signup_today','countYesterday','countLastSevenDays','premium_users','vip_users','total_expenses','total_netincome','total_revenue','jan','feb','march','april','may','june','july','aug','sep','oct','nov','dec'));
    }

    public static function getUsername($id) {

         $username = User::select('username')->where('id', $id)->first();

         if($username){
            return $username->username;
        }else{
            return null;
        }
    }


    public function approve_user(request $request)  {

        $getstatus = User::where('id',$_POST['referral_id'])->first();     
        $refuser = $_POST['referral_id'];

        if(!$getstatus){
              return redirect()->back()->with('errors', 'Activate User Failed. Referral ID Not Found, please contact user.');
              exit();
        }


         if($getstatus->status == '1'){

            if($_POST['package'] == 'premium'){
                $packageoption = 2500;
                $directcom = Config::get('constant.premium.direct');
                $indirectcom2 = Config::get('constant.premium.level2');
                $indirectcom3 = Config::get('constant.premium.level3');
                $indirectcom4 = Config::get('constant.premium.level4');
                $indirectcom5 = Config::get('constant.premium.level5');
                $indirectcom6 = Config::get('constant.premium.level6');
                $indirectcom7 = Config::get('constant.premium.level7');
                $indirectcom8 = Config::get('constant.premium.level8');
                $indirectcom9 = Config::get('constant.premium.level9');
                $indirectcom10 = Config::get('constant.premium.level10');
                $indirectcom11 = Config::get('constant.premium.level11');
            }else{
                $packageoption = 5998;
                $directcom = Config::get('constant.vip.direct');
                $indirectcom2 = Config::get('constant.vip.level2');
                $indirectcom3 = Config::get('constant.vip.level3');
                $indirectcom4 = Config::get('constant.vip.level4');
                $indirectcom5 = Config::get('constant.vip.level5');
                $indirectcom6 = Config::get('constant.vip.level6');
                $indirectcom7 = Config::get('constant.vip.level7');
                $indirectcom8 = Config::get('constant.vip.level8');
                $indirectcom9 = Config::get('constant.vip.level9');
                $indirectcom10 = Config::get('constant.vip.level10');
                $indirectcom11 = Config::get('constant.vip.level11');

                $updatedrp = User::where('id',$_POST['referral_id'])->first();

                
                if($updatedrp){
                    $updatedrp->drp = $updatedrp->drp + 1;
                    $updatedrp->save();
                }

            }

             $commlevel1 = 0; $commlevel2 = 0; $commlevel3 = 0; $commlevel4 = 0; $commlevel5 = 0; $commlevel6 = 0;
             $commlevel7 = 0; $commlevel8 = 0; $commlevel9 = 0; $commlevel10 = 0; $commlevel11 = 0; 

            //check count referral limit to 10 direct only
            $noref = DB::table('indirect_referrals')
                ->where('user_id',$_POST['referral_id']) 
                ->count();

            $comm = 0;
            

                $getsubuserone = DB::table('indirect_referrals')->where('user_ref_one',$_POST['referral_id'])->get();
                 $commlevel1 = $directcom;
               $updatedTime =  Carbon::now()->addMinute(10);



                if(count($getsubuserone) > 0):
                    $saverefone=DB::table('indirect_referrals')->where('user_ref_one', $_POST['referral_id'])->update(['user_ref_two' => $_POST['user_id'],'user_com_two' => $indirectcom2,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);
    
                    if($saverefone){
                        $commlevel2 = $indirectcom2;
                    }
                endif;

                $getsubusertwo = DB::table('indirect_referrals')->where('user_ref_two',$_POST['referral_id'])->get();

                if(count($getsubusertwo) > 0):
                    $savereftwo=DB::table('indirect_referrals')->where('user_ref_two', $_POST['referral_id'])->update(['user_ref_three' => $_POST['user_id'],'user_com_three' => $indirectcom3,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($savereftwo){
                        $commlevel3 = $indirectcom3;
                    }
                endif;

                $getsubuserthree = DB::table('indirect_referrals')->where('user_ref_three',$_POST['referral_id'])->get();

                if(count($getsubuserthree) > 0):
                    $saverefthree=DB::table('indirect_referrals')->where('user_ref_three', $_POST['referral_id'])->update(['user_ref_four' => $_POST['user_id'],'user_com_four' => $indirectcom4,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($saverefthree){
                        $commlevel4 = $indirectcom4;
                    }
                endif;

                $getsubuserfour = DB::table('indirect_referrals')->where('user_ref_four',$_POST['referral_id'])->get();

                if(count($getsubuserfour) > 0):
                    $savereffour=DB::table('indirect_referrals')->where('user_ref_four', $_POST['referral_id'])->update(['user_ref_five' => $_POST['user_id'],'user_com_five' => $indirectcom5,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($savereffour){
                        $commlevel5 = $indirectcom5;
                    }
                endif;

                $getsubuserfive = DB::table('indirect_referrals')->where('user_ref_five',$_POST['referral_id'])->get();

                if(count($getsubuserfive) > 0):
                    $savereffive=DB::table('indirect_referrals')->where('user_ref_five', $_POST['referral_id'])->update(['user_ref_six' => $_POST['user_id'],'user_com_six' => $indirectcom6,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($savereffive){
                        $commlevel6 = $indirectcom6;
                    }
                endif;

                $getsubusersix = DB::table('indirect_referrals')->where('user_ref_six',$_POST['referral_id'])->get();

                if(count($getsubusersix) > 0):
                    $saverefsix=DB::table('indirect_referrals')->where('user_ref_six', $_POST['referral_id'])->update(['user_ref_seven' => $_POST['user_id'],'user_com_seven' => $indirectcom7,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($saverefsix){
                        $commlevel7 = $indirectcom7;
                    }
                endif;

                $getsubuserseven = DB::table('indirect_referrals')->where('user_ref_seven',$_POST['referral_id'])->get();

                if(count($getsubuserseven) > 0):
                    $saverefseven=DB::table('indirect_referrals')->where('user_ref_seven', $_POST['referral_id'])->update(['user_ref_eight' => $_POST['user_id'],'user_com_eight' => $indirectcom8,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($saverefseven){
                        $commlevel8 = $indirectcom8;
                    }
                endif;

                 $getsubusereight = DB::table('indirect_referrals')->where('user_ref_eight',$_POST['referral_id'])->get();

                if(count($getsubusereight) > 0):
                    $saverefeight=DB::table('indirect_referrals')->where('user_ref_eight', $_POST['referral_id'])->update(['user_ref_nine' => $_POST['user_id'],'user_com_nine' => $indirectcom9,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($saverefeight){
                        $commlevel9 = $indirectcom9;
                    }
                endif;

                $getsubusernine = DB::table('indirect_referrals')->where('user_ref_nine',$_POST['referral_id'])->get();

                if(count($getsubusernine) > 0):
                    $saverefnine=DB::table('indirect_referrals')->where('user_ref_nine', $_POST['referral_id'])->update(['user_ref_ten' => $_POST['user_id'],'user_com_ten' => $indirectcom10,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                    if($saverefnine){
                        $commlevel10 = $indirectcom10;
                    }
                endif;

                $getsubuserten = DB::table('indirect_referrals')->where('user_ref_ten',$_POST['referral_id'])->get();

                if(count($getsubuserten) > 0):
                    //$savereften=DB::table('indirect_referrals')->where('user_ref_ten', $_POST['referral_id'])->update(['user_ref_eleven' => $_POST['user_id'],'user_com_eleven' => $indirectcom11,'updated_at' => Carbon::now()->addMinutes(10),'status' => '1']);

                   
                     $vaer = DB::table('indirect_referrals')->where('user_ref_ten', '=',$_POST['referral_id'])->first();


                             $savereften= DB::table('indirect_referrals')->insert(
                        [
                            'user_id' => $vaer->user_id, 
                            'user_ref_eleven' => $_POST['user_id'], 
                            'user_com_eleven' => $indirectcom11,
                            'updated_at' => Carbon::now()->addMinutes(10),
                            'status' => '1'
                        ]
                        );

                    if($savereften){
                        $commlevel11 = $indirectcom11;
                    }
                endif;

             $saveindirect = DB::table('indirect_referrals')->insert(
                    [   'user_id' => $_POST['referral_id'], 
                        'user_ref_one' => $_POST['user_id'],
                        'user_com_one' => $directcom,
                        'status' => '1'
                    ]           
                );

             //exit();
            $approve = User::find($_POST['user_id']);
            $approve->status = 1;
            $approve->save();


            $totalexpenses = $commlevel1+$commlevel2+$commlevel3+$commlevel4+$commlevel5 + $commlevel6 + $commlevel7 +$commlevel8 + $commlevel9 + $commlevel10 + $commlevel11;
            $netincome = $packageoption - $totalexpenses;

            DB::table('income_reports')->insert(
                [
                    'user_id' => $_POST['user_id'], 
                    'net_income' => $netincome,
                    'expenses' => $totalexpenses,
                    'revenue' => $packageoption
                ]
            );

         
            return redirect()->back()->withSuccess('You have successfully activated a user!');

        }else{

           return redirect()->back()->with('errors', 'Activate User Failed. Referral ID is Inactive.');   

        }
        
    }

    public function deactivate_user(request $request)  {

            $approve = User::find($_POST['id']);
            $approve->status = '2';
            $approve->save();
         
             return redirect()->back()->withSuccess('You have successfully temporary deactivated!');
        
    }

    public function delete_user(request $request) 
    {        
        DB::table('users')->where('id', '=', $_POST['id'])->delete();
        return redirect()->back()->withSuccess('User successfully Deleted');
    }

    public function delete_order(request $request) 
    {        
        DB::table('product_orders')->where('id', '=', $_POST['id'])->delete();
        return redirect()->back()->withSuccess('Product Order Cancel Successfully!');
    }

    public function delete_payout(request $request) 
    {        
        $update_amt = User::find($_POST['id']);
        $update_amt->wallet =  $update_amt->wallet + $_POST['amount'];
        $update_amt->save();

        
        $update_amt = PayoutTransactions::find($_POST['payoutID']);
        $update_amt->status = '3';
        $update_amt->save();

        return redirect()->back()->withSuccess('User Payout Successfully Cancelled!');
    }




    public function income_settings() {
        $all_settings = SiteSettings::where('id','1')->first();
        return view('admin/income-settings', compact('all_settings'));
    }
    

    
    public function update_site_settings(Request $request)
    {
         $validatedData = $request->validate([
                'site_name' => 'required|max:255',
                'currency_symbol' => 'required|max:255',
                'limit_withdraw' => 'required|max:255',   
                'min_withdraw' => 'required|max:255',
                'premium_package' => 'required|max:255',
                'vip_package' => 'required|max:255',
                'premium_referral' => 'required|max:255',
                'vip_referral' => 'required|max:255',
           ]);

        SiteSettings::whereId($request['id'])->update($validatedData);

       return redirect()->back()->withSuccess('Site Settings successfully updated');
    }

    public function users() {
        $all_users = User::where('status','1')->orderBy('id')->get();
        $pending_users = User::where('status','0')->orderBy('id')->get();

        //update referrals ammount

             $updatewallet = DB::table('indirect_referrals')
                  ->select('user_id','user_com_one', 'user_com_two','user_com_three', 'user_com_four','user_com_five', 'user_com_six','user_com_seven', 'user_com_eight','user_com_nine', 'user_com_ten', 'user_com_eleven')
                  ->where('status','1')->get();


            $com1 = 0;   $com2 = 0;   $com3 = 0;   $com4 = 0;   $com5 = 0;   $com6 = 0;
            $com7 = 0;  $com8 = 0;  $com9 = 0;  $com10 = 0; $com11 = 0;
            $user_id = 0;

            foreach ($updatewallet as $key => $value) {
                # code...
                   $com1 = $value->user_com_one;
                   $com2 = $value->user_com_two;
                   $com3 = $value->user_com_three;
                   $com4 = $value->user_com_four;
                   $com5 = $value->user_com_five;
                   $com6 = $value->user_com_six;
                   $com7 = $value->user_com_seven;
                   $com8 = $value->user_com_eight;
                   $com9 = $value->user_com_nine;
                   $com10 = $value->user_com_ten;
           $com11 = $value->user_com_eleven;
                  $user_id = $value->user_id;
              

            $twallet = $com1 + $com2+ $com3+ $com4+ $com5+ $com6+ $com7+ $com8+ $com9+ $com10+ $com11;
        
            $updatedrp = User::where('id',$user_id)->first();

                if($updatedrp){
                    $updatedrp->wallet = $updatedrp->wallet + $twallet;
                   
                    if($updatedrp->save()){
                        DB::table('indirect_referrals')
                        ->where('user_id', $user_id)
                        ->update(['user_com_one' =>0,'user_com_two' =>0,'user_com_three' =>0,'user_com_four' =>0,'user_com_five' =>0,'user_com_six' =>0,'user_com_seven' =>0,'user_com_eight' =>0,'user_com_nine' =>0,'user_com_ten' =>0,'user_com_eleven' =>0,'status' =>0]);
                    }
                      
                }
            }


        return view('admin/users', compact('all_users','pending_users'));
    }

    public function upgrade_user(Request $request) {

            $upgrade = User::find($_POST['user_id']);
            $upgrade->package_option = $_POST['package_option'];
            $upgrade->incentive_option = $_POST['incentive_option'];
            $upgrade->role = $_POST['role'];
            $upgrade->pre_package = $_POST['pre_package'];
            $upgrade->save();


            $updrp = User::where('id',$_POST['referral_id'])->first();
            if($updrp){
                    $updrp->drp = $updrp->drp + 1;
                    $updrp->save();
            }


         DB::table('income_reports')->insert(
                [
                    'user_id' => $_POST['user_id'],
                    'revenue' => '3500',
                    'status' => '1'
                ]
            ); 


            DB::table('payment_receipts')->where('id', $_POST['payment_receipt_id'])->update(['upgrade' => 'yes-done']);
            
       return redirect()->back()->withSuccess('User successfully Upgraded');

    }




    public function payouts() {

        $pending_payout = DB::table('payout_transactions')
                ->select('users.id as id', 'users.firstname as firstname','users.referral_id as referral_id','users.username as username','users.birthdate as birthdate', 'users.lastname as lastname', 'users.contact as contact', 'users.package_option as package_option', 'users.address as address', 'users.travel_agency_name as travel_agency_name','users.payment_option as payment_option', 'users.package_option as package_option', 'users.drp as drp', 'users.email as email','payout_transactions.method as method', 'payout_transactions.amount as amount','payout_transactions.id as payoutID','payout_transactions.created_at as created_at','payout_transactions.status as status')
                ->leftJoin('users', 'payout_transactions.user_id', '=', 'users.id')
                ->where('payout_transactions.status','0')
                ->get();

          $approve_payout = DB::table('payout_transactions')
                ->select('users.id as id', 'users.firstname as firstname','users.referral_id as referral_id','users.username as username','users.birthdate as birthdate', 'users.lastname as lastname', 'users.contact as contact', 'users.package_option as package_option', 'users.address as address', 'users.travel_agency_name as travel_agency_name','users.payment_option as payment_option', 'users.package_option as package_option', 'users.drp as drp', 'users.email as email','payout_transactions.method as method', 'payout_transactions.amount as amount','payout_transactions.id as payoutID','payout_transactions.updated_at as updated_at','payout_transactions.status as status')
                ->leftJoin('users', 'payout_transactions.user_id', '=', 'users.id')
                 ->where('payout_transactions.status','1')
                ->get();


        return view('admin/payouts', compact('pending_payout','approve_payout'));
    }

    public function release_payout(Request $request) {

        $payout = PayoutTransactions::find($_POST['payoutID']);
        $payout->status = 1;
        $payout->created_at = $_POST['created_at'];
        $payout->updated_at = new Carbon();
        $payout->save();
         
        return redirect()->back()->withSuccess('Done! You have successfully released member payout.');
    }

    public function archive_payout(Request $request) {

        $payout = PayoutTransactions::find($_POST['payoutID']);
        $payout->status = 3;
        $payout->updated_at = new Carbon();
        $payout->save();
         
        return redirect()->back()->withSuccess('Done! You have successfully archive payout data.');
    }



    public function payment_methods() {
        $payment_details = PaymentDetails::all();
        return view('admin/payment-methods', compact('payment_details'));
    }

    public function announcement() {
        $announcements = Announcements::all();
        return view('admin/announcements', compact('announcements'));
    }

    public function product_orders() {
       $data = DB::table('product_orders') 
                    ->select('product_orders.id as id','users.firstname as firstname', 'users.lastname as lastname','product_orders.phone as phoneno','product_orders.address as address','product_orders.name as name','product_orders.total as total','product_orders.status as status','product_orders.created_at as created_at','product_orders.order_receipt as order_receipt','product_orders.payment_option as payment_option')
                //->leftJoin('product_order_details','product_order_details.order_id', '=', 'product_orders.id')
                //->leftJoin('products', 'product_order_details.product_id', '=', 'products.id')
                ->leftJoin('users', 'product_orders.user_id', '=', 'users.id')
                ->where('product_orders.status','ongoing')
                ->get();

         $dispatch = DB::table('product_orders') 
                    ->select('product_orders.id as id','users.firstname as firstname', 'users.lastname as lastname','product_orders.phone as phoneno','product_orders.address as address','product_orders.name as name','product_orders.total as total','product_orders.status as status','product_orders.created_at as created_at','product_orders.order_receipt as order_receipt','product_orders.payment_option as payment_option')
                //->leftJoin('product_order_details','product_order_details.order_id', '=', 'product_orders.id')
                //->leftJoin('products', 'product_order_details.product_id', '=', 'products.id')
                ->leftJoin('users', 'product_orders.user_id', '=', 'users.id')
                ->where('product_orders.status','delivered')
                ->get();

        return view('admin/product-orders', ['data' => $data,'dispatch' => $dispatch]);            
    }

    
     public function product_orders_details($id) {
       $data = DB::table('product_order_details') 
                    ->select('product_order_details.order_id as order_id','products.product_name as product_name','users.contact as contact','users.firstname as firstname', 'users.lastname as lastname','product_order_details.quantity as quantity','product_order_details.price as price','product_orders.order_receipt as order_receipt','product_orders.status as status','product_orders.name as name','product_orders.address as address','product_orders.phone as phone')
                ->leftJoin('product_orders','product_order_details.order_id', '=', 'product_orders.id')
                ->leftJoin('products', 'product_order_details.product_id', '=', 'products.id')
                ->leftJoin('users', 'product_orders.user_id', '=', 'users.id')
                ->where('product_order_details.order_id',$id)
                ->get();

        return view('admin/product-orders-details', ['data' => $data,'id' => $id])->with($id);       
    }

    public function approve_order(request $request)  {

            $approve = ProductOrders::find($_POST['order_id']);
            $approve->status = 'delivered';
            $approve->save();
         
             return redirect()->back()->withSuccess('You have successfully process/dispatch order');
        
    }


    public function product_orders_edit($id) {  
        $data = DB::table('product_orders')->where('id', $id)->first();    
        return view('admin.product-orders-edit', ['data' => $data]);        
    }
    public function update_product_orders(Request $request) {
        $validatedData = $request->validate([
                'product' => 'required|max:255',
                'payment' => 'required|max:255',
                'price' => 'required|max:255', 
                'status' => 'required|max:255', 
           ]);
        
        DB::table('product_orders')
            ->where('id', $request['id'])
            ->update($validatedData);

       return redirect()->back()->withSuccess('Order successfully updated');
    }
    public function add_product_orders() {        
        return view('admin.product-orders-add'); 
    } 
    public function store_product_orders(Request $request) {   
        $validatedData = $request->validate([
                'product' => 'required|max:255',
                'payment' => 'required|max:255',
                'price' => 'required|max:255', 
                'status' => 'required|max:255', 
           ]);     
       
        DB::table('product_orders')->insert(
            array($validatedData));

        return redirect()->back()->withSuccess('Order successfully Added');
    }
    public function delete_product_orders($id)
    {        
        DB::table('product_orders')->where('id', '=', $id)->delete();
        return redirect()->back()->withSuccess('Order successfully Deleted');
    }

    public function products() {
        $products = DB::table('products')->get();
        return view('admin.products', ['products' => $products]);         
    }

    public function product_edit($id) {        
        $product = Products::where('id', $id )->first();        
        return view('admin.product-edit', ['product' => $product]);        
    }

    public function add_product() {        
        return view('admin.product-add'); 
    }

    public function store_product(Request $request) {   
        $validatedData = $request->validate([
                'product_name' => 'required|max:255',
                'description' => 'required|max:255',
                'price' => 'required|max:255', 
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);     
        

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/products'), $imageName);

            DB::table('products')->insert(
                [
                    'product_name' => $_POST['product_name'], 
                    'description' => $_POST['description'],
                    'image' => $imageName,
                    'quantity' => $_POST['quantity'],
                    'price' => $_POST['price'],
                    'status' => '1'
                ]
            );
            
        
        return redirect()->back()->withSuccess('Product successfully Added');
    }



    public function update_product(Request $request) {
         $validatedData = $request->validate([
                'product_name' => 'max:255',
                'description' => 'max:255',
                'price' => 'max:255', 
                'quantity' => 'integer', 
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);

         if($request['image']){
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/products'), $imageName);
        }

        DB::table('products')->where('id', $request['id'])->update(['product_name' => $request['product_name'],'description' => $request['description'],'quantity' => $request['quantity'],'price' => $request['price'],'image' => $imageName]);
      
       return redirect()->back()->withSuccess('Product successfully updated');
    }

    public function delete_product($id)
    {
        Products::whereId($id)->delete();  
        return redirect()->back()->withSuccess('Product successfully Deleted');
    }

    public function delete_videos($id)
    {
        Videos::whereId($id)->delete();  
        return redirect()->back()->withSuccess('Video successfully Deleted');
    }

    public function store_videos(Request $request) {   
        $validatedData = $request->validate([
                'title' => 'required|max:255',
                'link' => 'required|max:255',
           ]);     
        

            DB::table('videos')->insert(
                [
                    'title' => $_POST['title'], 
                    'link' => $_POST['link'],
                    'category' => $_POST['category'],
                    'status' => '1'
                ]
            );
            
        
        return redirect()->back()->withSuccess('Video successfully Added');
    }


    public function update_videos(Request $request) {
         $validatedData = $request->validate([
                'title' => 'required|max:255',
                'link' => 'required|max:255',
           ]);

        Videos::whereId($request['id'])->update($validatedData);
       return redirect()->back()->withSuccess('Product successfully updated');
    }


    public function incentive_settings() {
        $all_gadget_incentives = GadgetIncentive::all();
        $all_travel_incentives = TravelIncentive::all();
        $all_car_incentives = CarIncentive::all();
        
        return view('admin/incentive-settings', compact('all_gadget_incentives','all_travel_incentives','all_car_incentives'));
    }

    public function add_incentive_settings() {        
        return view('admin.incentive-settings-add'); 
    }

    public function add_payment_method(Request $request){        
          $validatedData = $request->validate([
                'name' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);  

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/payment_methods'), $imageName);

        DB::table('payment_details')->insert(
                [
                    'name' => $_POST['name'], 
                    'icon' => $imageName,
                    'status' => 1
                ]
            );
      
        
        return redirect()->back()->withSuccess('New Payment Details Successfully Added');
    }

     public function delete_payment_method($id)
    {        
        DB::table('payment_details')->where('id', '=', $id)->delete();
        return redirect()->back()->withSuccess('Payment Details successfully Deleted');
    }

     public function update_payment_method(Request $request) {
        $validatedData = $request->validate([
                'name' => 'required|max:255',
                 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);        

          $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/payment_methods'), $imageName);

      

        DB::table('payment_details')->where('id', $request['id'])->update(['name' => $request['name'],'icon' => $imageName]);

      

        return redirect()->back()->withSuccess(' Payment Method successfully updated');
       
    }

    public function add_announcement(Request $request){        
          $validatedData = $request->validate([
                'name' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);  

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/announcements'), $imageName);

        DB::table('announcements')->insert(
                [
                    'name' => $_POST['name'], 
                    'image' => $imageName,
                    'status' => 1
                ]
            );
      
        
        return redirect()->back()->withSuccess('New Announcement Successfully Added');
    }

     public function delete_announcement($id)
    {        
        DB::table('announcements')->where('id', '=', $id)->delete();
        return redirect()->back()->withSuccess('announcements successfully Deleted');
    }

     public function update_announcement(Request $request) {
        $validatedData = $request->validate([
                'name' => 'required|max:255',
                 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);        

          $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/announcements'), $imageName);

    
        DB::table('announcements')->where('id', $request['id'])->update(['name' => $request['name'],'image' => $imageName]);
      

        return redirect()->back()->withSuccess(' announcement successfully updated');
       
    }


    public function store_incentive_settings(Request $request) {   
        
         //$image = $request->file('image');
        //$extension = $image->getClientOriginalExtension();
        //Storage::disk('incentives')->put($image->getFilename().'.'.$extension,  File::get($image));

        $validatedData = $request->validate([
                'name' => 'required|max:255',
                'drp' => 'required|max:255',
                'status' => 'required|max:255', 
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);  

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        if($_POST['type'] == 'gadget'){
            //$store = GadgetIncentive::create($validatedData);
            DB::table('gadget_incentives')->insert(
                [
                    'name' => $_POST['name'], 
                    'drp' => $_POST['drp'],
                    'image' => $imageName,
                    'status' => $_POST['status']
                ]
            );
        } else if($_POST['type'] == 'travel'){
            //$store = TravelIncentive::create($validatedData);
            DB::table('travel_incentives')->insert(
                [
                    'name' => $_POST['name'], 
                    'drp' => $_POST['drp'],
                    'image' => $imageName,
                    'status' => $_POST['status']
                ]
            );
        } else if($_POST['type'] == 'car'){
            //$store = CarIncentive::create($validatedData);
            DB::table('car_incentives')->insert(
                [
                    'name' => $_POST['name'], 
                    'drp' => $_POST['drp'],
                    'image' => $imageName,
                    'status' => $_POST['status']
                ]
            );
        }else{

        }        
        
        return redirect()->back()->withSuccess('Incentive successfully Added');
    }

    public function delete_incentive_settings($id)
    {        
        if($_GET['type'] == 'gadget'){            
            GadgetIncentive::find($id)->delete();
        } else if($_GET['type'] == 'travel'){         
            TravelIncentive::find($id)->delete();
        } else if($_GET['type'] == 'car'){         
            CarIncentive::find($id)->delete();
        } else {

        }
        
        return redirect()->back()->withSuccess('Incentive successfully Deleted');
    }

    public function incentive_settings_edit($id) { 

        if($_GET['type'] == 'gadget'){            
            $data = DB::table('gadget_incentives')->where('id', $id)->first();    
        } else if($_GET['type'] == 'travel'){         
            $data = DB::table('travel_incentives')->where('id', $id)->first();    
        } else if($_GET['type'] == 'car'){         
            $data = DB::table('car_incentives')->where('id', $id)->first();    
        } else {

        }
        
        return view('admin.incentive-settings-edit', ['data' => $data]);        
    }

    public function update_incentive_settings(Request $request) {
        $validatedData = $request->validate([
                'name' => 'required|max:255',
                'drp' => 'required|max:255',
                 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);        

          $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        if($_POST['type'] == 'gadget'){            

        DB::table('gadget_incentives')->where('id', $request['id'])->update(['name' => $request['name'],'drp' => $request['drp'],'image' => $imageName]);

        } else if($_POST['type'] == 'travel'){         
            DB::table('travel_incentives')->where('id', $request['id'])->update(['name' => $request['name'],'drp' => $request['drp'],'image' => $imageName]);
        } else if($_POST['type'] == 'car'){         
            DB::table('car_incentives')->where('id', $request['id'])->update(['name' => $request['name'],'drp' => $request['drp'],'image' => $imageName]);          
        } else {

        }

        return redirect()->back()->withSuccess(' successfully updated');
       
    }


    
    public function store_gadget_incentives(Request $request) {
         GadgetIncentive::updateOrCreate(['id' => $request->gadget_id],
                ['name' => $request->name, 'detail' => $request->detail]);        
   
        return response()->json(['success'=>'Gadget saved successfully.']);
    }
    
    
       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = GadgetIncentive::find($id);
        return response()->json($product);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GadgetIncentive::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }    
    

   public function incentive_qualifier() {

        $incentives = DB::table('incentive_transactions')
                ->select('users.id as id', 'users.firstname as firstname','users.wallet as wallet','users.username as username','incentive_transactions.name as title', 'users.lastname as lastname', 'users.contact as contact', 'users.package_option as package_option', 'users.address as address', 'users.travel_agency_name as travel_agency_name','users.payment_option as payment_option', 'users.drp as drp', 'users.email as email', 'incentive_transactions.created_at as created_at','incentive_transactions.id as incentive_transID','incentive_transactions.status as status')
                ->leftJoin('users','incentive_transactions.user_id', '=', 'users.id')
                ->where('incentive_transactions.status','0')
                ->get();

         $incentives_approved = DB::table('incentive_transactions')
                ->select('users.id as id', 'users.firstname as firstname','users.wallet as wallet','users.username as username','gincentive_transactions.name as title', 'users.lastname as lastname', 'users.contact as contact', 'users.package_option as package_option', 'users.address as address', 'users.travel_agency_name as travel_agency_name','users.payment_option as payment_option', 'users.drp as drp', 'users.email as email', 'incentive_transactions.created_at as created_at','incentive_transactions.id as incentive_transID','incentive_transactions.status as status')
                ->leftJoin('users','incentive_transactions.user_id', '=', 'users.id')
                ->where('incentive_transactions.status','1')
                ->get();

             
     return view('admin/incentive-qualifier', ['incentives' => $incentives,'incentives_approved' => $incentives_approved]);
    }
    
    public function release_incentive(Request $request) {

        $incentive = IncentiveTransaction::find($_POST['incentive_transID']);
        $incentive->status = 1;
        $incentive->save();
         
        return redirect()->back()->withSuccess('Done! You have successfully released incentive.');
    }


    public function account_upgrade() {
         $upgrade_users = DB::table('users')
                ->select('users.id as id', 'users.firstname as firstname','users.referral_id as referral_id','users.username as username','users.birthdate as birthdate', 'users.lastname as lastname', 'users.contact as contact', 'users.package_option as package_option', 'users.address as address', 'users.travel_agency_name as travel_agency_name','users.payment_option as payment_option', 'users.package_option as package_option', 'users.drp as drp', 'users.email as email','payment_receipts.pre_package as pre_package', 'payment_receipts.file as receipts', 'payment_receipts.type as type', 'payment_receipts.created_at as created_at','payment_receipts.id as payment_receipt_id','users.status as status')
                ->leftJoin('payment_receipts', 'users.id', '=', 'payment_receipts.user_id')
                ->where('payment_receipts.upgrade','yes')
                ->where('status','1')
                ->get();

        return view('admin/account-upgrade', compact('upgrade_users'));
    }   


    public function vip_training() {
        $video_trainings = DB::table('videos')->where('category','vip')->get();
        return view('admin/video-training', compact('video_trainings'));
    
    }
    public function vip_edit($id) {  
        $data = DB::table('vip_training')->where('id', $id)->first();    
        return view('admin.vip-training-edit', ['data' => $data]);        
    }
    public function update_vip(Request $request) {
        $validatedData = $request->validate([
                'payment_method' => 'required|max:255',
                'amount' => 'required|max:255',
                'status' => 'required|max:255', 
           ]);
        
        DB::table('vip_training')
            ->where('id', $request['id'])
            ->update($validatedData);

       return redirect()->back()->withSuccess('VIP successfully updated');
    }
    public function add_vip() {        
        return view('admin.vip-training-add'); 
    } 
    public function store_vip(Request $request) {   
        $validatedData = $request->validate([
                'payment_method' => 'required|max:255',
                'amount' => 'required|max:255',
                'status' => 'required|max:255', 
           ]);     
       
        DB::table('vip_training')->insert(
            array($validatedData));

        return redirect()->back()->withSuccess('VIP successfully Added');
    }
    public function delete_vip($id)
    {        
        DB::table('vip_training')->where('id', '=', $id)->delete();
        return redirect()->back()->withSuccess('VIP successfully Deleted');
    }
    
    public function video_tutorial() {
        $video_tutorials = DB::table('videos')->where('category','tutorial')->get();
        return view('admin/video-tutorial', compact('video_tutorials'));
    }

    public function video_training() {
        $video_trainings = DB::table('videos')->where('category','vip')->get();
        return view('admin/video-training', compact('video_trainings'));
    }

    public function video_presentation() {
        $data = DB::table('video_presentation')->get();
        return view('admin/video-presentation', ['data' => $data]);
    }
    public function video_presentation_edit($id) {  
        $data = DB::table('video_presentation')->where('id', $id)->first();    
        return view('admin.video-presentation-edit', ['data' => $data]);        
    }
    public function update_video_presentation(Request $request) {
        $validatedData = $request->validate([
                'video_link' => 'required|max:255',
                'amount' => 'required|max:255',                
           ]);
        
        DB::table('video_presentation')
            ->where('id', $request['id'])
            ->update($validatedData);

       return redirect()->back()->withSuccess('Video successfully updated');
    }
    public function add_video_presentation() {        
        return view('admin.video-presentation-add'); 
    } 
    public function store_video_presentation(Request $request) {   
        $validatedData = $request->validate([
                'video_link' => 'required|max:255',
                'amount' => 'required|max:255',
           ]);     
       
        DB::table('video_presentation')->insert(
            array($validatedData));

        return redirect()->back()->withSuccess('Video successfully Added');
    }
    public function delete_video_presentation($id)
    {        
        DB::table('video_presentation')->where('id', '=', $id)->delete();
        return redirect()->back()->withSuccess('Video successfully Deleted');
    }
    

}