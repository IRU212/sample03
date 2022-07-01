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
    <div class="acount">
        <div class="acount_main_font">
            Acount
        </div>
        @foreach ($information as $item)
            <table>
                <tr><td>name</td><td>{{ $item->name }}</td></tr>
                <tr><td>email</td><td>{{  $item->email  }}</td></tr>
            </table>
        @endforeach
        <div class="acount_setting_wrap">
            <div class="acount_setting modal-open"><a href="#modal">edit</a></div>
            <div class="acount_setting"><a href="">logout</a></div>
            <div class="acount_setting"><a href="">destory</a></div>
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
        </div>
    </div>
</body>
</html>