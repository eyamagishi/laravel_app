<?php

namespace App\Http\Controllers;

use App\Todo;// 追加
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 追加
    private $todo;
    // 追加
    public function __construct(Todo $todo) // Todoクラスのインスタンス化をしている
    {
        $this->todo = $todo;
    }
    // 追加
    public function index()
    {
        $todos = $this->todo->all();
        // 追加
        return view('todo.index', ['todos' => $todos]);
    }
    // 追加
    public function create()
    {
        return view('todo.create');
    }
    // 追加
    // 修正
    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        // 追加
        return redirect()->route('todo.index');
    }
    // 追加
    public function show($id)
    {
        $todo = $this->todo->find($id);
        // 追加
        return view('todo.show', ['todo' => $todo]);
    }
    // 追加
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }
    
    // 追加
    public function update(Request $request, $id)
    {
        // 追加
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }
}
