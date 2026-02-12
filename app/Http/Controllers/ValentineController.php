<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValentineController extends Controller
{
    public function create(Request $request)
    {
        // // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'questions_array' => 'required|array',
        //     'questions_array.*' => 'required|string',
        //     'answer' => 'nullable|string',
        //     'theme_id' => 'nullable|string',
        // ]);
        $validatedData = [];
        $staticValentainData = [ 'questions_array' => [ "title" => "Hey you… 🥺👉👈<br />will you be my Valentine? 💘", "subtitle" => "If you say yes, I’ll send you hugs, smiles, and a lifetime supply of “good morning” texts 😌💞", "button_1" => "Yes 💖", "button_2" => "No 🙈"]];
        $validatedData['questions_array'] = $staticValentainData;
        // Create a new question entry in the database
        $question = new \App\Models\Question();
        $question->id = (string) \Illuminate\Support\Str::uuid();
        $question->user_id = auth()->id();
        $question->questions_array = json_encode($validatedData['questions_array']);
        $question->answer = null;
        $question->theme_id = 143 ?? null;
        $question->save();

        // Redirect back with a success message
        return redirect()->route('history')->with('success', 'Your questions have been submitted successfully!');
    }
}
