@extends('layouts.app')

@section('content')
    <!-- Display the contact details -->
    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full max sm:w-1/2">
                <div class="{{ $contact->status_class }} shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-2">{{ $contact->name }}</h2>
                    <p class="text-gray-700 mb-1">
                        <a href="mailto:{{ $contact->email }}" class="text-blue-500">{{ $contact->email }}</a>
                    </p>
                    <p class="text-gray-700 mb-1">
                        <a href="tel:{{ $contact->phone }}" class="text-blue-500">{{ $contact->phone }}</a>
                    </p>
                    <p class="text-gray-700 mb-1">
                        <a href="https://wa.me/{{ $contact->phone }}" class="text-green-500" target="_blank">Chat on
                            WhatsApp</a>
                    </p>
                    <p class="text-gray-700 mb-1"><strong>Message:</strong> {{ $contact->message }}</p>
                    <p class="text-gray-700 mb-1 text-right">{{ $contact->created_at->format('d/m/Y H:i') }}</p>
                    <!-- show status with different colors -->
                    <p class="mb-1 text-right">
                        <span
                            class="bg-white text-black rounded-full px-2 py-1 text-xs font-semibold mr-1">{{ $contact->status_text }}</span>
                    </p>
                    <!-- Form to change status -->
                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Change Status:</label>
                            <select name="status" id="status" class="form-select mt-1 block w-full">
                                {{-- list of status; 0 = unread, 1 = read, 2 = pending, 3 = resolved --}}
                                <option value="0" {{ $contact->status == 0 ? 'selected' : '' }}>Unread</option>
                                <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>Read</option>
                                <option value="2" {{ $contact->status == 2 ? 'selected' : '' }}>Pending</option>
                                <option value="3" {{ $contact->status == 3 ? 'selected' : '' }}>Resolved</option>
                            </select>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Status</button>
                            <!-- back button -->
                            <a href="{{ route('contacts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
