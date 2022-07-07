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
        @if ($errors->any())
            <div class="error_font">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <form action="{{ route('post-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input_form">
                <div>message</div>
                <div><textarea name="text" id="" cols="30" rows="1" class="input_text"></textarea></div>
                <label for="image"><div class="div_font">image</div></label>
                <label for="image"><img src="./img/input_img.png" alt="" class="input_img" id="preview"></label>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(function(){
        $("[name='image']").on('change', function (e) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $("#preview").attr('src', e.target.result);
            }

            reader.readAsDataURL(e.target.files[0]);   
        });
        });
    </script>
</body>
</html>