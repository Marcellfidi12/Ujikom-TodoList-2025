<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subtask;

class SubtaskController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'name' => 'required|string|max:255',
        ]);

        $subtask = Subtask::create([
            'task_id' => $request->task_id,
            'name' => $request->name,
            'status' => false,
        ]);

        return response()->json($subtask, 201);
    }
    public function updateStatus(Subtask $subtask)
    {
        $subtask->status = !$subtask->status;
        $subtask->save();

        return response()->json($subtask);
    }

    public function destroy(Subtask $subtask)
    {
        $subtask->delete();
        return response()->json(['message' => 'Subtask deleted successfully.']);
    }


}
