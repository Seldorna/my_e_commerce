@extends('layout.mainpage')
@section('content')

<h1>User Registration</h1>
<form method="POST" action="{{ route('store_user')}}" enctype="multipart/form-data">
@csrf
<div class="form-row">
    <label for="name" >Name:</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name">
</div>
<div class="form-row">
    <label for="name" >Email:</label>
    <input type="text" name="email" class="form-control" placeholder="Enter Email">
</div>
<div class="form-row">
    <label for="password" >Password:</label>
    <input type="password" name="password" class="form-control">
</div>
<!-- <divc class="form-row

"></div> -->
<div class="form-row">
<button type="submit" class="button">Save</button>
</div>
</form>
@endsection
