@forelse ($questions as $q)
    <div class="border rounded p-2 mb-2 bg-light">
        <small class="text-muted">🕒 {{ $q->created_at->format('d M Y, H:i') }}</small>
        <p class="mb-1"><strong>You:</strong> {{ $q->question }}</p>
        <p class="mb-0"><strong>MaktabaConnect:</strong> {!! nl2br(e($q->answer ?? 'Waiting for answer...')) !!}</p>
    </div>
@empty
    <p class="text-muted">No questions asked yet.</p>
@endforelse
