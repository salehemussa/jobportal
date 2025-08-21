@extends('layout')
@section('content')
<div style="width: 100%;">
<a href="{{ route('admin.applications.report') }}" class="btn btn-success" target="_blank">Generete PDF</a>
    <table style="width: 100%;">
        <thead style="background-color: rgb(27, 111, 145); color: white;">
            <tr>
                <th>S/N</th>
                <th>Candidate</th>
                <th>Job Title</th>
                 <th>Job Description</th> 
                <th>Cover Letter </th>
            </tr>
        </thead>
        <tbody style="background-color: white; ">
            @foreach($applications as $application)
            <tr>
                <td style="border: solid 1px black;"> {{ $application->id }} </td>
                <td style="border: solid 1px black;"> {{ $application->user->name }} </td>
                <td style="border: solid 1px black;"> {{ $application->vacance->title }} </td>
                <td style="border: solid 1px black;"> {{ $application->vacance->description }} </td>
                <td style="border: solid 1px black;"> 
                <a href="{{ route('applications.download', $application->id) }}">Download PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
