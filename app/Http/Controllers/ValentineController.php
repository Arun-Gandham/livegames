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
        $staticValentainData = [ 'questions_array' => [ "title" => "Hey you… 🥺👉👈<br />will you be my Valentine? 💘", "subtitle" => "If you say yes, I’ll send you hugs, smiles, and a lifetime supply of “good morning” texts 😌💞", "button_1" => "Yes 💖", "button_2" => "No 🙈",'button_2_clickable' => "0"]];
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

    public function answer(Request $request, $id)
    {
        $question = \App\Models\Question::findOrFail($id);
        $question->answer = $request->input('answer', 'Yes 💖');
        $question->answered_at = now();
        $question->save();
        return redirect()->route('valentine.show', ['id' => $id]);
    }

    public function showMessage($id)
    {
        $question = \App\Models\Question::findOrFail($id);
        if ($question->is_deleted) {
            abort(404);
        }
        $question->last_seen_at = now();
        $question->save();
        $questionsArray = json_decode($question->questions_array, true);
        $answer = $question->answer;
        return view('themes.valentine_show', [
            'questions' => $questionsArray,
            'answer' => $answer,
            'questionId' => $id,
        ]);
    }
    public function showMessageDefault() {
        $staticValentainData = [ "title" => "Hey you… 🥺👉👈<br />will you be my Valentine? 💘", "subtitle" => "If you say yes, I’ll send you hugs, smiles, and a lifetime supply of “good morning” texts 😌💞", "button_1" => "Yes 💖", "button_2" => "No 🙈"];
        return view('themes.valentine_show', [
            'questions' => $staticValentainData,
            'answer' => null,
            'questionId' => null,
        ]);
    }
    public function customMessageCreate(Request $request)
    {
        $data = $request->validate([
            'header' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_1' => 'required|string|max:255',
            'button_2' => 'required|string|max:255',
            'button_2_clickable' => 'required|in:0,1',
        ]);

        $questions_array = [
            'header' => $data['header'],
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'button_1' => $data['button_1'],
            'button_2' => $data['button_2'],
            'button_2_clickable' => $data['button_2_clickable']
        ];

        $question = new \App\Models\Question();
        $question->id = (string) \Illuminate\Support\Str::uuid();
        $question->user_id = auth()->id();
        $question->questions_array = json_encode(['questions_array' => $questions_array]);
        $question->answer = null;
        $question->theme_id = 143 ?? null;
        $question->save();

        return redirect()->route('history')->with('success', 'Your custom Valentine message has been created!');
    }

    public function customForm()
    {
        return view('custom_valentine_form');
    }
    public function edit($id)
    {
        $question = \App\Models\Question::findOrFail($id);
        if (!empty($question->answer)) {
            return redirect()->route('history')->with('success', 'Answered messages cannot be edited.');
        }
        $qArr = json_decode($question->questions_array, true);
        $qArr = $qArr['questions_array'] ?? $qArr;
        return view('edit_valentine_form', compact('question', 'qArr'));
    }

    public function update(Request $request, $id)
    {
        $question = \App\Models\Question::findOrFail($id);
        if (!empty($question->answer)) {
            return redirect()->route('history')->with('success', 'Answered messages cannot be edited.');
        }
        $data = $request->validate([
            'header' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_1' => 'required|string|max:255',
            'button_2' => 'required|string|max:255',
            'button_2_clickable' => 'required|in:0,1',
        ]);
        $questions_array = [
            'header' => $data['header'],
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'button_1' => $data['button_1'],
            'button_2' => $data['button_2'],
            'button_2_clickable' => $data['button_2_clickable'],
        ];
        $question->questions_array = json_encode(['questions_array' => $questions_array]);
        $question->save();
        return redirect()->route('history')->with('success', 'Valentine message updated successfully!');
    }
}
