<html>
<head>
    <title>Project</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


</head>
<body>

    <div class="col-md-9 form-group">
        <form class="form-inline" method="post" action="/Projectmanage/project" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Status :
                    <select name="status" class="form-control">
                        <option value="0">Open</option>
                        <option value="1">Close</option>
                        <option value="2">Canceled</option>
                    </select>
                </td>
                <td>
                    Name :
                    <input type="text" name="name" placeholder="Project Name" class="form-control">
                </td>
            </tr>
        </table>

            <br>



            <br>

            Description :
                    <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Your Project Description"></textarea>
            <br><hr>
            Test URL :
                    <input class="form-control " type="url" name="test">
            <br><hr>
            Tag :
                    <input  class="form-control" type="text" name="tag" placeholder="for example : tag,project,...">

            <br><hr>
            Start Date :
                    <input  name="start" class="form-control" type="date" placeholder="Start Date">
            End Date :
                    <input name="end" class="form-control " TYPE="date" placeholder="End Date">
            <br><hr>
            Attach File :
                    <input class="form-control file-system-storage-tree-item" type="file" name="file" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
            <br><hr>
                    Select Users:
                    <table class="table-bordered table">
                        <tr>

                            @foreach($user as $user)
                            <td><input multiple="multiple" type="checkbox" name="user_id[]" value="{{$user->id}}">{{$user->name}}</td>
                            @endforeach

                        </tr>
                    </table>
                    <input type="submit"  value="Add">


        </form>
    </div>
</body>
</html>