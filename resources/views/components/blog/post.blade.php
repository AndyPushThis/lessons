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
                    <div class="swiper-slide"><img src="{{ asset($post->cover) }}" alt=""></div>
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
        <p>
            {{ $post->description }}
        </p>
        <a href="{{ route('posts.show', compact('post')) }}" class="btn float-btn flat-btn" style="margin-right: 10px">Read more </a>

        @auth()
            @can('postOwner', $post)
            <a href="{{ route('posts.edit', compact('post')) }}" class="btn float-btn flat-btn">Edit Post </a>
            <form action="{{ route('posts.destroy', compact('post')) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn float-btn flat-btn" style="margin-right: 10px">Delete post </button>
            </form>
            @endcan
        @endauth
    </div>
</div>
