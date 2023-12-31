<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chatbots;
use Illuminate\Support\Facades\Storage;

class addChatbot extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("addChatbot");
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'link'  => 'required|string|between:10,600',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Ensure that the file is valid and not empty
            if ($image->isValid()) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Store the image in the storage/app/public/images directory
                $image->storeAs('public/images', $imageName);
                // Update the $validatedData array with the image name
                $validatedData['image'] = $imageName;
            } else {
                // Handle invalid or empty file
                return redirect('/addChatbot')->with('error', 'Invalid or empty image file.');
            }
        }
        // Create a new form entry in the database
        if (Chatbots::create($validatedData)) {
            return redirect('/addChatbot')->with('success', 'Form submitted successfully!');
        } else {
            return redirect('/addChatbot')->with('error', 'Something Went wrong!');
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
        $form = Chatbots::findOrFail($id);
        return view('addChatbot', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'link' => 'required|string|between:10,600',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Ensure that the file is valid and not empty
            if ($image->isValid()) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Store the image in the storage/app/public/images directory
                $image->storeAs('public/images', $imageName);
                // Update the $validatedData array with the new image name
                $validatedData['image'] = $imageName;

                // If there was an existing image, delete it
                $existingImage = Chatbots::findOrFail($id)->image;
                if ($existingImage) {
                    Storage::delete('public/images/' . $existingImage);
                }
            } else {
                // Handle invalid or empty file
                return redirect("/editChatbot/{$id}")->with('error', 'Invalid or empty image file.');
            }
        }

        // Find and update the existing form entry in the database
        $chatbot = Chatbots::findOrFail($id);
        $chatbot->update($validatedData);

        return redirect("/editChatbot/{$id}")->with('success', 'Form updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
