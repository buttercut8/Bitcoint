@extends('Fontend.layouts.master')
@section('title','Dashboard')
@section('content')
@if(Session::has('confirm-success'))
    <p class="alert alert-success">{{Session::get('confirm-success')}}</p>
@endif
<div class="container">
    <div class="row">
        Dashborad
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
</div>
@endsection

@section('script')
@endsection
