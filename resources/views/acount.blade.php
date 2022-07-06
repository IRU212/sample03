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
    <div class="modal" id="modal">
        <a href="#!" class="overlay"></a>
        <div class="modal-wrapper">
          <div class="modal-contents">
            <a href="#!" class="modal-close">✕</a>
            <div class="modal-content">
              @include('acount_edit')
            </div>
          </div>
        </div>
      </div>
    @include('profile')
    @include('header')
    <div class="acount">
        <div class="acount_main_font">
            Acount
        </div>
        @foreach ($information as $item)
            <table class="table">
                <tr><td>name</td><td>{{ $item->name }}</td></tr>
                <tr><td>email</td><td>{{  $item->email  }}</td></tr>
            </table>
        @endforeach
        <div class="acount_setting_wrap">
            <div class="acount_setting modal-open"><a href="#modal">edit</a></div>
            <div class="acount_setting"><a href="{{ asset('/logout') }}">logout</a></div>
            <div class="acount_setting"><a href="">destory</a></div>
            <div class="acount_setting">

            </div>
        </div>
    </div>
    <div class="acount_message_box">
        <div class="acount_posts">
            @foreach ($posts as $item)  
                <div class="display_flex">
                    <img src="{{ \Storage::url($item->profile) }}" alt="" class="icon_img">
                    <div>
                        <div class="acount_message">{{ $item->text }}</div>
                        <div class="acount_image">
                            @if ($item->image)
                                <img src="{{ \Storage::url($item->image) }}" alt="" class="img">
                            @endif
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $('#image').on('change', function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
        $('#back-image').on('change', function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#back_preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
</body>
</html>