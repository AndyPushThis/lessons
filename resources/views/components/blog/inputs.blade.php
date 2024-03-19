@csrf
<input name="title" type="text" id="title" value="{{ old('title', $post->title ?? '') }}" placeholder="TITLE">
@error('title')
<p style="color: #a90707">{{ $message }}</p>
@enderror
<input name="cover" type="hidden" value="cover" required>
<textarea name="description"  id="description" placeholder="DESCRIPTION">{{ old('description', $post->description ?? '') }}</textarea>
@error('description')
<p style="color: #a90707">{{ $message }}</p>
@enderror
<textarea name="body"  id="body" placeholder="BODY">{{ old('body', $post->body ?? '') }}</textarea>
@error('body')
<p style="color: #a90707">{{ $message }}</p>
@enderror
