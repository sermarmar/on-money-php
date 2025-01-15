<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController
{

    public function getAll()
    {
        $sizes = Size::all();
        return response()->json($sizes);
    }

    public function getById($id)
    {
        $size = Size::find($id);
        if(empty($size)) {
            return response()->json(['message' => 'Size not found'], 404);
        }
        return response()->json($size);
    }

}
