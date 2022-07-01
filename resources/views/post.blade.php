<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./scss/index.css">
</head>
<body>
    @include('profile')
    @include('header')
    <div class="post">
        <div class="main_post_font">
            Post Page
        </div>
        <form action="{{ route('post-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input_form">
                <div>message</div>
                <div><textarea name="text" id="" cols="30" rows="1" class="input_text"></textarea></div>
                <label for="image"><div class="div_font">image</div></label>
                <label for="image"><img src="./img/input_img.png" alt="" class="input_img"></label>
                <div><input type="file" name="image" class="input_image" id="image"></div>
                <div><input type="submit" value="share" class="input_submit"></div>
            </div>
        </form>
    </div>
    <div class="post_all">
        @foreach ($posts as $item)
            <div class="display_flex">
                <img src="{{ \Storage::url($item->profile) }}" alt="" class="icon_img">
                <div>
                    <div class="post_message">{{ $item->text }}</div>
                    <div class="post_image">
                        @if ($item->image)
                            <img src="{{ \Storage::url($item->image) }}" alt="" class="img">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>