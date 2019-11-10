
@extends('layouts.master')

@section('NoiDung')

    @if($khoahoc != "")
    {{$khoahoc}}
    @else
    {{"Không có khóa học"}}
    @endif

@endsection
