@extends('layout.mainpage')
@section('content')

<h1>All Purchase Requests</h1>
<table>
    <thead>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($purchases as $purchase)
        <tr>
            <td>{{ $purchase->user->name }}</td>
            <td>{{ $purchase->product->name }}</td>
            <td>{{ $purchase->quantity }}</td>
            <td>{{ ucfirst($purchase->status) }}</td>
            <td>{{ $purchase->created_at->format('Y-m-d H:i') }}</td>
            <td>
                @if($purchase->status == 'pending')
                <form method="POST" action="{{ route('sell_product', $purchase->product->id) }}">
                    @csrf
                    <input type="hidden" name="quantity" value="{{ $purchase->quantity }}">
                    <button type="submit">Approve & Sell</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection