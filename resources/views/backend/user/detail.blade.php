<h2>User</h2>
<div>

{{--    {{dd(\App\Models\Relation::getRelationStatus(1,$user->id)->status_id)}}--}}
    @if(\App\Models\Relation::getRelationStatus(\Illuminate\Support\Facades\Auth::user()->id,$user->id) == 1)
        <a href="{{route('cancel.request',$user->id)}}">Cancel Request</a>
    @else
        <a href="{{route('addFriend',$user->id)}}">Add Friend</a>
    @endif
</div>
<table border="1" class="table">
    <thead class="thead-dark">
    <tr>
        <th style="text-align: center">ID</th>
        <th style="text-align: center">Name</th>
        <th style="text-align: center">Email</th>
        <th style="text-align: center">Address</th>
    </tr>

    </thead>

    <tbody>
    <tr>
        <td style="text-align: center">{{$user->id}}</td>
        <td style="text-align: center">{{$user->name}}</td>
        <td style="text-align: center">{{$user->email}}</td>
        <td style="text-align: center">{{$user->address}}</td>
    </tr>
    </tbody>
</table>

<hr>
<h2>Post</h2>
<table border="3px">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Status</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        @if($user->id == $post->user_id )
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->status->name}}</td>
                <td>{{$post->user->name}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>

</table>


