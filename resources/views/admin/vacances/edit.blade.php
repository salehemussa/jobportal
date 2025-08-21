@extends('layout')

@section('content')
    <h2>Edit Vacance</h2><br>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.vacances.update', $vacance->id) }}" method="POST">
    @csrf
    @method('PUT')
    Title: <input type="text" name="title" value="{{ $vacance->title }}"><br><br>
    Description:<br>
    <textarea name="description">{{ $vacance->description }}</textarea><br><br>
    <button type="submit">Update</button>
    </form>
    @endsection
