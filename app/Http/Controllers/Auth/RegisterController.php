<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'max:12'],
            'surname' => ['required', 'max:255'],
            'dni' => ['required', 'max:9'],
            'birthdate' => ['required', 'date'],
            'place_of_birth' => ['required', 'max:255'],
            'postal_code' => ['required', 'max:255'],
            'street_name' => ['required', 'max:255'],
            'number' => ['required', 'max:255'],
            'floor' => ['required', 'max:255'],
            'door' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'province' => ['required', 'max:255'],
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
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'dni' => $data['dni'],
            'birthdate' => $data['birthdate'],
            'place_of_birth' => $data['place_of_birth'],
            'postal_code' => $data['postal_code'],
            'street_name' => $data['street_name'],
            'number' => $data['number'],
            'floor' => $data['floor'],
            'door' => $data['door'],
            'city' => $data['city'],
            'province' => $data["province"],
        ]);
    }
}
