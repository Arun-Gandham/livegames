<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
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
                                    <a href="{{ route('valentine.show') }}" class="btn btn-danger fw-bold flex-fill" target="_blank">Preview</a>
                                    <a href="{{ route('valentine.question.create') }}" class="btn btn-info fw-bold flex-fill">Create Message</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
