<x-layouts.main>
    <section>
        <div class="container">
            <div class="section-title">
                <h3>Write us</h3>
            </div>
            <div class="text-container fl-wrap">
                <p>Praesent nec leo venenatis elit semper aliquet id ac enim. Maecenas nec mi leo. Etiam venenatis ut dui non hendrerit. Integer dictum, diam vitae blandit accumsan, dolor odio tempus arcu, vel ultrices nisi nibh vitae ligula.</p>
                <!-- contact form -->
                <div class="contact-form-holder fl-wrap">
                    <div id="contact-form">
                        <div id="message"></div>
                        <form method="post" action="{{ route('posts.update', compact('post')) }}"
                              enctype="multipart/form-data"
                        >
                            @method('put')
                            <x-category-select :id="$post->category_id" />
                            <x-tag-select :current="$post->tags" />
                            @csrf
                            <input name="id" type="text" id="id"
                                   value="{{  $post->id }}"  hidden>
                            <input name="slug" type="text" id="slug"
                                   value="{{ old('slug', $post->slug ?? '') }}" placeholder="SLUG">
                            @error('slug')
                            <p style="color: #a90707">{{ $message }}</p>
                            @enderror
                            <x-blog.inputs :post="$post"/>
                            <input type="file" name="cover">
                            <img src="{{ asset($post->cover) }}" alt="">
                            <button type="submit"  id="submit"
                                    data-top-bottom="transform: translateY(-50px);"
                                    data-bottom-top="transform: translateY(50px);"><span>Save </span></button>
                        </form>
                    </div>
                </div>
                <!-- contact form  end-->
            </div>
        </div>
    </section>
</x-layouts.main>

