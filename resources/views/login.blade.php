@if (Route::has('login'))
<div>
    <div class="margin">
        <a href="{{ route('login') }}" class="ellips">Sign in</a>
    </div>
    <div class="margin">
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ellips">Sign up</a>
        @endif
    </div>
</div>
@endif