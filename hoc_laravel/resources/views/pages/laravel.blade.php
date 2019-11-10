
@extends('layouts.master')

{{--
    bất cứ đoạn mã nào nằm trong @section('NoiDung')
    đều được nhúng sang master.blade.php có khai báo @yield('NoiDung')
--}}

@section('NoiDung')

    <h2>Laravel</h2>
<!--    --><?php //echo $khoahoc ?>
    {{$khoahoc}}
    {!! '<br>.khóa học là  :'. $khoahoc !!}
@endsection
