<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dobble Social Network</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
{{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">--}}

    @toastr_css
</head>
<body>

<header>
    <div class="container">
        <img src="img/logo.png" class="logo" alt="">
        {{--        <form class="form-inline">--}}
        {{--            <div class="form-group">--}}
        {{--                <label class="sr-only" for="exampleInputEmail3">Email address</label>--}}
        {{--                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">--}}
        {{--            </div>--}}
        {{--            <div class="form-group">--}}
        {{--                <label class="sr-only" for="exampleInputPassword3">Password</label>--}}
        {{--                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">--}}
        {{--            </div>--}}
        {{--            <button type="submit" class="btn btn-default">Sign in</button><br>--}}
        {{--            <div class="checkbox">--}}
        {{--                <label>--}}
        {{--                    <input type="checkbox"> Remember me--}}
        {{--                </label>--}}
        {{--            </div>--}}
        {{--        </form>--}}
    </div>
{{--    <div class="container">--}}
{{--    <nav class="navbar navbar-default">--}}
{{--        <div class="container-fluid">--}}
{{--            <!-- Brand and toggle get grouped for better mobile display -->--}}
{{--            <div class="navbar-header">--}}
{{--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
{{--                    <span class="sr-only">Toggle navigation</span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                </button>--}}
{{--                <a class="navbar-brand" href="#">Brand</a>--}}
{{--            </div>--}}

{{--            <!-- Collect the nav links, forms, and other content for toggling -->--}}
{{--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
{{--                <form class="navbar-form navbar-left">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control" placeholder="Search">--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-default">Submit</button>--}}
{{--                </form>--}}
{{--                <ul class="nav navbar-nav navbar-right">--}}
{{--                    <li><a href="#">Link</a></li>--}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Action</a></li>--}}
{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            <li><a href="#">Something else here</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">Separated link</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div><!-- /.navbar-collapse -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </nav>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        <p style="text-align: right">Welcome {{\Illuminate\Support\Facades\Auth::user()->name}} </p>--}}
{{--    </div>--}}
</header>

    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
{{--        <div class="navbar-header">--}}
{{--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"--}}
{{--                    aria-expanded="false" aria-controls="navbar">--}}
{{--                <span class="sr-only">Toggle navigation</span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--            </button>--}}
{{--        </div>--}}
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Home</a></li>
                @if(\Illuminate\Support\Facades\Auth::user()->id == 1)
                <li><a href="{{route('users.index')}}">Members</a></li>
                @endif
                <li><a href="contact.html">Contact</a></li>
                <li><a href="groups.html">Groups</a></li>
                <li><a href="photos.html">Photos</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>



            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>



                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            <li><a href="#">Something else here</a></li>--}}
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
        </div><!--/.nav-collapse -->
        </div> <!--/.container.fluid-->
            </div>
        </nav>
    </div>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Wall</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" id="uploadForm">

                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Write on the wall"
                                          name="content"></textarea>
                            </div>
{{--?              show img--}}
                            <div class="form-group">
{{--                                <img id="img" alt="" width="100" height="100" />--}}
{{--                                <input type="file" name="image" class="form-control"--}}
{{--                                       onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">--}}
{{--                                        <input type="file" name="image" class="form-control">--}}

                            </div>

                                    <button type="submit" class="btn btn-default">Submit</button>


                            <div class="pull-right">
                                <div class="btn-toolbar">
                                    <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text
                                    </button>



{{--           image--}}
                                    <button type="button" class="btn btn-default">
                                        <div class="custom-file-upload">
                                        <label for="file-upload" >
                                            <i class="fa fa-file-image-o"></i>Image
                                        </label>
                                        <input  name="image" id="file-upload" type="file"/>
                                    </div>
                                </button>




                                    <button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                {{--                List post--}}
                <div class="post-s">
                    @foreach($posts as $post)

                        <div class="panel panel-default post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="{{route('users.show',$post->user->id)}}" class="post-avatar thumbnail"><img src="img/user.png"
                                                                                                  alt="">
                                            <div class="text-center">{{$post->user->name}}</div>
                                        </a>
                                        <div class="likes text-center">
                                            @if(\Illuminate\Support\Facades\Auth::user()->id != $post->user_id)
                                                <a href="#">Follow</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="bubble">
                                            <div class="pointer">
                                                <p>{{$post->content}}</p>
                                                <img src="{{asset('storage/'.$post->image)}}" alt="" style="width: 100px; height: auto">
                                            </div>


                                            <div class="pointer-border"></div>
                                        </div>
                                        <p class="post-actions">
                                            <a href="#">Comment</a>
                                            <a class="action" href="#">Like</a>
                                            @if(\Illuminate\Support\Facades\Auth::user()->id == $post->user_id)
                                                <a class="action" onclick="return confirm('Bạn có muốn xóa ?')"
                                                   href="{{route('posts.destroy',$post->id)}}">Delete</a></p>
                                            @endif
                                        <div class="comment-form">
                                            <form class="form-inline" method="post" action="{{route('comments.store',$post->id)}}" >
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="enter comment" name="comment">
                                                </div>
                                                <button type="submit" class="btn btn-default">Add</button>
                                            </form>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="comments">
                                            @foreach($post->comments as $comment)
                                            <div class="comment">
                                                <h5>{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                                <a href="#" class="comment-avatar pull-left"><img src="img/user.png"
                                                                                                  alt=""></a>
                                                <div class="comment-text">
                                                    <p>{{$comment->content}}</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                {{--                My friend--}}
            </div>
            <div class="col-md-4  ">
                <div class="panel panel-default friends">
                    <div class="panel-heading">
                        <h3 class="panel-title">My Friends</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <a class="btn btn-primary" href="#">View All Friends</a>
                    </div>
                </div>
                <div class="panel panel-default groups">
                    <div class="panel-heading">
                        <h3 class="panel-title">Latest Groups</h3>
                    </div>
                    <div class="panel-body">
                        <div class="group-item">
                            <img src="img/group.png" alt="">
                            <h4><a href="#" class="">Sample Group One</a></h4>
                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="group-item">
                            <img src="img/group.png" alt="">
                            <h4><a href="#" class="">Sample Group Two</a></h4>
                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="group-item">
                            <img src="img/group.png" alt="">
                            <h4><a href="#" class="">Sample Group Three</a></h4>
                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                        </div>
                        <div class="clearfix"></div>
                        <a href="#" class="btn btn-primary">View All Groups</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <p>Copyright &copy, 2022</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script  src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script >
</body>
@jquery
@toastr_js
@toastr_render
</html>
