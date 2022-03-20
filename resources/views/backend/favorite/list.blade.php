<table border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Content</th>
        <th>User Post</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['image']}}</td>
            <td>{{$post['content']}}</td>
            <td>{{$post['user_id']}}</td>
            <td>{{$post['quantity']}}</td>
            <td><a href="{{route('favorites.deleteToFavorite',$post['id'])}}" style="color: red">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
