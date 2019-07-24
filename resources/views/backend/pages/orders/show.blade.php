@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    View Order #PLE{{$order->id}}
                </div>
                <div class="card-body">
                    @include('backend.partials.message')
                   <h3 class="text-success">Ordered Information</h3>
                    <div class="row">
                        <div class="col-md-6 border-right">
                        <p><strong>Ordered Name : </strong>{{$order->name}}</p>
                        <p><strong>Ordered Phone : </strong>{{$order->phone_no}}</p>
                        <p><strong>Ordered Email : </strong>{{$order->email}}</p>
                        <p><strong>Ordered Address : </strong>{{$order->shipping_address}}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Ordered Payment Method : </strong>{{$order->payment->name}}</p>
                            <p><strong>Ordered Transaction Id : </strong>{{$order->transaction_id}}</p>
                        </div>
                    </div>
                    <hr>
                    <h3>Order Items</h3>
                    @if($order->carts->count() > 0)
                        <table class="table table-bordered table-striped table-hover table-info">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Product Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub total Price</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total_price= 0;
                            @endphp
                            @foreach($order->carts as $cart)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>
                                        <a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->title}}</a>
                                    </td>
                                    <td>

                                        <img src="{{asset('images/products/'. $cart->product->images->first()->image)}}" width="60px" alt="">

                                    </td>
                                    <td>
                                        <form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post">
                                            @csrf
                                            <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                                            <button type="submit" class="btn btn-success ml-2 mt-1">Update</button>
                                        </form>
                                    </td>
                                    <td>{{number_format($cart->product->price,2)}}</td>
                                    @php
                                        $total_price += $cart->product->price * $cart->product_quantity;
                                    @endphp
                                    <td>{{number_format($cart->product->price * $cart->product_quantity,2)}}</td>
                                    <td>
                                        <form class="form-inline" action="{{route('carts.delete',$cart->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="cart_id">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td>Total Amount : </td>
                                <td colspan="2">
                                    <strong>{{number_format($total_price,2)}} Taka</strong>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                        @endif
                    <hr>
                    <form class="d-inline-block" action="{{route('admin.order.paid',$order->id)}}" method="post">
                        @csrf
                        @if($order->is_paid)
                        <input type="submit" value="Cancel Order" class="btn btn-danger">
                            @else
                            <input type="submit" value="Paid Order" class="btn btn-success">
                            @endif
                    </form>
                    <form class="d-inline-block" action="{{route('admin.order.completed',$order->id)}}" method="post">
                        @csrf
                        @if($order->is_completed)
                        <input type="submit" value="Cancel Order" class="btn btn-warning">
                            @else
                            <input type="submit" value="Complete Order" class="btn btn-success">
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop