<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::whereHas('task', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('task')->get();

        return view('home.history', compact('histories'));
    }
}

