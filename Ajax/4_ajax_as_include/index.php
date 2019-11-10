<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script language="javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>

        $(document).ready(function(){
            $("#result").load("result.php");
        });

    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background-color:red;">header</div>
        <div class="col-md-12" style="background-color: aqua"><div id="result">
                Nội dung ajax sẽ được load ở đây
            </div></div>
        <div class="col-md-12" style="background-color: crimson">footer</div>
    </div>
</div>
<br/>
</body>
</html>