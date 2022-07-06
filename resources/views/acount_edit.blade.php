<form action="{{ route('acount-update', auth()->id() ) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <table class="table_edit">
        <tr><td>name</td><td><input type="text" name="name"></td></tr>
        <tr><td>email<td><input type="text" name="email"></td></tr>
        <tr><td>icon</td><td>
            <label for="image">
                need icon
                <img id="preview">
            </label>
        <input type="file" id="image" name="image" accept="image/*"></td></tr>
        <tr><td>back-image</td><td>
            <label for="back-image">
                need back-image
                <img id="back_preview">
            </label>
        <input type="file" id="back-image" name="back_image" accept="image/*"></td></tr>
        <tr><td></td><td><input type="submit" value="edit" class="input_submit"></td></tr>
    </table>
</form>
