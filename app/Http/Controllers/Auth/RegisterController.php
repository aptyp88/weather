<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = '/';

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
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'register_password' => ['required_with:register_password_confirmation', 'string', 'min:8', 'confirmed'],
            'register_password_confirmation' => ['required_with:register_password', 'same:register_password'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //for user birthday
        if($data['birthpiker_birth']['year'] != 0 || $data['birthpiker_birth']['month'] != 0 || $data['birthpiker_birth']['day'] !=0)
        {
            $birthday = $data['birthpiker_birth']['year'] . '-' . $data['birthpiker_birth']['month'] . '-' . $data['birthpiker_birth']['day'];
            return User::create([
                'first_name' => $data['fname'],
                'last_name' => $data['lname'],
                'gender' => $data['gender'],
                'birthday' => date('Y-m-d', strtotime($birthday)),
                'email' => $data['register_email'],
                'password' => Hash::make($data['register_password']),
            ]);
        }
        else
        {
            return User::create([
                'first_name' => $data['fname'],
                'last_name' => $data['lname'],
                'gender' => $data['gender'],
                'email' => $data['register_email'],
                'password' => Hash::make($data['register_password']),
            ]);
        }
    }
}
