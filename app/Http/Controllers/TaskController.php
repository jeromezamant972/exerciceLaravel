<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
//    faire une incentiation de tasks
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index',compact('tasks'));
    }
    public function dashboardTache(){
        $tasks=Task::all();
        return view('dashboard',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     */
    // lorsque l'on est dans un tableau en php il faire une intégration on utilise =>
    public function store(Request $request)
    {
        // dd($request->title);
        $task=Task::create([
            'title'=>$request->input('title'),
             'description'=>$request->input('description'),
             'status'=>$request->input('status')
        ]);
        // dd($request,$task);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task=Task::findOrFail();
                // dd($task);
        $task->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description')
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
            //  dd($task);
        $task->destroy();
        return redirect('/');
    }

}
