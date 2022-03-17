<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <label for="">Trạng thái</label>
        <select name="status" id="status"  >
            @foreach($status as $statu)
                <option value="{{$statu->id}}">{{$statu->name}}</option>
            @endforeach
        </select>
    <label for="">Người viết</label>
    <select name="user" id="user">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <div class="form-group" >
        <label for="" >Nội dung
            <textarea name="content" class="form-control" rows="5" cols="100">{{old('content')}} </textarea></label>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a class="btn btn-success" href="{{route('posts.index')}}">Back</a>
</form>





