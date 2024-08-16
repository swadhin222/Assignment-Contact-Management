@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact Details</h1>
        <div class="card">
            <div class="card-header">
                {{ $contact->name }}
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $contact->email }}</p>
                <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                <p><strong>Address:</strong> {{ $contact->address }}</p>
                <p><strong>Created At:</strong> {{ $contact->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>Updated At:</strong> {{ $contact->updated_at->format('Y-m-d H:i') }}</p>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
