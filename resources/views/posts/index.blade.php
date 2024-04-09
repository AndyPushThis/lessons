<x-layouts.main>
    @forelse($posts as $post)
     <x-blog.post :post="$post"/>
    @empty
        <h2>POSTS NOT FOUND</h2>
    @endforelse
    {{ $posts->links() }}
</x-layouts.main>
