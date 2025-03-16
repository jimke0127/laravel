<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use \App\Models\Task;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(){

        $tasks = DB::table('tasks')->paginate(8);
        return view("tasks.index",["tasks" => $tasks,"title"=>"任务列表"]);
    }

    public function show(Task $task){
        return view("tasks.show",["tasks" => $task,"title"=>"任务详情"]);
    }

    public function create(){

        return view("tasks.create",["title"=>"新增任务"]);
    }

    public function edit(Task $task){

        return view("tasks.edit",["task" => $task,"title"=>"编辑任务"]);
    }
    public function store(TaskRequest $request){
        
        $id = $request->get("id");

        if($id){
            $task = Task::findOrFail($id);
            $task->update($request->validated());

        }else{
            $task = Task::create($request->validated());
        }
        
        return redirect()->route("tasks.show",["task"=>$task->id])
        ->with("success",$id ? "Task update successfully!" : "Task create successfully!");
    }
    public function delete(Task $task){

        $task->delete();

        return redirect()->route("tasks.index")->with("success","Task delete successfully!");
    }
    public function toggleComplete(Task $task){
        
        $task->toggleComplete();
        return redirect()->back()->with("success","Task update successfully!");
    }
}
