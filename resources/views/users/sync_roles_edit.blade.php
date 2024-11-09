@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-8">
        <div class="px-6 py-4">
            <!-- User Information Card -->
            <div class="text-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                <p class="text-sm text-gray-600">{{ $user->email }}</p>
            </div>

            <!-- Form -->
            <form action="{{ route('users.sync_roles_update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Role Selection Dropdown -->
                <div class="mb-4">
                    <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                    <select name="roles[]" id="roles"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none 
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-6">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
                        Save Changes
                    </button>
                </div>

                {{-- show info validate feedback --}}
                @if ($errors->any())
                    <div class="text-red-500 text-xs mt-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
