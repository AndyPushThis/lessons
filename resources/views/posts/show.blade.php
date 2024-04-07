<x-layouts.main>
    <div class="content">
        <section class="big-pad-sec">
            <div class="container">
                <!-- post -->
                <div class="post fl-wrap fw-post">
                    <h2><span>{{ $post->title }}</span></h2>
                    <ul class="blog-title-opt">
                        <li>{{ $post->created_at->format('d M Y') }}</a></li>
                        <li> - </li>
                        <li style="text-transform: uppercase">{{ $post->category?->name }}</li>
                        <li style="text-transform: uppercase">{{ $post->user?->name }}</li>
                    </ul>
                    <!-- blog media -->
                    <div class="blog-media fl-wrap">
                        <div class="single-slider fl-wrap" data-effects="slide">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="{{ asset( asset($post->cover)) }}" alt=""></div>
                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- blog media end -->
                    <div class="blog-text fl-wrap">
                        <div class="pr-tags fl-wrap">
                            <span>Tags : </span>
                            <ul>
                                @foreach($post->tags as $tag)
                                    <li><a href="#">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <p>{{ $post->body }}</p>
                        <div class="share-holder block-share  fl-wrap ">
                            <span>Share :</span>
                            <div class="share-container  isShare"></div>
                        </div>
                    </div>
                    <div class="content-nav fl-wrap">
                        <ul>
                            <li>
                                <span>Next</span>
                                <a href="portfolio-single.html">Living my dream</a>
                            </li>
                            <li>
                                <span>Prev</span>
                                <a href="portfolio-single.html">Sunny side up</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- post end-->
                <!-- post-author-->
                <div class="post-author">
                    <div class="author-img">
                        <img alt='' src="{{ asset('images/blog/1.jpg') }}">
                    </div>
                    <div class="author-content">
                        <h5><a href="#">{{ $post->user->name }}</a></h5>
                        <p>{{ $post->user->description }}</p>
                        <div class="author-social">
                            @auth
                            <ul id="buttonWrapper">
                                @if($isSubscribed)
                                <li style="cursor: pointer;" onclick="unsubscribe('{{ $post->user->id }}')" id="unsubscribeButton">
                                    <span><i style="color: white;" class="fa fa-minus"></i></span></li>
                                @else
                                <li style="cursor: pointer;" onclick="subscribe('{{ $post->user->id }}')" id="subscribeButton">
                                    <span><i style="color: white;" class="fa fa-plus"></i></span></li>
                                @endif
                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
                <!--post-author end-->
                <x-blog.comments :post="$post" />
                <!--comments end -->
            </div>
        </section>
    </div>
</x-layouts.main>
<script>
    async function subscribe(authorId){
        let response = await fetch('{{ route('subscriptions.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json; charset=utf-8',
                'X-CSRF-Token': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                author_id: authorId
            })
        });
        if(response.status == 201){
            document.querySelector('#subscribeButton').remove();
            let button = document.createElement('li');
            button.style="cursor: pointer";
            button.onclick=function (){
                unsubscribe('{{ $post->user->id }}')
            };
            button.id = "unsubscribeButton";
            button.innerHTML = `<span><i style="color: white;" class="fa fa-minus"></i></span>`;
            document.querySelector('#buttonWrapper').append(button);
        }
    }

    async function unsubscribe(authorId){
        let response = await fetch('{{ route('subscriptions.destroy') }}', {
            method: 'DELETE',
            headers: {
                'Content-Type' : 'application/json; charset=utf-8',
                'X-CSRF-Token': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                author_id: authorId
            })
        });
        if(response.status == 200) {
            document.querySelector('#unsubscribeButton').remove();

            let button = document.createElement('li');
            button.style = "cursor: pointer";
            button.onclick = function () {
                subscribe('{{ $post->user->id }}')
            };
            button.id = "subscribeButton";
            button.innerHTML = `<span><i style="color: white;" class="fa fa-plus"></i></span>`;
            document.querySelector('#buttonWrapper').append(button);
        }
    }
</script>
