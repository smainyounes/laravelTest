@extends('client.layout.app')

@section('title')
    Home page
@endsection

@section('content')
    <h1 class="text-center">welcome {{ ucfirst($name) }}</h1>
@endsection