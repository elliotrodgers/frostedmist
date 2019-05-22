<div class="d-none d-md-block">
    <a class="btn btn-outline-primary m-1" title="gallery" href="{{ config('links.gallery') }}">gallery</a>
    @if (session('logged_in'))
        <a class="btn btn-outline-primary m-1" title="create post" href="{{ config('links.createPost') }}">create post</a>
        <a class="btn btn-outline-primary m-1" title="logout" href="{{ config('links.logout') }}">logout</a>
    @endif
    <a class="btn btn-outline-primary m-1" title="patreon" href="https://patreon.com/frostedmist" target="_blank">
        <span class="fab fa-patreon"></span>
    </a>
    <a class="btn btn-outline-primary m-1" title="twitter" href="https://twitter.com/frostedmist" target="_blank">
        <span class="fab fa-twitter"></span>
    </a>
</div>
<div class="d-md-none">
    <a class="btn btn-outline-primary btn-block m-1" title="gallery" href="{{ config('links.gallery') }}">gallery</a>
    @if (session('logged_in'))
        <a class="btn btn-outline-primary btn-block m-1" title="create post" href="{{ config('links.createPost') }}">create post</a>
        <a class="btn btn-outline-primary btn-block m-1" title="logout" href="{{ config('links.logout') }}">logout</a>
    @endif
    <a class="btn btn-outline-primary btn-block m-1" title="patreon" href="https://patreon.com/frostedmist" target="_blank">
        <span class="fab fa-patreon"></span>
    </a>
    <a class="btn btn-outline-primary btn-block m-1" title="twitter" href="https://twitter.com/frostedmist" target="_blank">
        <span class="fab fa-twitter"></span>
    </a>
</div>