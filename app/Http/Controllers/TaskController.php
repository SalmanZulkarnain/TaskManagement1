<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');  
        $filter = $request->input('filter');  

        $tasks = Task::where('tasks.user_id', Auth::id())->get();
        // $categories = Category::where('user_id', Auth::id())->where(function ($query) use ($filter) {$query->where('name', 'like', "%$filter%");})->get();
        
        $today = Carbon::today();

        $taskDueDates =  Task::whereDate('due_date', $today->addDays(0))->get();

        return view('tasks.index', compact('tasks', 'taskDueDates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();
    
        return view('task.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $request->input('category');

        Task::create([
            'user_id' => Auth::id() ,
            'category_id' => $category,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'completed' => false
        ]);

        return redirect()->route('task.index')->with('status', 'Berhasil tambah tugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $category = $request->input('category');
        $task = Task::find($id);

        $category = Category::find([
            'category_id' => $category,
        ]);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $categories = Category::where('user_id', Auth::id())->get();;
        $task = Task::find($id);

      
        return view('tasks.update', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = $request->input('category');

        Task::findOrFail($id)->update([
            'user_id' => auth()->user()->id,
            'category_id' => $category, 
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'completed' => $request->completed == true ? true : false
        ]);

        return redirect()->route('task.index')->with('status', 'Berhasil update tugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect()->route('task.index')->with('status', 'Berhasil menghapus tugas');
    }

    public function completed($id){
        $task_completed = Task::find($id);

        $task_completed->update([
            'completed' => true
        ]);

        return redirect()->route('task.index')->with('status', 'Berhasil menambah tugas');
    }
}
