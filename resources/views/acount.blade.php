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
    <div class="acount">
        <form action="{{ route('acount-update', auth()->id() ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="text" name="name">
            <input type="text" name="email">
            <input type="file" name="image">
            <input type="file" name="back_image">
            <input type="submit" value="投稿">
        </form>
    </div>
</body>
</html>