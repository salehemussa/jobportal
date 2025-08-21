@extends('layout')
@section('content')

<div style="width: 100%;">
    @if(session('success'))
        <div style="background-color: green; color: white;">
            {{ session('success') }}
        </div>
    @endif   

<div style="display: flex; align-items: center; gap: 30px; padding: 5px;">
    <a href="{{ route('admin.vacances.create') }}" 
       style="padding: 6px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">
       + Add New
    </a>

    <form method="GET" action="{{ route('admin.vacances.index') }}" style="display: flex; gap: 5px;">
        <input type="text" name="search" placeholder="Search vacancies..." value="{{ $search ?? '' }}">
        <button type="submit">Search</button>
    </form>
</div>

    <table style="width: 100%;">
        <thead style="background-color: rgb(21, 56, 70); color: white;">
            <tr>
                <th>S/N</th>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="background-color: white; ">
            @foreach($vacances as $vacance)
            <tr>
                <td style="border: solid 1px black;"> {{ $vacance->id }} </td>
                <td style="border: solid 1px black;"> {{ $vacance->title }} </td>
                <td style="border: solid 1px black;"> {{ $vacance->description }} </td>
                <td style="border: solid 1px black;"> {{ $vacance->created_at->toDateString() }} </td>
                <td style="border: solid 1px black;">
                  {{ $vacance->status }}
                    <form action="{{ route('admin.vacances.toggleStatus', $vacance->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="margin-left:10px;">
                   {{ $vacance->status === 'active' ? 'Set Inactive' : 'Set Active' }}
                    </button>
                    </form>
                </td>
                <td style="border: solid 1px black;"> 
                    <a href="{{ route('admin.vacances.edit', $vacance->id) }}">Edit</a>
                  <form action="{{ route('admin.vacances.destroy', $vacance->id) }}" method="POST" style="display:inline;">
                    @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this vacance?')">Delete</button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
