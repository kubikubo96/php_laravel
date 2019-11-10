<form action="{{route('postFile')}}" method="post" enctype="multipart/form-data">
    {{--
       @csrf : phải có thì mới submit thành công
    --}}
    @csrf
    <input type="file" name="myFile"/>
    <input type="submit"/>
</form>
