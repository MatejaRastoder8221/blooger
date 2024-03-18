<div>
    <form action="{{route('posts.comments.store',$post->id)}}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @forelse($post->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                 src="{{$comment->user->getImageURL()}}" alt="Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{$comment->user->name}}
                    </h6>
                    <small class="fs-6 fw-light text-muted"> <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock me-1"> </span> {{$comment->created_at->diffForHumans()}}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{$comment->content}}
                </p>
            </div>
        </div>
    @empty
        <p class="text-center mt-4">No Comments Found.</p>
    @endforelse

</div>
