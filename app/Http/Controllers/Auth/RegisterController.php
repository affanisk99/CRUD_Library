<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:160'],
            'username' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'is_active' => ['required', 'string'],
            // 'join_date' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ''
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $lastid = User::latest('id')->first();
        
        if($lastid<'1'){
            $newID='1';
        }elseif ($lastid>'1') {
            $newID=$lastid->id+'1';
        }
        $code = 'LIB-'.date('y').'-'.$newID;
        // jangan lupa bersihkan/matikan dd()
        // dd($code);
        $data['code']=$code;
        
        return User::create([
             'name' => $data['name'],
             'username'=> $data['username'],
             'address'=> $data['address'],
             'phone'=> $data['phone'],
             'email' => $data['email'],

             // code masukan di array create ini
             'code' => $code,

             // tidak perlu, karena perlu verrifikasi oleh admin
             // di database field is_active bertipe enum dengan data 'yes' dan 'no' serta defaultnya adalah 'no' sehingga saat di create
             // otomatis user akan memiliki status 'no'
             // 'is_active'=> $data['is_active'],

             // tanggal otomatis terbentuk saat dibuat
             'join_date'=> date('Y-m-d H:i:s'),
             'password' => Hash::make($data['password']),
        ]);
    }
}
