@section('title', "Dashboard - AV Live Games")
@section('meta_description', "Access your dashboard on AV Live Games. Manage your games, view stats, and enjoy special events like Valentine's Day!")
@section('meta_keywords', 'dashboard, live games, AV, user panel, events, valentine')
@section('og_title', "Dashboard - AV Live Games")
@section('og_description', "Access your dashboard on AV Live Games. Manage your games, view stats, and enjoy special events like Valentine's Day!")
@section('og_image', asset('images/themes/valentine_pink.png'))
@section('twitter_title', "Dashboard - AV Live Games")
@section('twitter_description', "Access your dashboard on AV Live Games. Manage your games, view stats, and enjoy special events like Valentine's Day!")
@section('twitter_image', asset('images/themes/valentine_pink.png'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="card col-md-12 mb-4">
                    <div class=" shadow-sm border-danger row" style="padding: 20px 10px;">
                        <div class="col-md-8">
                            <img src="{{ asset('images/themes/valentine_pink.png') }}" class="card-img-top" alt="Valentine's Day">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title text-danger fw-bold" style="font-size: 2rem;">Valentine's Day Special</h5>
                                <p class="card-text mb-2">Celebrate love and friendship with a special message or question for your Valentine. Make this day unforgettable by sharing your feelings in a beautiful way!</p>
                                <p class="text-muted small mb-3">Valentine's Day is the perfect time to express your affection and appreciation. When you send your question, your Valentine will see a beautiful message—and here's the fun part: <span class="fw-bold text-danger">they can't click "No"!</span> Make your message stand out and ensure a memorable moment for both of you.</p>
                                <ul class="list-unstyled mb-3">
                                    <li><span class="text-pink-600">&#10084;</span> Send a romantic question</li>
                                    <li><span class="text-pink-600">&#128151;</span> Create a memorable moment</li>
                                </ul>
                                <div class="d-flex gap-2 mt-3">
                                    <a href="{{ route('valentine.show.default') }}" class="btn btn-danger fw-bold flex-fill" target="_blank">Preview</a>
                                    <a href="{{ route('valentine.custom.form') }}" class="btn btn-danger fw-bold flex-fill">Custom</a>


                                    <form method="POST" action="{{ route('valentine.question.create') }}" class="flex-fill">
                                        @csrf
                                        <button type="submit" class="btn btn-info fw-bold w-100">Create</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
