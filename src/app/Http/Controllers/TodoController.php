<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

use Psr\Http\Message\RequestInterface;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }
    // public function store(Request $request)
    // {
    //     $todo = $request->only('content');
    //     return view('/');
    // }
    public function store(Request $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);

        return redirect('/');
    }
    
}
