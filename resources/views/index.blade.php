@extends('mester')

@section('meta')
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="keywords" content="HTNL, CSS, JS, Laravel">
   <meta name="author" content="Thanason wannasombatsiri">
   <title>Document</title>
@endsection

@section('content')
    <h1>Hollo, {{ $name }}</h1>
    <p>this is my body content.</p>

    <a href="{{url('/')}}">Home</a> <br>
    <a href="{{url('/posts')}}">Laravel 8 Demo</a>


     
    @for ($i = 0; $i < 10; $i++)
    <p>The vurrent value is {{$i}} </p>
    @endfor
@endsection
