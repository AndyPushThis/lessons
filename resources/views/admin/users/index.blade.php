<x-admin.layout title="Users">
    <x-admin.table
        :collection="$users"
        :names="['id', 'name', 'email', 'role']"
        edit
    />
</x-admin.layout>
