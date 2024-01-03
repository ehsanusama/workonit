<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class manageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::all();
        $data = compact('admins');
        return view('manageAdmin')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        if (User::create($validatedData)) {
            return redirect('/manageAdmin')->with('success', 'Form submitted successfully!');
        } else {
            return redirect('/addAdmin')->with('error', 'Something Went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        return view('manageRole', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $chatbot = User::findOrFail($id);
        $chatbot->update($validatedData);
        return redirect("/manageAdmin")->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = User::find($id);
        if (!$form) {
            return redirect('/manageAdmin')->with('error', 'Record not found!');
        }

        // Delete the form entry
        $form->delete();

        return redirect('/manageAdmin')->with('success', 'Record deleted successfully!');
    }
}
