@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-8">
        <div class="px-6 py-4">
            <!-- User Information Card -->
            <div class="text-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                <p class="text-sm text-gray-600">{{ $user->email }}</p>
            </div>

            <!-- Form edit name and email user -->
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none 
                                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none 
                                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
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
