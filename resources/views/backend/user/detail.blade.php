<h2>User</h2>
<div>


    @if(\App\Models\Relation::getRelationStatus(\Illuminate\Support\Facades\Auth::user()->id,$user->id) == 1)
{{--        {{dd(\App\Models\Relation::getRelationship(\Illuminate\Support\Facades\Auth::user()->id,$user->id))}}--}}

        @if(\App\Models\Relation::getRelationship(\Illuminate\Support\Facades\Auth::user()->id,$user->id)->to == \Illuminate\Support\Facades\Auth::user()->id )
            <button><a href="{{route('accept.request',$user->id)}}">Confirm Friend Request</a></button>
            <button><a href="{{route('deny.request',$user->id)}}">Deny Friend Request</a></button>
        @elseif(\App\Models\Relation::getRelationship(\Illuminate\Support\Facades\Auth::user()->id,$user->id)->from == \Illuminate\Support\Facades\Auth::user()->id )
            <button><a href="{{route('cancel.request',$user->id)}}">Cancel Request</a></button>
        @endif
    @elseif(\App\Models\Relation::getRelationStatus(\Illuminate\Support\Facades\Auth::user()->id,$user->id) == 2)
        <p>Friend</p>
        <button><a href="{{route('block',$user->id)}}">Block</a></button>
    @elseif(\App\Models\Relation::getRelationStatus(\Illuminate\Support\Facades\Auth::user()->id,$user->id) == 3)
        <p>Blocked</p>
    @else
        <button><a href="{{route('addFriend',$user->id)}}">Add Friend</a></button>


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


{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Dobble Social Network</title>--}}

{{--    <!-- Bootstrap core CSS -->--}}
{{--    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">--}}

{{--    <!-- Custom styles for this template -->--}}
{{--    <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">--}}
{{--    --}}{{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">--}}

{{--</head>--}}
{{--<body>--}}

{{--<header>--}}
{{--    <div class="container">--}}
{{--        <img src="img/logo.png" class="logo" alt="">--}}
{{--    </div>--}}
{{--</header>--}}

{{--<nav class="navbar navbar-default">--}}
{{--    <div class="container">--}}
{{--        <div class="navbar-header">--}}
{{--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">--}}
{{--                <span class="sr-only">Toggle navigation</span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div id="navbar" class="collapse navbar-collapse">--}}
{{--            <ul class="nav navbar-nav">--}}
{{--                <li class="active"><a href="index.html">Home</a></li>--}}
{{--                @if(\Illuminate\Support\Facades\Auth::user()->id == 1)--}}
{{--                    <li><a href="{{route('users.index')}}">Members</a></li>--}}
{{--                @endif--}}
{{--                <li><a href="contact.html">Contact</a></li>--}}
{{--                <li><a href="groups.html">Groups</a></li>--}}
{{--                <li><a href="photos.html">Photos</a></li>--}}
{{--                --}}{{--                <li><a href="{{route('logout')}}">Logout</a></li>--}}
{{--            </ul>--}}


{{--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
{{--                <form class="navbar-form navbar-left">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control" placeholder="Search">--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-default">Submit</button>--}}
{{--                </form>--}}


{{--                <ul class="nav navbar-nav navbar-right">--}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::user()->name}} <span class="caret"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Profile</a></li>--}}
{{--                            --}}{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            --}}{{--                            <li><a href="#">Something else here</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">Logout</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div><!--/.nav-collapse -->--}}
{{--        </div> <!--/.container.fluid-->--}}
{{--    </div>--}}
{{--</nav>--}}
{{--</div>--}}

{{--</div>--}}
{{--</nav>--}}

{{--<section>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="profile">--}}
{{--                    <h1 class="page-header">Douglas Walter</h1>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <img src="public/img/user.png" class="img-thumbnail" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-8">--}}
{{--                            <ul>--}}
{{--                                <li><strong>Name:</strong>Doug Walter</li>--}}
{{--                                <li><strong>Email:</strong>doug@gmail.com</li>--}}
{{--                                <li><strong>City:</strong>Boston</li>--}}
{{--                                <li><strong>State:</strong>Massachusetts</li>--}}
{{--                                <li><strong>Gender:</strong>Male</li>--}}
{{--                                <li><strong>DOB:</strong>September 16th</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div><br><br>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="panel panel-default">--}}
{{--                                <div class="panel-heading">--}}
{{--                                    <h3 class="panel-title">Profile Wall</h3>--}}
{{--                                </div>--}}
{{--                                <div class="panel-body">--}}
{{--                                    <form>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <textarea class="form-control" placeholder="Write on the wall"></textarea>--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-default">Submit</button>--}}
{{--                                        <div class="pull-right">--}}
{{--                                            <div class="btn-toolbar">--}}
{{--                                                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text</button>--}}
{{--                                                <button type="button" class="btn btn-default"><i class="fa fa-file-image-o"></i>Image</button>--}}
{{--                                                <button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="panel panel-default friends">--}}
{{--                    <div class="panel-heading">--}}
{{--                        <h3 class="panel-title">My Friends</h3>--}}
{{--                    </div>--}}
{{--                    <div class="panel-body">--}}
{{--                        <ul>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                            <li><a href="profile.html" class="thumbnail"><img src="../public/img/user.png" alt=""></a></li>--}}
{{--                        </ul>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                        <a class="btn btn-primary" href="#">View All Friends</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="panel panel-default groups">--}}
{{--                    <div class="panel-heading">--}}
{{--                        <h3 class="panel-title">Latest Groups</h3>--}}
{{--                    </div>--}}
{{--                    <div class="panel-body">--}}
{{--                        <div class="group-item">--}}
{{--                            <img src="../public/img/group.png" alt="">--}}
{{--                            <h4><a href="#" class="">Sample Group One</a></h4>--}}
{{--                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>--}}
{{--                        </div>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                        <div class="group-item">--}}
{{--                            <img src="../public/img/group.png" alt="">--}}
{{--                            <h4><a href="#" class="">Sample Group Two</a></h4>--}}
{{--                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>--}}
{{--                        </div>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                        <div class="group-item">--}}
{{--                            <img src="../public/img/group.png" alt="">--}}
{{--                            <h4><a href="#" class="">Sample Group Three</a></h4>--}}
{{--                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>--}}
{{--                        </div>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                        <a href="#" class="btn btn-primary">View All Groups</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<footer>--}}
{{--    <div class="container">--}}
{{--        <p>Dobble Copyright &copy, 2015</p>--}}
{{--    </div>--}}
{{--</footer>--}}

{{--<!-- Bootstrap core JavaScript--}}
{{--================================================== -->--}}
{{--<!-- Placed at the end of the document so the pages load faster -->--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
{{--<script src="../public/js/bootstrap.js"></script>--}}
{{--</body>--}}
{{--</html>--}}


