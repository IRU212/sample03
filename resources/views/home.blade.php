<!DOCTYPE html>
<html lang="en">
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
    <div class="home_all">
        @foreach ($posts as $item)
            <div class="display_flex">
                <img src="{{ \Storage::url($item['profile']) }}" alt="" class="icon_img">
                <div>
                    <div class="home_message">{{ $item['text'] }}</div>
                    <div class="home_image">
                        @if ($item['image'])
                            <img src="{{ \Storage::url($item['image']) }}" alt="" class="img">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>