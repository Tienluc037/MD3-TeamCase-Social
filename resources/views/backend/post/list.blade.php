<a href="{{route('posts.create')}}">Create</a>
<table border="3px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Content</th>
        <th>Image</th>
        <th>Status</th>
        <th>User Post</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->content}}</td>
        <td>{{$post->status->name}}</td>
        <td>{{$post->user->name}}</td>
        <td><img src="{{asset('storage/' . $post->image)}}" alt="" width="100"></td>
        <td><a style="color: red" onclick="return confirm('Bạn có muốn xóa?')"
               href="{{route('posts.destroy',$post->id)}}">Delete</a></td>
        <td><a style="color: #0d730a" href="{{route('posts.edit',$post->id)}}">Update</a></td>
    </tr>
    @endforeach
    </tbody>
</table>

