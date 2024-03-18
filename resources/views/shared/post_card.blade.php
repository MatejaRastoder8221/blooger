<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="{{$post->user->getImageURL()}}" alt="Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show',$post->user->id)}}"> {{$post->user->name}}
                        </a></h5>
                </div>
            </div>

            <div class="d-flex">
                <a href="{{route('posts.show',$post->id)}}">View</a>

                    @csrf
                    @method('DELETE')
                    @can('post_edit',$post)
                        <a class="mx-2" href="{{route('posts.edit',$post->id)}}">Edit</a>
                    <form method="post" action="{{route('posts.destroy',$post->id)}}">
                        @csrf
                        @method('delete')
                        <button class="ms-1 btn btn-danger btn-sm"> X</button>
                    </form>
                    @endcan

            </div>
        </div>
    </div>
    {{--    ?? ukoliko je promenljiva null ili undefined koristi prosledjeni default value--}}
    <div class="card-body">
        @if($edit ?? false)
            <form action="{{route('posts.update',$post->id)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="content" name="content" rows="3">{{$post->content}}</textarea>
                </div>
                @error('content')
                <span class="d-block fs-6 text-danger mb-2">{{$message}}</span>
                @enderror
                <div class="">
                    <button class="btn btn-success"> Edit</button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{$post->content}}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('posts.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock me-1"> </span>{{$post->created_at->diffForHumans()}} </span>
            </div>
        </div>
        @include('posts.shared.comments_section')
    </div>
</div>
