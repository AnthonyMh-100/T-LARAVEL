<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{    
        return view('app');     
    }
    public function login(Request $request)
    {
        return view('login');     
    }

    public function register(Request $request)
    {
        return view('register');     
    }

    public function user_register(Request $request)
    {

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,

        ]);

        // $token = $user->createToken('token-name')->plainTextToken;
        if ($user) {
            return redirect()->route('tasks');
        }else{
            return redirect()->route('login');
        }

    }
    public function user_login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('tasks');

        }else{
            return redirect()->route('login');
        }

    
    }
    public function user_logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
