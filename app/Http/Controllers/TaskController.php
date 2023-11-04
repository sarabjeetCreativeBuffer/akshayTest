<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks=Task::with('category')->get();

        return view('task.list',compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('task.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'status' => 'required',
            'category' => 'required|exists:category,id',
        ]);
       
        Task::create([
            'task_name' => $request->name,
            'category_id' => $request->category,
            'status' => $request->status
        ]);

        return redirect()->route('task.list')->with('success','Task Created Successfully');
    }

    public function delete($id){

        Task::where('id',$id)->delete();

        return redirect()->route('task.list')
        ->with('success','Task deleted successfully');
    }

    public function show($id){

        $task= Task::where('id',$id)->with('category')->first();

        return view('task.show',compact('task'));
    }

    public function edit($id){

        $task= Task::where('id',$id)->with('category')->first();

        $categories = Category::all();

        return view('task.edit',compact('task','categories'));
    }
    
    public function update(Request $request){

        $request->validate([
            'name' => 'required|max:50',
            'status' => 'required',
            'category' => 'required|exists:category,id',
        ]);
       
        $task = Task::where('id',$request->id)->first();
        $task->task_name = $request->name;
        $task->category_id = $request->category;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('task.list')->with('success','Task Updated Successfully');
    }
}
