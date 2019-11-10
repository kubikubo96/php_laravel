
<form action="{{ route('postForm') }}" method="post">
    {{--
       @csrf : phải có thì mới submit thành công
    --}}
    @csrf
    <input type="text" name="HoTen">
    <input type="submit">
</form>

