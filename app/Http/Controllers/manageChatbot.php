<?php

namespace App\Http\Controllers;

use App\Models\Chatbots;
use Illuminate\Http\Request;

class manageChatbot extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Chatbots::all();
        $data = compact('forms');
        return view("manageChatbot")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Chatbots $chatbots)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chatbots $chatbots)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chatbots $chatbots)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $form = Chatbots::find($id);

        if (!$form) {
            return redirect('/manageChatbot')->with('error', 'Record not found!');
        }

        // Delete the form entry
        $form->delete();

        return redirect('/manageChatbot')->with('success', 'Record deleted successfully!');
    }
}
