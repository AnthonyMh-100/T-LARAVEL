<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Str;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id','=',Auth::user()->id)->paginate(6);
        return view('task', compact('tasks'));
    }

    public function search(Request $request)
    {
        // $search_task = Str::lower($request->search);

        $search_task = $request->search;
        if ($search_task) {
            $tasks = Task::where('title', 'like', $search_task . '%')
                            ->where('user_id','=',Auth::user()->id)
                            ->paginate(6);
            return view('task', compact('tasks'));
        }
       

        return redirect()->route('tasks');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_task = Task::create([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'description' => $request->description,
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,

        ]);
        if ($new_task) {
            return redirect()->route('tasks');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function add(Request $request)
    {
        return view('post_task');

    }
    public function edit(Request $request, int $id)
    {
        $one_task = Task::find($id);

        return view('edit_task', ['one_task' => $one_task]);

    }
    public function update(Request $request)
    {

        $task_update = Task::where('user_id',$request->user_id);
        
        if ($task_update) {
            
            $task_update->update([
                'title' => $request->title,
                'description' => $request->description,
                'date_to' => $request->date_to,
                'date_from' => $request->date_from
            ]);
            
            return redirect()->route('tasks');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Task::find($id)->delete();

        return redirect()->route('tasks');


    }

    public function check_task(Request $request)
    {

        return view('check_task');

    }
     public function check_button(Request $request, string $value)
    {

        $val  = $value;

      
    

        return redirect()->route('tasks');

    }

    

}
