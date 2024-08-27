<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function index()
    {
        $todo = Todo::all();
        return response()->json($todo);
    }


    function show($id)
    {
        $todo =  Todo::find($id);

        if (!$todo) return response()->json(['message' => 'Todo Not Found'], 400);

        return response()->json($todo);
    }

    function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json($todo);
    }

    function update(Request $request, $id)
    {
        $todo =  Todo::find($id);

        if (!$todo) return response()->json(['message' => 'Todo Not Found'], 400);

        $todo->update($request->all());
        return response()->json($todo);
    }

    function destroy($id)
    {
        $todo =  Todo::find($id);

        if (!$todo) return response()->json(['message' => 'Todo Not Found'], 400);

        $todo->delete();
        return response()->json(['message' => 'Todo deleted']);
    }
}
