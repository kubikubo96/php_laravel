@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
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
                    <form action="admin/user/sua/{{$user->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input class="form-control" name="name" placeholder="Nhập tên người dùng"
                                   value="{{$user->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ email"
                                   value="{{$user->email}}" readonly/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePassword" id="changePassword">
                            <label for="changePassword">Change password</label>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control password" name="password" type="password"
                                   placeholder="Nhập mật khẩu" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại password</label>
                            <input class="form-control passwordAgain" name="passwordAgain" type="password"
                                   placeholder="Nhập lại mật khẩu" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Quyền người dùng</label>
                            <label class="radio-inline">
                                <input name="quyen" value="0"
                                       @if($user->quen == 0)
                                       {{"checked"}}
                                       @endif
                                       type="radio">Thường
                            </label>
                            <label class="radio-inline">
                                <input name="quyen"
                                       @if($user->quen == 1)
                                       {{"checked"}}
                                       @endif
                                       type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
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
