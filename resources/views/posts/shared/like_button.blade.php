<div>
    @auth()
        @if(Auth::user()->likesPost($post))
            <form action="{{route('posts.unlike',$post->id)}}" method="post">
                @csrf
                <button type="submit" class="btn"><span class="fas fa-heart me-1"></span> {{$post->likes_count}}</button>
            </form>
        @else
            <form action="{{route('posts.like',$post->id)}}" method="post">
                @csrf
                <button type="submit" class="btn"><span class="far fa-heart me-1"></span> {{$post->likes_count}}</button>
            </form>
        @endif
    @endauth
    @guest
        <a href="{{route('login')}}" class="fw-light nav-link fs-6"><span class="far fa-heart me-1"></span> {{$post->likes_count}}</a>
    @endguest
</div>
