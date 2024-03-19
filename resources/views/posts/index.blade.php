<x-layouts.main>
    @foreach($posts as $post)
     <x-blog.post :post="$post"/>
    @endforeach
    <div class="pagination-container">
        <a href="#" class="prevposts-link"><i class="fa fa-chevron-left"></i></a>
        <a href="#">1</a>
        <a href="#" class="current-page">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#" class="nextposts-link"><i class="fa fa-chevron-right"></i></a>
    </div>
</x-layouts.main>
