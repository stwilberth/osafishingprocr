@extends('layouts.app')

@section('content')

    <!-- Display the contact details -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact</h1>
                <a class="text-right" href="{{ route('contacts.index') }}">Back</a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Id</th>
                            <td>{{ $contact->id }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $contact->status() }}</td>
                        <tr>
                            <th>Name</th>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $contact->phone }}</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>{{ $contact->message }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection