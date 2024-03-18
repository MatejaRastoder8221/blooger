<div class="card-body pt-3">
    <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
        <li class="nav-item">
            <a class="{{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('admin.dashboard') }}">
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ Route::is('admin.users') ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('admin.users') }}">
                <span>Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ Route::is('admin.posts') ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('admin.posts') }}">
                <span>Posts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ Route::is('admin.comments') ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('admin.comments') }}">
                <span>Comments</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{Route::is('admin.author') ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('admin.author')}}">
                <span>Author</span></a>
        </li>
    </ul>
</div>
<div class="card-footer text-center py-2">
    <a class="btn btn-link btn-sm" href="{{ route('profile', auth()->user()) }}">View Profile</a>
</div>
