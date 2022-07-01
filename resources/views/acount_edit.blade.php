<form action="{{ route('acount-update', auth()->id() ) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="display_flex"><div>name</div><div><input type="text" name="name"></div></div>
    <div class="display_flex"><div>email</div><div><input type="text" name="email"></div></div>
    <div class="display_flex"><div>icon</div><div><input type="file" name="image"></div></div>
    <div class="display_flex"><div>back-image</div><div><input type="file" name="back_image"></div></div>
    <div class="display_flex"><input type="submit" value="投稿"></div>
</form>