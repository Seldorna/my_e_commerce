@extends('layout.mainpage')
@section('content')

<h1>Admin Registration</h1>
<form method="POST" action="{{ route('store_admin') }}" enctype="multipart/form-data">
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
    <div class="form-row">
        <label for="role">Login as:</label>
        <select name="role" class="form-control">
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
        </select>
    </div>
<div class="form-row">
<button type="submit" class="button">Save</button>
</div>
</form>
@endsection
