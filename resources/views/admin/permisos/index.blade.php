@extends('layouts._card')

@section('style')

@endsection

@section('title')
    Permisos
@endsection

@section('body')
    @include('admin.permisos._list')
@endsection

@section('footer')
    <a href="">regresar</a>
@endsection
