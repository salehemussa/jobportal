@extends('layout')
@section('content')
<div style="width: 100%;">
        @if(session('success'))
        <div style="background-color: green; color: white;">
            {{ session('success') }}
        </div>
    @endif   
    <table style="width: 100%;">
        <thead style="background-color: rgb(27, 111, 145); color: white;">
            <tr>
                <th>S/N</th>
                <th>Title</th>
                <th>Description</th>
                <th>Apply for Job(Upload Cover letter)</th>
            </tr>
        </thead>
        <tbody style="background-color: white; ">
            @foreach($vacances as $vacance)
            <tr>
                <td style="border: solid 1px black;"> {{ $vacance->id }} </td>
                <td style="border: solid 1px black;"> {{ $vacance->title }} </td>
                <td style="border: solid 1px black;"> {{ $vacance->description }} </td>
                <td style="border: solid 1px black;"> 
            <form method="POST" action="{{ route('apply', $vacance->id) }}" enctype="multipart/form-data">
              @csrf
                 <label>Upload Cover Letter (PDF only):</label>
                 <input type="file" name="cover_letter" accept="application/pdf" required>
                 <button type="submit">Apply</button>
            </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
