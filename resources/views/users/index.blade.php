@extends('layouts.app')

@section('content')
    <!-- list users -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Name</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Roles</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Permissions</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            @foreach ($user->getRoleNames() as $role)
                                <span
                                    class="inline-block bg-blue-500 text-white text-xs px-2 rounded-full">{{ $role }}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            @foreach ($user->permissions as $permission)
                                <span
                                    class="inline-block bg-green-500 text-white text-xs px-2 rounded-full">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="{{ route('users.destroy', $user->id) }}"
                                class="text-red-600 hover:text-red-900 ml-4">Delete</a>
                            <a href="{{ route('users.sync_roles_edit', $user->id) }}" 
                                class="text-green-600 hover:text-green-900 ml-4">Sync Roles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
