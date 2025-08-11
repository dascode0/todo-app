<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function show()
    {
       $todos = Todo::all();
        return view('todo', ['todos' => $todos]);
    }
    public function addTask(Request $request)
    {
        $request->validate([
            'task' => 'required|max:255',
        ]);
        $todo=new Todo();
        $todo->task = $request->input('task');
        $todo->save();
        return redirect('/')->with('success', 'Task added successfully!');

    }
    public function markDone($id)
    {
        $todo=Todo::find($id);
        if ($todo) {
            $todo->is_done = true; // Assuming 'is_done' is a column in the 'todos' table
            $todo->save();
            return redirect('/')->with('success', 'Task marked as done!');  
        } else {
            return redirect('/')->with('error', 'Task not found!'); 
        }
    }
    public function deleteTask($id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
            return redirect('/')->with('success', 'Task deleted successfully!');
        } else {
            return redirect('/')->with('error', 'Task not found!');
        }
    }
}
