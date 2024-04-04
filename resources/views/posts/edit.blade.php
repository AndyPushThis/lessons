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
                        <form method="post" action="{{ route('posts.update', compact('post')) }}">
                            @method('put')
                            <x-category-select :id="$post->category_id" />
                            <x-tag-select :current="$post->tags" />
                            <x-blog.inputs :post="$post"/>
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

