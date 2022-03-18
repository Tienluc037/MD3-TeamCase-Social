<table border="3px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Role </th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->role->name}}</td>
            <td><a href="{{route('users.edit',$user->id)}}">Update</a></td>
            <td><a style="color: red" onclick="return confirm('Are you sure?')"
                   href="{{route('users.destroy',$user->id)}}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
