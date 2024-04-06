@csrf
<input name="title" type="text" id="title" value="{{ old('title', $post->title ?? '') }}" placeholder="TITLE">
@error('title')
<p style="color: #a90707">{{ $message }}</p>
@enderror
<textarea name="description"  id="description" placeholder="DESCRIPTION">{{ old('description', $post->description ?? '') }}</textarea>
@error('description')
<p style="color: #a90707">{{ $message }}</p>
@enderror
<textarea name="body"  id="body" placeholder="BODY">{{ old('body', $post->body ?? '') }}</textarea>
@error('body')
<p style="color: #a90707">{{ $message }}</p>
@enderror
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif
