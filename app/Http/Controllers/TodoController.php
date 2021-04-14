<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
        return response()->json([
            'data' => $items
        ], 200);
    }

    public function store(Request $request)
    {
        $item = new Todo;
        $item->name = $request->name;
        $item->save();
        return response()->json([
            'data' => $item
        ], 200);
    }

    //public function show(Todo $todo)
    //{
    //
    //}

    public function update(Request $request, Todo $todo)
    {
        $item = Todo::where('id',$todo->id)->first();
        $item->name = $request->name;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => $item,
            ], 200);
        } else {
            return response()->json([
            ], 404);
        }
    }


    public function destroy(Todo $todo)
    {
        $item = Todo::where('id', $todo->id)->delete();
        if ($item) {
            return response()->json([
                'message' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => $item,
            ], 404);
        }
    }
}
