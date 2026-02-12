<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionDeleteController extends Controller
{
    public function destroy($id)
    {
        $question = Question::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $question->is_deleted = true;
        $question->save();
        return redirect()->route('history')->with('success', 'Question deleted successfully!');
    }
}
