@extends('layouts.app')

@section('content')
    <div x-data="{
        showPermissionForm: false,
        showRoleForm: false,
        permission: {
            id: null,
            name: ''
        },
        role: {
            id: null,
            name: ''
        }
    }" class="container mx-auto p-4">

        <!-- Success Message -->
        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <!-- Permissions Section -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold">Permissions</h2>
                <button @click="showPermissionForm = true; permission = null"
                    class="bg-blue-500 text-white px-4 py-2 rounded">Add Permission</button>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="border px-4 py-2">{{ $permission->name }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <button @click="showPermissionForm = true; permission = {{ $permission }}"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                                <form action="{{ route('permissions.destroy', $permission) }}" method="POST"
                                    class="inline-block">
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

        <!-- Add Permission Form Modal -->
        <div x-show="showPermissionForm && !permission"
            class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center" style="display: none;">
            <div class="bg-white p-6 rounded shadow-lg w-1/3">
                <h3 class="text-xl mb-4">Add Permission</h3>
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Name</label>
                        <input type="text" name="name" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showPermissionForm = false"
                            class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Permission Form Modal -->
        <div x-show="showPermissionForm && permission"
            class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center" style="display: none;">
            <div class="bg-white p-6 rounded shadow-lg w-1/3">
                <h3 class="text-xl mb-4">Edit Permission</h3>
                <form :action="'{{ route('permissions.update', '') }}/' + permission.id" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Name</label>
                        <input type="text" name="name" x-model="permission.name"
                            class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showPermissionForm = false; permission = null"
                            class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Roles Section -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold">Roles</h2>
                <button @click="showRoleForm = true; role = null" class="bg-blue-500 text-white px-4 py-2 rounded">Add
                    Role</button>
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
                    @foreach ($roles as $role)
                        <tr>
                            <td class="border px-4 py-2">{{ $role->name }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <button @click="showRoleForm = true; role = {{ $role }}"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
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

        <!-- Add Role Form Modal -->
        <div x-show="showRoleForm && !role" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center"
            style="display: none;">
            <div class="bg-white p-6 rounded shadow-lg w-1/3">
                <h3 class="text-xl mb-4">Add Role</h3>
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Name</label>
                        <input type="text" name="name" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showRoleForm = false"
                            class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Role Form Modal -->
        <div x-show="showRoleForm && role" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center"
            style="display: none;">
            <div class="bg-white p-6 rounded shadow-lg w-1/3">
                <h3 class="text-xl mb-4">Edit Role</h3>
                <form :action="'{{ route('roles.update', '') }}/' + role.id" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Name</label>
                        <input type="text" name="name" x-model="role.name"
                            class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showRoleForm = false; role = null"
                            class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>



    </div>

    <!-- Assign Permissions Section -->
    <div x-data="{ open: false }" class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Assign Permissions</h2>
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Permissions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="border px-4 py-2">{{ $role->name }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex space-x-2">
                                <form action="{{ route('roles.sync', $role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex space-x-2">
                                        @foreach ($permissions as $permission)
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permission_ids[]"
                                                    value="{{ $permission->id }}"
                                                    @if ($role->hasPermissionTo($permission->name)) checked @endif>
                                                <span class="ml-2">{{ $permission->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="flex justify-end space-x-2 mt-4">
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
