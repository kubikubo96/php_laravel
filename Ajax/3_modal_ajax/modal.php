<!DOCTYPE HTML>
<html>
<head>
    <title>Bootstrap Validation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script language="javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        .row{
            margin-bottom: 10px;
        }
    </style>
    <script>
        $(document).ready(function(){

            // Khi người dùng click Đăng ký
            $('#register-btn').click(function(){

                // Lấy dữ liệu
                var data = {
                    username    : $('#username').val(),
                    password    : $('#password').val(),
                    email       : $('#email').val(),
                    fullname    : $('#fullname').val()
                };

                // Gửi ajax
                $.ajax({
                    type : "post",
                    dataType : "JSON",
                    url : "register.php",
                    data : data,
                    success : function(result)
                    {
                        // // Có lỗi, tức là key error = 1
                        // if (result.hasOwnProperty('error') && result.error == '1'){
                        //     var html = '';

                        //     // Lặp qua các key và xử lý nối lỗi
                        //     $.each(result, function(key, item){
                        //         // Tránh key error ra vì nó là key thông báo trạng thái
                        //         if (key != 'error'){
                        //             html += '<li>'+item+'</li>';
                        //         }
                        //     });
                        //     $('.alert-danger').html(html).removeClass('hide');
                        //     $('.alert-success').addClass('hide');
                        // }
                        // else{ // Thành công
                        //     $('.alert-success').html('Đăng ký thành công!').removeClass('hide');
                        //     $('.alert-danger').addClass('hide');

                        //     // 4 giay sau sẽ tắt popup
                        //     setTimeout(function(){
                        //         $('#myModal').modal('hide');
                        //         // Ẩn thông báo lỗi
                        //         $('.alert-danger').addClass('hide');
                        //         $('.alert-success').addClass('hide');
                        //     }, 4000);
                        // }
                        $('#result').html(result);
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="container">

    <!-- Button -->
    <button class="btn" data-toggle="modal" data-target="#myModal">Popup</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ĐĂNG KÝ THÀNH VIÊN</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">Username</div>
                        <div class="col-md-7">
                            <input type="text" id="username" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Password</div>
                        <div class="col-md-7">
                            <input type="text" id="password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Email</div>
                        <div class="col-md-7">
                            <input type="text" id="email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Fullname</div>
                        <div class="col-md-7">
                            <input type="text" id="fullname" />
                        </div>
                    </div>
                </div>
                <div class="alert alert-danger hide">

                </div>
                <div class="alert alert-success hide">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="register-btn">Đăng ký</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

