<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{route('users.update',$user->id)}}" method="post">
            @csrf
            @method('put')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="{{$user->getImageURL()}}" alt="Avatar">
                <div>
                        <input name="name" type="text" value="{{$user->name}}" class="form-control">
                        @error('name')
                        <span class="text-danger fs-6">{{$message}}</span>
                        @enderror
                </div>
            </div>
            @auth()
                @if(\Illuminate\Support\Facades\Auth::id() === $user->id)
                    <div>
                        <a href="{{route('users.show',$user->id)}}">Show</a>
                    </div>
                @endif
            @endauth
        </div>
        <div>
            <label for="image" class="mt-4"> Profile Picture</label>
            <input name="image" type="file" class="mt-2 form-control">
            @error('image')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea class="form-control" id="bio" name="bio" rows="3">{{$user->bio}}</textarea>
                </div>
                @error('bio')
                <span class="d-block fs-6 text-danger mb-2">{{$message}}</span>
                @enderror
                <button class="btn btn-dark btn-sm mb-3">Save</button>
            @include('users.shared.user_stats')
        </div>
        </form>
    </div>
</div>

