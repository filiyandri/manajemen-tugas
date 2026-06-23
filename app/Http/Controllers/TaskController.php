<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class TaskController extends Controller

{
public function index(Request $request)
{
    $tasks = Task::where('user_id', auth()->id())
        ->when($request->search, function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('course', 'like', '%' . $request->search . '%');
        })
        ->latest()
        ->get();

    $totalTasks = $tasks->count();

    $completedTasks = $tasks->where('status', 'selesai')->count();

    $progress = $totalTasks > 0
        ? round(($completedTasks / $totalTasks) * 100)
        : 0;

    return view('tasks.index', compact(
        'tasks',
        'totalTasks',
        'completedTasks',
        'progress'
    ));
}

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course' => 'required',
            'deadline' => 'required',
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'course' => $request->course,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect('/tasks')->with('success', 'Tugas berhasil ditambahkan');
    }
    public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}
public function apiIndex()
{
    $tasks = Task::latest()->get();

    return response()->json($tasks);
}

public function apiShow(Task $task)
{
    return response()->json($task);
}
public function apiStore(Request $request)
{
    $task = Task::create([
        'user_id' => 1,
        'title' => $request->title,
        'course' => $request->course,
        'deadline' => $request->deadline,
        'description' => $request->description,
        'status' => 'pending',
    ]);

    return response()->json([
        'message' => 'Tugas berhasil ditambahkan',
        'data' => $task
    ]);
}

public function apiUpdate(Request $request, Task $task)
{
    $task->update($request->all());

    return response()->json([
        'message' => 'Tugas berhasil diupdate',
        'data' => $task
    ]);
}

public function apiDestroy(Task $task)
{
    $task->delete();

    return response()->json([
        'message' => 'Tugas berhasil dihapus'
    ]);
}
public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required',
        'course' => 'required',
        'deadline' => 'required',
    ]);

    $task->update([
        'title' => $request->title,
        'course' => $request->course,
        'deadline' => $request->deadline,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect('/tasks')->with('success', 'Tugas berhasil diupdate');
}
public function apiRegister(Request $request)
{
    $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]
    );

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Register berhasil',
        'user' => $user
    ]);
}
public function apiLogin(Request $request)
{
    $user = User::where(
        'email',
        $request->email
    )->first();

    if (
        !$user ||
        !Hash::check(
            $request->password,
            $user->password
        )
    ) {

        return response()->json([
            'success' => false,
            'message' => 'Email atau Password salah'
        ], 401);
    }

    return response()->json([
        'success' => true,
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]
    ]);
}

public function destroy(Task $task)
{
    $task->delete();

    return redirect('/tasks')->with('success', 'Tugas berhasil dihapus');
}
}