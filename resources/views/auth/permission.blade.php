@extends('layouts.app')

@section('content')
<div x-data="{ showPermissionForm: false, showRoleForm: false, permission: null, role: null }" class="container mx-auto p-4">

    <!-- Success Message -->
    @if(session('status'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <!-- Permissions Section -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Permissions</h2>
            <button @click="showPermissionForm = true; permission = null" class="bg-blue-500 text-white px-4 py-2 rounded">Add Permission</button>
        </div>

        <!-- Permissions List -->
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td class="border px-4 py-2">{{ $permission->name }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <button @click="showPermissionForm = true; permission = {{ $permission }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                            <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Permission Form Modal -->
    <div x-show="showPermissionForm" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center" style="display: none;">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h3 class="text-xl mb-4" x-text="permission ? 'Edit Permission' : 'Add Permission'"></h3>
            <form :action="permission ? '{{ route('permissions.update', '') }}/' + permission.id : '{{ route('permissions.store') }}'" method="POST">
                @csrf
                <template x-if="permission">
                    @method('PUT')
                </template>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Name</label>
                    <input type="text" name="name" x-model="permission ? permission.name : ''" class="border border-gray-300 p-2 rounded w-full" required>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="showPermissionForm = false; permission = null" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Roles Section -->
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Roles</h2>
            <button @click="showRoleForm = true; role = null" class="bg-blue-500 text-white px-4 py-2 rounded">Add Role</button>
        </div>

        <!-- Roles List -->
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td class="border px-4 py-2">{{ $role->name }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <button @click="showRoleForm = true; role = {{ $role }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Role Form Modal -->
    <div x-show="showRoleForm" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center" style="display: none;">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h3 class="text-xl mb-4" x-text="role ? 'Edit Role' : 'Add Role'"></h3>
            <form :action="role ? '{{ route('roles.update', '') }}/' + role.id : '{{ route('roles.store') }}'" method="POST">
                @csrf
                <template x-if="role">
                    @method('PUT')
                </template>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Name</label>
                    <input type="text" name="name" x-model="role ? role.name : ''" class="border border-gray-300 p-2 rounded w-full" required>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="showRoleForm = false; role = null" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
