@extends('layout')
@section('content')
<div style="width: 100%;">
    <table style="width: 100%;">
        <thead style="background-color: brown; color: white;">
            <tr>
                <th>S/N</th>
                <th>Title</th>
                <th>Description</th>
                <th>Apply for Job(Upload Cover letter)</th>
            </tr>
        </thead>
        <tbody style="background-color: white; ">
            @foreach($applications as $application)
            <tr>
                <td style="border: solid 1px black;"> {{ $application->id }} </td>
                <td style="border: solid 1px black;"> {{ $application->user->name }} </td>
                <td style="border: solid 1px black;"> {{ $application->vacance->title }} </td>
                <td style="border: solid 1px black;"> 
                <a href="{{ route('user.applications.download', $application->id) }}">Download Cover Letter</a>
                </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
