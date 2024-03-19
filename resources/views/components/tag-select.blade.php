<label><b>TAGS</b></label>
<div style="display: flex; margin-bottom: 50px; justify-content: center;">
    @foreach($tags->chunk(5) as $chunk)
        <div style="margin-right: 50px; text-align: left;">
            @foreach($chunk as $tag)
                <br>
                <input type="checkbox" style="margin-right: 10px; margin-left:10px;">{{ $tag->name }}
            @endforeach
        </div>
    @endforeach
</div>
