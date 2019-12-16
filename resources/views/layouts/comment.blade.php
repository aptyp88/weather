@foreach($comments as $comment)

    <div class="show-comment mb-5">
        <div>
            <p class="commentator">
                {{ $comment->user->first_name . ' ' . $comment->user->last_name}}
            </p>
        </div>
        <div>
            <p class="comment-text">{{$comment->message}}</p>
        </div>
        <div>
            <p  class="comment-date">
                @if($comment->created_at->diffInDays() == 1){{$comment->created_at->diffInDays()}} day ago
                @elseif($comment->created_at->diffInDays() >= 2){{$comment->created_at->diffInDays()}} days ago
                @elseif($comment->created_at->diffInHours() > 0) {{$comment->created_at->diffInHours()}} hours ago
                @elseif($comment->created_at->diffInMinutes() > 0) {{$comment->created_at->diffInMinutes()}} minutes ago
                @else Just now
                @endif
            </p>
        </div>
    </div>

@endforeach