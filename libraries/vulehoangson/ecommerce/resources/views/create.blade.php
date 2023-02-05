<?php
?>

@extends('ecommerce::index')

@if($errors->any())
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif

@section('content')
    <a>This is create content</a>
@endsection
