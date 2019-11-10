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
                    <div class="panel-heading">Đăng ký tài khoản</div>
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
                        <form action="dangky" method="post">
                            @csrf
                            <div>
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="name" placeholder="Họ tên" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1"
                                >
                            </div>
                            <br>
                            <div>
                                <label>Nhập mật khẩu</label>
                                <input type="password" class="form-control password" name="password" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control passwordAgain" name="passwordAgain" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Đăng ký
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
