<!DOCTYPE html>
<html>
    @extends('head')
    <body>
        <div class="left">
            <img src="./img/login_back.jpg" alt="">
            <div class="left-text">
                Let's talk about<br> 
                anime and manga
            </div>
        </div>
        <div class="right">
            <form action="{{ route('image-store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" id="">
                <input type="file" name="back_image" id="">
                <input type="submit" value="register">
            </form>
        </div>
    </body>
</html>
