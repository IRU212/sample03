<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('./scss/index.css') }}">
</head>
<body>
    @include('profile')
    @include('header')
    <div class="search">
        @foreach ($posts as $item)  
            <div class="display_flex">
                <img src="{{ \Storage::url($item->profile) }}" alt="" class="icon_img">
                <div>
                    <div class="search_message">{{ $item->text }}</div>
                    <div class="search_image">
                        @if ($item->image)
                            <img src="{{ \Storage::url($item->image) }}" alt="" class="img">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="search_box">
        <form action="{{ route('search-index') }}" method="post">
            @csrf
            <input type="text" name="keyword" class="keyword" placeholder="Please Search">
            <input type="submit" value="search" class="submit">
        </form>

        <div class="search_results">
            @foreach ($results as $item)
                <div class="display_flex">
                    <img src="{{ \Storage::url($item->profile) }}" alt="" class="icon_img">
                    <div>
                        <div class="search_message">{{ $item->text }}</div>
                        <div class="search_image">
                            @if ($item->image)
                                <img src="{{ \Storage::url($item->image) }}" alt="" class="img">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</body>
</html>