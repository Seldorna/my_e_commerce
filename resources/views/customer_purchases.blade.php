@extends('layout.mainpage')
@section('content')

<h1>My Purchases</h1>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($purchases as $purchase)
        <tr>
            <td>{{ $purchase->product->name }}</td>
            <td>{{ $purchase->quantity }}</td>
            <td>{{ ucfirst($purchase->status) }}</td>
            <td>{{ $purchase->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection