
    @foreach($comments as $comment)
        @if ($comment->user()->exists())
            <li class="comment-list__item">
                <div class="comment__body">
                    <div class="comment__avatar">
                        <img src="{{ asset('web/img/ida.jpg') }}" alt="">
                    </div>
                    <div class="comment__info">
                        <p class="comment__author">{{ $comment->user()->exists() && $comment->user->hasRole('superadmin') ? 'Admin' : ($comment->user->f_name ?? ''.' '.$comment->user->l_name ?? '') }}</p>
                        <p class="comment__date date">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="comment__content">
                        {{ $comment->comment }}
                    </div>
                    <div class="comment__reply">
                        <button type="button" class="btn btn__grey animation reply_btn" data-commentid="{{$comment->id}}" data-commentowner="{{ $comment->user->f_name }} {{ $comment->user->l_name }}">Reply</button>
                    </div>
                </div>
                @foreach ($comment->childComment as $child_comment)
                    @if ($child_comment->user()->exists())
                        <ol class="comment-list children">
                            <li class="comment-list__item">
                                <div class="comment__body">
                                    <div class="comment__avatar">
                                        <img src="{{ asset('web/img/testimonal-photo.png') }}" alt="">
                                    </div>
                                    <div class="comment__info">
                                        <p class="comment__author">{{ $child_comment->user->f_name }} {{ $child_comment->user->l_name }}</p>
                                        <p class="comment__date date">{{ $child_comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="comment__content">
                                        {{ $child_comment->comment }}
                                    </div>
                                    {{-- <div class="comment__reply">
                                        <button type="button" class="btn btn__grey animation">Reply</button>
                                    </div> --}}
                                </div>
                            </li>
                        </ol>
                    @endif
                    
                @endforeach
                
            </li>
        @endif
    @endforeach