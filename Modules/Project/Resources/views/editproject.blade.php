<html>
<head>
    <title> Project : {{$project->name}}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


</head>
<body>

<div class="col-md-9 form-group">
    <form class="form-inline" method="post" action="/Projectmanage/project/updateproject" >
        <table>
            <tr>
                <td>
                    Status :
                    <select name="status" class="form-control" required>
                        <option value="">None</option>
                        <option value="0">Open</option>
                        <option value="1">Close</option>
                        <option value="2">Canceled</option>
                    </select>
                </td>
                <td>
                    Name :
                    <input type="text" name="name" value="{{$project->name}}" placeholder="Project Name" class="form-control">
                </td>
            </tr>
        </table>

        <br>



        <br>

        Description :
        <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Your Project Description">{{$project->description}}</textarea>
        <br><hr>
        Test URL :
        <input class="form-control " type="url" name="test" value="{{$project->url}}">
        <br><hr>
       Add new Tag :
        <input  class="form-control" type="text" name="tag" placeholder="for example : tag,project,..."><br>
       Tags : <table class="table-bordered table">
            <tr>
                @foreach($project->tag as $tag)
                <td>

                   {{$tag->name}} <font size="1"> <a href="/Projectmanage/project/tag/{{$tag->id}}/edit/delete">Delete</a></font>

                </td>
                @endforeach
            </tr>
        </table>

        <br><hr>
        Start Date :
        <input  name="start" class="form-control" type="date" placeholder="Start Date" value="{{$project->start_date}}">
        End Date :
        <input name="end" class="form-control " TYPE="date" placeholder="End Date" value="{{$project->start_date}}">
        <br><hr>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="project_id" value="{{$project->id}}">
        Users:
        <table class="table-bordered table">
            <tr>

                @foreach($project->user as $user)
                    <td>
                        {{$user->name}}
                        <font size="1"> <a href="/Projectmanage/project/{{$project->id}}/user/{{$user->id}}/edit/delete">Delete</a></font>
                    </td>
                @endforeach

            </tr>
        </table>
        <input type="submit"  value="Update">



    </form>
</div>
</body>
</html>