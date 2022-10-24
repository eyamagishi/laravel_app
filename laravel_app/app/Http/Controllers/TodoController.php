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
    public function create()
    {
        return view('todo.create');
    }
    // 追加
    // 修正
    public function store(Request $request)
    {
        // dd($request->all());
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
    }
}
