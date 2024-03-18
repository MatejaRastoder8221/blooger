<div class="card-body pt-3">
    <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
        <li class="nav-item">
            <a class="{{Route::is('dashboard') ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('dashboard')}}">
                <span>Home</span></a>
        </li>
        <li class="nav-item">
            <a class="{{Route::is('feed') ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('feed')}}">
                <span>Feed</span></a>
        </li>
        <li class="nav-item">
            <a class="{{Route::is('author') ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('author')}}">
                <span>Author</span></a>
        </li>
    </ul>
</div>
<div class="card-footer text-center py-2">
    <a class="btn btn-link btn-sm" href="{{route('profile',auth()->user())}}">View Profile </a>
</div>

