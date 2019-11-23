<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            'name' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Ime' => ['required', 'string', 'min:3', 'max:20'],
            'Prezime' => ['required', 'string', 'min:4', 'max:40'],
            'Adresa' => ['required', 'string', 'max:50'],
            'Grad' => ['required', 'string', 'max:25'],
            'Pos_br' => ['required', 'numeric','min:5' ,'max:5'],
            'Br_tel' => ['required', 'numeric','min:9' ,'max:11'],
            'Dat_rod' => ['required', 'numeric','min:8' ,'max:10'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'Ime' => $data['Ime'],
            'Prezime' => $data['Prezime'],
            'Adresa' => $data['Adresa'],
            'Grad' => $data['Grad'],
            'Pos_br' => $data['Pos_br'],
            'Br_tel' => $data['Br_tel'],
            'Dat_rod' => $data['Dat_rod'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
