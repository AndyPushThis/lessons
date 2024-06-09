<x-admin.layout title="Tags">
    <a href="{{ route('admin.tags.create') }}" class="btn btn-dark">Create</a>
    <x-admin.table
        :collection="$tags"
        :names="['id', 'name']"
        edit
    />
</x-admin.layout>
