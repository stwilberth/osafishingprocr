@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full max sm:w-1/2">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                    <h1 class="text-3xl font-bold">Contacts</h1>

                    {{-- add filter --}}
                    <div class="mt-4 mb-4">
                        <form method="GET" action="{{ route('contacts.index') }}">
                            <div class="flex items-center">
                                <label for="status" class="mr-2">Status:</label>
                                <select name="status" id="status" class="rounded">
                                    {{-- list of status; 0 = unread, 1 = read, 2 = pending, 3 = resolved --}}
                                    <option value="">All</option>
                                    <option value="0" {{ request('status') == 0 ? 'selected' : '' }}>Unread</option>
                                    <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Read</option>
                                    <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Pending</option>
                                    <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>Resolved</option>
                                </select>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Filter</button>
                            </div>
                        </form>
                    </div>
 
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($contacts as $contact)
                        <div class="{{ $contact->status_class }} shadow-md rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-2">{{ $contact->name }}</h2>
                            <p class="text-gray-700 mb-1">
                                <a href="mailto:{{ $contact->email }}" class="text-blue-500">{{ $contact->email }}</a>
                            </p>
                            <p class="text-gray-700 mb-1">
                                <a href="tel:{{ $contact->phone }}" class="text-blue-500">{{ $contact->phone }}</a>
                            </p>
                            <p class="text-gray-700 mb-1">
                                <a href="https://wa.me/{{ $contact->phone }}" class="text-green-500" target="_blank">Chat on WhatsApp</a>
                            </p>
                            <p class="text-gray-700 mb-1"><strong>Message:</strong> {{ $contact->message }}</p>
                            <p class="text-gray-700 mb-1 text-right">{{ $contact->created_at->format('d/m/Y H:i') }}</p>
                            <!-- show status whit different colors -->
                            <p class="mb-1 text-right">
                                <span class="bg-white text-black rounded-full px-2 py-1 text-xs font-semibold mr-1">{{ $contact->status_text }}</span>
                            <div class="flex justify-between mt-4">
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                                {{-- <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                </form> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
