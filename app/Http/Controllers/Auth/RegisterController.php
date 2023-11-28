<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $validator = $this->validator($data);
            
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
            
        $uuid = (string) Str::uuid();
        
        DB::transaction(function () use ($data, $uuid) {
            // Insert data into first table
            $user = new User;
            $user->uuid = $uuid;
            $user->full_name = $data['full_name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
        
            // Insert data into second table
            // $guru = new Guru;
            // $guru->uuid_g = $uuid;
            // $guru->save();
        });

        $user = User::where('email', $data['email'])->first();


        Auth::guard()->loginUsingId($user->id);

    }
}


