<x-app-layout>
    <x-slot name="header">
        <h1>Edit Valentine Message</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
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
                <form method="POST" action="{{ route('valentine.update', $question->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Header</label>
                        <input type="text" name="header" class="form-control" value="{{ old('header', $qArr['header'] ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $qArr['title'] ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $qArr['subtitle'] ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Button 1 Text</label>
                        <input type="text" name="button_1" class="form-control" value="{{ old('button_1', $qArr['button_1'] ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Button 2 Text</label>
                        <input type="text" name="button_2" class="form-control" value="{{ old('button_2', $qArr['button_2'] ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Button 2 Clickable?</label>
                        <div>
                            <label class="me-3"><input type="radio" name="button_2_clickable" value="1" {{ (old('button_2_clickable', $qArr['button_2_clickable'] ?? 1) == 1) ? 'checked' : '' }}> Yes</label>
                            <label><input type="radio" name="button_2_clickable" value="0" {{ (old('button_2_clickable', $qArr['button_2_clickable'] ?? 1) == 0) ? 'checked' : '' }}> No</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-pink fw-bold" style="background:#d63384;color:#fff;">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
