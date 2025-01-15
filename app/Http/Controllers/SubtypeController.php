<?php

namespace App\Http\Controllers;

use App\Models\Subtype;
use Illuminate\Http\Request;

class SubtypeController
{
    public function getAll()
    {
        $subtypes = Subtype::all();
        return response()->json($subtypes);
    }

    public function getById($id)
    {
        $subtype = Subtype::find($id);
        if(empty($subtype)) {
            return response()->json(['message' => 'Subtype not found'], 404);
        }
        return response()->json($subtype);
    }
}
