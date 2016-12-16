<!DOCTYPE html>
<!--/
• ˚ •˛•˚ * 。 • ˚ ˚ ˛ ˚ ˛ •
• ˚Happy★* 。 • ˚ ˚ ˛ ˚ ˛ •
•。★Christmas★ 。* • ˚。
° 。 ° ˛˚˛ *__Π____*。*˚
˚ ˛ •˛•˚ */______/~＼。˚ ˚ ˛
˚˛ •˛• ˚ ｜ 田田 ｜門｜ ˚
(づ｡◕‿‿◕｡)づ
/-->
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" href=""/> --}}
    <title>Bitcoin University - @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    {{--  font-family: 'Roboto Condensed', sans-serif;--}}
    {{--  font-family: 'Open Sans', sans-serif;--}}
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/css/alert.css')}}">
    {{-- <link rel="stylesheet" href="{{URL::to('public/css/animation.css')}}"> --}}
    @yield('css')
    <link rel="stylesheet" href="{{URL::to('public/css/style.css')}}">
    <script type="text/javascript" src="{{URL::to('public/js/jquery.min.js')}}"></script>
  </head>
  <body>



      @yield('content')
      {{-- <script type="text/javascript" src="{{URL::to('public/js/vue.min.js')}}"></script> --}}
      <script type="text/javascript" src="{{URL::to('public/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{URL::to('public/js/alert.js')}}"></script>
      @yield('script')
      <script type="text/javascript" src="{{URL::to('public/js/functions.js')}}"></script>
  </body>
</html>
