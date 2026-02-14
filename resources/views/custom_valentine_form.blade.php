@section('title', 'Create Custom Valentine - AV Live Games')
@section('meta_description', 'Create a custom Valentine message for your loved one with AV Live Games. Personalize your question and make it special!')
@section('meta_keywords', 'custom valentine, create, love, AV, live games, message')
@section('og_title', 'Create Custom Valentine - AV Live Games')
@section('og_description', 'Create a custom Valentine message for your loved one with AV Live Games. Personalize your question and make it special!')
@section('twitter_title', 'Create Custom Valentine - AV Live Games')
@section('twitter_description', 'Create a custom Valentine message for your loved one with AV Live Games. Personalize your question and make it special!')

<x-app-layout>
    <x-slot name="header">
        <h1>Create Custom Valentine Message</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card p-5 shadow rounded-4" style="background: #fff0f6;">

                @if ($errors->any())
                <div class="alert alert-danger mb-3" style="background:#fff0f6; color:#d63384; border:1px solid #d63384; border-radius:10px;">
                    <ul class="mb-0" style="list-style:none; padding-left:0;">
                        @foreach ($errors->all() as $error)
                        <li>❌ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('valentine.custom.create') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Header</label>
                        <input type="text" name="header" class="form-control" required value="tiny heart, big feelings 💗">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control" required value="Hey you… 🥺👉👈<br />will you be my Valentine? 💘">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="If you say yes, I’ll send you hugs, smiles, and a lifetime supply of “good morning” texts 😌💞">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Button 1 Text</label>
                        <input type="text" name="button_1" class="form-control" value="Yes 💖" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Button 2 Text</label>
                        <input type="text" name="button_2" class="form-control" value="No 🙈" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Button 2 Clickable?</label>
                        <div>
                            <label class="me-3"><input type="radio" name="button_2_clickable" value="1" checked> Yes</label>
                            <label><input type="radio" name="button_2_clickable" value="0"> No</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-pink fw-bold" style="background:#d63384;color:#fff;">Save & Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
