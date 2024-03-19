<div style="margin-bottom: 20px;">
    <label><b>Category: ></b></label>
    <select name="category_id" style="width: 200px; height: 30px;">
        @foreach($categories as $category)
            <option
                @selected($currentId === $category->id)
                value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
