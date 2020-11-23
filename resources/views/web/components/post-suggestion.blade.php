<ul class="results mx-auto" style="overflow-x: hidden;">
    @forelse ($posts as $post)
        <li class="suggested-post" data-postslug="{{$post->slug}}">
            <div class="row mb-4">
                <div class="col-md-11">
                    <a type="button" class="hover-text-clr">
                        <h5 class="mb-2"><b>{{$post->title}}</b> </h5> 
                        <span>{{printTruncated(120, $post->content, $isUtf8=true)}}</span></a>
                </div>
            </div>
            
        </li>
    
    @empty
        <h6 class="text-center mt-4">No posts found</h6>
    @endforelse
        
</ul>