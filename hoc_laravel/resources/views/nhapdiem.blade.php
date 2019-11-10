<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhập điểm</title>
</head>
<body>
<h1>Nhập điểm</h1>
<form action="{{route('diem')}}" method="get">
    {{--
       @csrf : phải có thì mới submit thành công
    --}}
    @csrf
    <input type="number" name="diem"/>
    <input type="submit" name="submit" value="Submit"/>

</form>
</body>
</html>
