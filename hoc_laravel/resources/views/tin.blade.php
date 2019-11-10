<style>
    .pagination li{
        list-style: none;
        float: left;
        margin-left: 5px;
    }
</style>

@foreach($tin as $value)
    {{$value->id}}
    {{$value->tieude}}
    {{$value->noidung}}<br>
@endforeach

{{--{!! $tin->links() !!}--}}
{!! $tin->appends(['abc'=>'123'])->links() !!}
