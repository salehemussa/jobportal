@extends('layout')
@section('content')
            <div>
            <form method="POST" action="{{ route('admin.vacances.store') }}">
              @csrf
                 <label>Title</label>
                 <input type="text" name="title"  required/>
                 <label>Description</label>
                 <input type="text" name="description"  required/>                 
                 <button type="submit">Applys</button>
            </form>
            </div>
@endsection
