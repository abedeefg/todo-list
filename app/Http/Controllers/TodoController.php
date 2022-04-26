<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::orderBy('completed')->get();
        $active  = Todo::where('completed','0')->count();
        $completed  = Todo::where('completed','1')->count();
        return view('todo.index')->with(['todos' => $todos,'active' => $active,'completed' => $completed]);
    }

    public function create(){
        return view('todo.create');
    }

    public function upload(Request $request){
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $todo = $request->title;
      
        Todo::create(['title' => $todo]);
        return redirect()->back()->with('success', "Task created successfully!");
    }

    public function edit($id){
        $todo = Todo::find($id);
        return view('todo.edit')->with(['id' => $id, 'todo' => $todo]);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $updateTodo = Todo::find($request->id);
        $updateTodo->update(['title' => $request->title]);
        return redirect('/index')->with('success', "Task updated successfully!");
    }

    public function completed($id){
        $todo = Todo::find($id);
        if ($todo->completed){
            $todo->update(['completed' => false]);
            return redirect()->back()->with('success', "Task marked as incomplete!");
        }else {
            $todo->update(['completed' => true]);
            return redirect()->back()->with('success', "Task marked as complete!");
        }
    }

    public function delete($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back()->with('success', "Task deleted successfully!"); 
    }

    function deleteAllCompleted(){
        $todo = Todo::where('completed','1');
        $todo->delete();
        return redirect()->back()->with('success', "Task Completed deleted successfully!"); 
    }
    
    function allCompleted(){
        $todo = Todo::all();
        foreach ($todo as $item) {
            Todo::where('id',$item['id'])->update(['completed' => '1']);
        }
        return redirect()->back()->with('success', "All Task Active Change To Completed successfully!"); 
    }
}