@section('title', "Valentine's Day Question - AV Live Games")
@section('meta_description', "Send a special Valentine's Day question to your loved one with AV Live Games. Make this day memorable!")
@section('meta_keywords', "valentine, question, love, AV, live games, send message")
@section('og_title', "Valentine's Day Question - AV Live Games")
@section('og_description', "Send a special Valentine's Day question to your loved one with AV Live Games. Make this day memorable!")
@section('twitter_title', "Valentine's Day Question - AV Live Games")
@section('twitter_description', "Send a special Valentine's Day question to your loved one with AV Live Games. Make this day memorable!")

<x-app-layout>
    <x-slot name="header">
        <h1>Valentine's Day Question</h1>
    </x-slot>

    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
            @if(session('question_link'))
            <br>
            <a href="{{ session('question_link') }}" target="_blank" class="text-blue-600 underline">View your question</a>
            @endif
        </div>
        @endif
        <form method="POST" action="{{ route('questions.store') }}">
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">Your Question</label>
                <input type="text" class="form-control" id="question" name="question" value="Will you be my Valentine?" required>
            </div>
            <div class="mb-3">
                <label for="receiver_name" class="form-label">To</label>
                <input type="text" class="form-control" id="receiver_name" name="receiver_name" required>
            </div>
            <div class="mb-3">
                <label for="sender_name" class="form-label">From</label>
                <input type="text" class="form-control" id="sender_name" name="sender_name" required>
            </div>
            <input type="hidden" name="theme_id" value="1">
            <button type="submit" class="btn btn-danger">Send Question</button>
        </form>
    </div>
</x-app-layout>
