<x-app-layout>
    <x-slot name="header">
        <h1>My Question History</h1>
    </x-slot>
    @if(session('success'))
    <div id="toast-success" style="position: fixed; top: 30px; right: 30px; z-index: 9999; min-width: 220px; background: #fff0f6; color: #d63384; border: 2px solid #d63384; border-radius: 16px; box-shadow: 0 4px 24px #d6338440; padding: 18px 32px; font-size: 1.1em; display: flex; align-items: center; gap: 12px;">
        <span style="font-size:1.5em;">🎉</span>
        <span>{{ session('success') }}</span>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast-success');
            if (toast) toast.style.display = 'none';
        }, 2500);

    </script>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card col-md-12 mb-4">
                <div class="card-body shadow p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle shadow rounded-4" style="background: #fff0f6; border-radius: 1rem; overflow: hidden;">
                            <thead style="background: #ffe3e3;">
                                <tr style="color: #d63384; font-weight: bold;">
                                    <th style="width: 60px;">Sr No.</th>
                                    <th>Questions</th>
                                    <th>Answer</th>
                                    <th>Answered At</th>
                                    <th>IP Address</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    <th>Copy Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($questions as $question)
                                <tr style="background: #fff; border-radius: 1rem;">
                                    <td class="text-center fw-bold" style="color: #e64980;">{{ $loop->iteration }}</td>
                                    <td>
                                        @php
                                        $qArr = json_decode($question->questions_array, true);
                                        @endphp
                                        @if(is_array($qArr))
                                        <ul class="mb-0 ps-3">
                                            @foreach($qArr as $q)
                                            @if(is_array($q) && isset($q['title']))
                                            <li style="color: #d63384;">
                                                <span class="fw-bold" style="font-size:1.1em;">{!! $q['title'] !!}</span>
                                                @if(!empty($q['subtitle']))
                                                <br><span class="text-muted small">{!! $q['subtitle'] !!}</span>
                                                @endif
                                            </li>
                                            @else
                                            <li style="color: #d63384;">{!! is_array($q) ? json_encode($q) : $q !!}</li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @else
                                        <span style="color: #d63384;">{{ $question->questions_array }}</span>
                                        @endif
                                    </td>
                                    <td style="color: #20c997;">{{ $question->answer }}</td>
                                    <td>
                                        {{ $question->answered_at ? $question->answered_at->format('d M Y h:i A') : '' }}
                                    </td>
                                    <td>{{ $question->ip_address }}</td>
                                    <td>
                                        {{ $question->created_at ? $question->created_at->format('d M Y h:i A') : '' }}
                                    </td>
                                    <td>
                                        {{ $question->updated_at ? $question->updated_at->format('d M Y h:i A') : '' }}
                                    </td>
                                    <td class="text-center">
                                        @if(empty($question->answer))
                                            <a href="{{ route('valentine.edit', $question->id) }}" class="btn btn-sm btn-outline-warning mb-1">Edit</a>
                                        @endif
                                        <form method="POST" action="{{ route('questions.destroy', $question->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this question?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary" onclick="copyQuestionLink('{{ url('/questions/'.$question->id) }}')">Copy Link</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No questions found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <script>
                            function copyQuestionLink(link) {
                                navigator.clipboard.writeText(link).then(function() {
                                    alert('Link copied to clipboard!');
                                }, function(err) {
                                    alert('Failed to copy link: ' + err);
                                });
                            }

                        </script>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
