<x-layouts.main>
    @foreach($posts as $post)
     <x-blog.post :post="$post"/>
    @endforeach
    {{ $posts->links() }}
</x-layouts.main>
