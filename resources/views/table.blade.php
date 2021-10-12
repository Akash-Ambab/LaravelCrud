<div class="showContainer">
    <table id="showTable" class='table'>
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Class</th>
        <th>Course</th>
        <th>Contact</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{$record->id}}</td>
                <td>{{$record->name}}</td>
                <td>{{$record->class}}</td>
                <td>{{$record->course}}</td>
                <td>{{$record->contact}}</td>
                <td>
                    <a href="/student/{{$record->id}}/edit">Edit</a>
                    <a href="/student/{{$record->id}}/delete">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>