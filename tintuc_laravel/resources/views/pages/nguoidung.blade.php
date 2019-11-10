@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin tài khoản</div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="nguoidung" method="post">
                            @csrf
                            <div>
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{$nguoidung->name}}" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$nguoidung->email}}" readonly aria-describedby="basic-addon1"
                                >
                            </div>
                            <br>
                            <div>
                                <input type="checkbox" id="changePassword" class="" name="changePassword">
                                <label>Nhập mật khẩu</label>
                                <input type="password" disabled class="form-control password" name="password" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" disabled class="form-control passwordAgain" name="passwordAgain" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Sửa
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                    $(".passwordAgain").removeAttr('disabled');
                }else{
                    $(".password").attr('disabled','');
                    $(".passwordAgain").attr('disabled','');
                }
            })
        })
    </script>
@endsection
