<x-admin.layout title="Categories">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-dark">Create</a>
    <x-admin.table
        :collection="$categories"
        :names="['id', 'name']"
        edit
    />
</x-admin.layout>
