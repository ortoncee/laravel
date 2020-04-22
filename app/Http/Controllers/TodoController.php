<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /** Auth Control **/

    public function index()
    {
        $data = Todo::all();
        return  view('todo.index')->with('todos', $data);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required'
        ));

        $todo = new Todo();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->completed = false;

        $todo->save();
        session()->flash('success', 'Added successfully');
        //        dd($request->all());

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todos = Todo::find($id);
//        dd($todos);
        return view('todo.show')->with('todo', $todos);
    }

    public function edit($id)
    {
        $data = Todo::find($id);
        return view('todo.edit')->with('todos', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required'
        ));

        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->description = $request->description;
        $tododeleted_at->completed = false;

        $todo->save();
        session()->flash('success', 'update successful');

        return redirect(route('todo.index'));
    }

    public function destroy($id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();
        return redirect()->route('todo.index');
    }

    public function completed($id) {

        $todo = Todo::findOrFail($id);
        $todo->completed = true;
        $todo->save();

        session()->flash('success', 'completed successfully');
        return redirect(route('todo.index'));
    }
}
