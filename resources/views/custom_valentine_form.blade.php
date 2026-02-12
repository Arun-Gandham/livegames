<x-app-layout>
    <x-slot name="header">
        <h1>Create Custom Valentine Message</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="card p-5 shadow rounded-4" style="background: #fff0f6;">
                <form method="POST" action="{{ route('valentine.custom.create') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Header</label>
                        <input type="text" name="header" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control">
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
                        <label class="form-label fw-bold">Your Name</label>
                        <input type="text" name="user_name" class="form-control" required>
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
