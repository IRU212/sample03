<header>
    <div><a href="{{ route('post-index') }}">post</a></div>
    <div><a href="{{ route('acount-index',$id = auth()->id() ) }}">acount</a></div>
    <div><a href="{{ asset('search') }}">search</a></div>
    <div><a href="{{ asset('setting') }}">setting</a></div>
</header>