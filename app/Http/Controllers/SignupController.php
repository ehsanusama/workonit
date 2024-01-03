<?php

namespace App\Http\Controllers;

use App\Models\Signup;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("signup");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'string|min:6',
            'terms' => 'required|max:255'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms' => $request->terms,

        ]);
        // $data = ['name' => 'John Doe'];
        // Send the email
        // Mail::to('usamaa.ehsan@gmail.com')->send(new MyTestMail($data));
        return redirect('login')->with('success', 'Account created successfully! Please log in.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Signup $signup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signup $signup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Signup $signup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signup $signup)
    {
        //
    }
}
