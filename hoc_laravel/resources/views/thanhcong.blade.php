{{--Auth::check() : kiểm tra xem người dùng đã đăng nhập chưa--}}
@if(Auth::check())
    <h1>Đăng nhập Thành công</h1>
    @if(isset($user))
        {{"Tên : ".$user->name}}<br>
        {{"Email : ". $user->email}}<br>
        <a href="{{url('logout')}}">logout</a>
    @endif
@else
    <h1>Bạn chưa đăng nhập</h1>
@endif
