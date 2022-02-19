<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\PaymentReceipt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'contact' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|max:55|unique:users',
            'password' => 'required|min:6|confirmed',
            'payment_receipt' => 'required|max:5120',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = User::where('username', $data['referral_id'])->first();

        
        $FILES = $_FILES["payment_receipt"];
        $upload_dir = public_path('/images/payment_receipt/');

         // create folder if not exists
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        //Change file name
      $imageFileType = pathinfo($FILES["name"],PATHINFO_EXTENSION);
      $target_file = $upload_dir.md5(time()).'.'.$imageFileType;
      $filename = md5(time()).'.'.$imageFileType;

        //Upload file
      move_uploaded_file($FILES["tmp_name"], $target_file);


       

      $getUser = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'birthdate' => $data['birthdate'],
            'contact' => $data['contact'],
            'address' => $data['address'],
            'referral_id' => $user['id'],
            'role' => $data['package_option'],
            'package_option' => $data['package_option'],
            'payment_option' => $data['payment_option'],
            'incentive_option' => $data['incentive_option'],
            'pre_package' => $data['prepackage_option'],
            'travel_agency_name' => $data['travel_agency_name'],
            'password' => bcrypt($data['password']),
            'receipt' => $filename,
            'status' => '0'
        ]);

      if($getUser){
        return $getUser;
        Mail::to($data->email)->send(new Register($subject));
      }

    }
}
