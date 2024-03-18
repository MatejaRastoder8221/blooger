@auth()
    <h4> Share yours thoughts </h4>
    <div class="row">
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            @error('content')
            <span class="d-block fs-6 text-danger mb-2">{{$message}}</span>
            @enderror
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest()
    <h4>Must be logged in to be able to post!</h4>
@endguest
