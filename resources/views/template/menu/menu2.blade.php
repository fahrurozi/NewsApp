<a class="nav-link" href="{{route('article')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
    Article
</a>
<a class="nav-link" href="{{route('category')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-align-justify"></i></div>
    Category
</a>
<a class="nav-link" href="{{route('tags')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
    Tags
</a>

@if(Auth::check()&& Auth::user()->level =="admin")
<a class="nav-link" href="{{route('events')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
    Events
</a>
<a class="nav-link" href="{{route('teams')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-network-wired"></i></div>
    Teams
</a>
<a class="nav-link" href="{{route('videos')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
    Videos
</a>
<a class="nav-link" href="{{route('about')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-info"></i></div>
    About Us
</a>
<a class="nav-link" href="{{route('users')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
    Users
</a>
@endif