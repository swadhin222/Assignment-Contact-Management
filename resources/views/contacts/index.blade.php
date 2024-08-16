@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contacts</h1>
        
        <form method="GET" action="{{ route('contacts.index') }}" class="form-inline mb-3">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search by name or email" value="{{ request()->search }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('contacts.index', ['sort_by' => 'name', 'sort_direction' => request()->sort_direction === 'asc' ? 'desc' : 'asc']) }}">
                            Name @if(request()->sort_by === 'name') 
                                @if(request()->sort_direction === 'asc') &uarr; @else &darr; @endif
                            @endif
                        </a>
                    </th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>
                        <a href="{{ route('contacts.index', ['sort_by' => 'created_at', 'sort_direction' => request()->sort_direction === 'asc' ? 'desc' : 'asc']) }}">
                            Created At @if(request()->sort_by === 'created_at') 
                                @if(request()->sort_direction === 'asc') &uarr; @else &darr; @endif
                            @endif
                        </a>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contacts->links() }} <!-- Pagination links -->
    </div>
@endsection
