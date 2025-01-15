<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Type\TypeRequest;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController
{
    public function getAll()
    {
        $types = Type::all();
        return response()->json($types);
    }

    public function getById($id)
    {
        $type = Type::find($id);
        if(empty($type)) {
            return response()->json(['message' => 'Type not found'], 404);
        }
        return response()->json($type);
    }

    public function create(TypeRequest $request)
    {
        $type = new Type();
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();
        return response()->json($type, 201);
    }
}
