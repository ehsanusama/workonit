<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getById($id)
    {
        $group = Groups::find($id);

        if (!$group) {
            return response()->json(['message' => 'Group not found'], 404);
        }

        return response()->json(['data' => $group]);
    }

    public function getByName($name)
    {
        $group = Groups::where('name', $name)->first();

        if (!$group) {
            return response()->json(['message' => 'Group not found'], 404);
        }

        return response()->json(['data' => $group]);
    }

    public function getAll()
    {
        $groups = Groups::all();

        return response()->json(['data' => $groups]);
    }
}
