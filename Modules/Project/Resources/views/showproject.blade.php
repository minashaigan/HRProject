<html>
    <head>
        <title>Show Projects</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    </head>

    <body>
    @foreach($project as $projectt)
            <div class="col-sm-6 col-md-4 ">
                <div class="alert-success">
                    <h3><a href="/Projectmanage/project/show/{{$projectt->id}}">{{$projectt->name}}</a></h3>
                        Status : <font color="red">
                        @if($projectt->status_id ==0)
                            Open
                        @elseif($projectt->status_id==1)
                            Close
                        @else
                            Canceled
                        @endif
                        </font>

                        <div class="list-group-item-text">

                            <p>Description :  {{$projectt->description}}</p>
                            <p><a href="{{$projectt->url}}">Test link</a> </p>
                            <p>Users :
                                @foreach($projectt->user as $user)
                                 {{$user->name}} -
                                @endforeach
                            </p>
                        </div>
                </div>
            </div>
    @endforeach
    <p>
    {{$project->links()}}
    </p>
    </body>
</html>