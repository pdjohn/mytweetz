<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Tweetz</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">My Tweetz</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <form class="card" action="{{route('post.tweet')}}" method="POST" enctype="multipart/form-data">

            {{csrf_field()}}

            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif

                <div class="form-group">
                    <label>Tweet Text</label>
                    <input type="text" name="tweet" class="form-control">
                </div>
                <div class="form-group">
                    <label>Upload Images</label>
                    <input type="file" name="images[]" multiple class="form-control">
                </div>
                <div class="form-group">
                    <button class=" btn btn-success">Create Tweet</button>
                </div>
        </form>

        @if(!empty($data))
            @foreach($data as $key=> $tweet)
                <div class="card">
                    <h3>{{$tweet['text']}}
                        <i class="fa fa-heart"></i> {{$tweet['favorite_count']}}
                        <i class="fa fa-repeat"></i> {{$tweet['retweet_count']}}
                    </h3>
                    @if(!empty($tweet['extended_entities']['media']))

                        @foreach($tweet['extended_entities']['media'] as $i)

                            <img src="{{$i['media_url_https']}}" style="width: 100px">

                        @endforeach
                    @endif

                </div>
            @endforeach


        @else
            <p>No Tweets Found...</p>
        @endif
    </div>

</body>
</html>