@extends('layouts.root')
@section('title', 'Create Content')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Create Content</h1>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Content</h5>

                <form action="{{ route('contents.store') }}" method="POST">
                    @csrf

                    <!-- Select Subject -->
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-select" required>
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select Topic -->
                    <div class="mb-3">
                        <label for="topic_id" class="form-label">Topic</label>
                        <select name="topic_id" id="topic_id" class="form-select" required>
                            <option value="">Select Topic</option>
                            {{-- Topics will load here dynamically --}}
                        </select>
                    </div>

                    <!-- Content Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Content Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <!-- Content Body -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Content Body</label>
                        <textarea name="body" id="body" rows="5" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Save Content</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    document.getElementById('subject_id').addEventListener('change', function () {
        let subjectId = this.value;
        let topicDropdown = document.getElementById('topic_id');

        if (subjectId) {
            fetch('/api/subjects/' + subjectId + '/topics')
                .then(response => response.json())
                .then(data => {
                    topicDropdown.innerHTML = '<option value="">Select Topic</option>';
                    data.forEach(topic => {
                        let option = document.createElement('option');
                        option.value = topic.id;
                        option.textContent = topic.name;
                        topicDropdown.appendChild(option);
                    });
                });
        } else {
            topicDropdown.innerHTML = '<option value="">Select Topic</option>';
        }
    });
</script>
@endsection
