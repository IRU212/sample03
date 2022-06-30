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
        <form action="{{ route('post-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="text">
            <input type="file" name="image">
            <input type="submit" value="投稿">
        </form>
    </div>
</body>
</html>