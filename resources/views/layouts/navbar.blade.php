<script>
    function toggleNavBar() {
        if($('.sideNav').css('right') < '0%') {
            return $('.sideNav').css('right', 0);
        }
        return $('.sideNav').css('right', '-100%');
    }
</script>
<style>
    .sideNavButton {
        top: 15px;
        right: 10px;
        z-index: 2;
    }

    .sideNav {
        top: 0;
        right: -100%;
        height: 100%;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
        z-index: 1;
    }
</style>
<div class="sideNavButton d-md-none position-fixed">
    <button class="btn btn-primary" type="button" onclick="toggleNavBar()">
        <span class="fas fa-bars" style="width: 14px;"></span>
    </button>
</div>
<div class="sideNav d-md-none position-fixed">
    <div class="text-center" style="padding: 65px 13px 13px 13px">
        <a class="btn btn-outline-primary btn-block m-1" title="gallery" href="{{ config('links.gallery') }}">gallery</a>
        <a class="btn btn-outline-primary btn-block m-1" title="login" href="{{ config('links.login') }}">login</a>
        <a class="btn btn-outline-primary btn-block m-1" title="create post" href="{{ config('links.createPost') }}">create post</a>
        <a class="btn btn-outline-primary m-1" title="patreon" href="https://patreon.com/frostedmist" target="_blank">
            <span class="fab fa-patreon"></span>
        </a>
        <a class="btn btn-outline-primary m-1" title="twitter" href="https://twitter.com/frostedmist" target="_blank">
            <span class="fab fa-twitter"></span>
        </a>
    </div>
</div>