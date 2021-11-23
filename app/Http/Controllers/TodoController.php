<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos=Todo::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('Todo.index',compact('todos'));
    }


    
    public function create()
    {
        return view('Todo.add_todo');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'completed'=>'nullable',
        ]);
        
        $todo = new Todo; 
        $todo ->title=$request->input('title');
        $todo->description=$request->input('description');

        if($request->has('completed')){
            $todo->completed=true;
        }
        $todo->user_id=Auth::user()->id;

        $todo->save();

        //return back()->with('success','Item created Successfully !');
        return redirect()->route('todo.index')->with('success','Item addded successfully !');
    }

   
    public function show($id)
    {
        $todo=Todo::where('id',$id)->where('user_id',Auth::user()->id)->first();
        return view('Todo.delete_todo',compact('todo'));
    }

  
    public function edit($id)
    {
        $todo=Todo::where('id',$id)->where('user_id',Auth::user()->id)->first();
        return view('Todo.edit_todo',compact('todo'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'completed'=>'nullable',
        ]);
        
        $todo = Todo::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $todo ->title=$request->input('title');
        $todo->description=$request->input('description');

        if($request->has('completed')){
            $todo->completed=true;
        }else{
            $todo->completed=false;
        }
       

        $todo->save();

       //return back()->with('success','Item Updated Successfully !');
       return redirect()->route('todo.index')->with('success','Item updated successfully !');

    }

   
    public function destroy($id)
    {
        $todo=Todo::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $todo->delete();
        return redirect()->route('todo.index')->with('success','Item deleted successfully !');
    }

    
}
