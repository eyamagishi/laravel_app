<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;
// use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;
    public function __construct(Todo $todo) // Todoクラスのインスタンス化をしている
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    public function show($id) // 一覧表示
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id) // 編集処理
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id) // 更新処理
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }

    public function delete($id) // 削除処理
    {
        // 追加
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
