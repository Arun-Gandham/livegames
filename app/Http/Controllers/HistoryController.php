<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $questions = Question::where('user_id', $user->id)
            ->where('is_deleted', false)
            ->orderBy('created_at', 'desc')->get();
        return view('history', compact('questions'));
    }
}
