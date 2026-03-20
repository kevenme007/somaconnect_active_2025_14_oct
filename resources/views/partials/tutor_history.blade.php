@if($questions->count() > 0)
    @foreach($questions as $q)
        <!-- User Message -->
        <div class="user-message message-item" style="margin-bottom: 15px; text-align: right;">
            <div style="display: inline-block; background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%); color: white; padding: 10px 15px; border-radius: 15px 15px 5px 15px; max-width: 80%; word-wrap: break-word;">
                {{ $q->question }}
            </div>
        </div>

        <!-- AI Response -->
        <div class="ai-message message-item" style="margin-bottom: 15px;">
            <div style="display: flex; align-items: flex-start; gap: 8px;">
                <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="fas fa-book"></i>
                </div>
                <div style="background: white; padding: 12px 15px; border-radius: 15px 15px 15px 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); max-width: 80%; word-wrap: break-word; color: #333;">
                    {!! nl2br(e($q->answer ?? 'Waiting for answer...')) !!}
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center text-muted py-4">
        <i class="fas fa-book fa-3x mb-3" style="color: #6cbad9; opacity: 0.5;"></i>
        <p>No questions yet. Start by asking something!</p>
    </div>
@endif
