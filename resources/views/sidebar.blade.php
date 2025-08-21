
@if(auth()->user()->hasRole('admin'))
<div style="background-color: rgb(21, 56, 70); color: aliceblue; width: 200px; padding: 40px; height: 70vh;">
    <ul>
        <li>
            <a style="color: aliceblue;" href="{{ route('admin.applications.index') }}">Application List</a>
        </li><br>
        <li>
            <a style="color: aliceblue;" href="{{ route('admin.vacances.index') }}">Vacance List</a>
        </li>
    </ul>
</div>
@endif


@if(auth()->user()->hasRole('user'))
<div style="background-color: rgb(27, 111, 145); color: aliceblue; width: 200px; padding: 40px; height: 80vh;">
    <ul>
        <li>
            <a style="color: aliceblue;" href="{{ route('user.applications.index') }}">Application List</a>
        </li><br>
        <li>
            <a style="color: aliceblue;" href="{{ route('user.vacances.index') }}">Vacance List</a>
        </li>
    </ul>
</div>
@endif



