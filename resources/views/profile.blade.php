<div class="profile">
    <div class="back_image">
        @foreach ($icon_image as $item)
            <img src="{{ \Storage::url($item->back_image) }}" alt="">
        @endforeach
    </div>
    <div class="icon">
        @foreach ($icon_image as $item)
            <img src="{{ \Storage::url($item->image) }}" alt="">
        @endforeach
    </div>
</div>