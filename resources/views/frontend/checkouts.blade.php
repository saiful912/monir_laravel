@extends('frontend.layouts.master')
@section('main')
    <div class="container">
      <div class="row">
          <div class="col-md-3">
              <div class="card card-body mt-5">
                  <h4 class="text-center font-weight-bold text-secondary">Carts added product</h4>
                  <hr>
                  @php
                    $total_price= 0;
                    @endphp
                  @foreach((new App\Models\Cart)->totalItems() as $cart)

                    <p>
                        {{$cart->product->title}} -
                        <strong>{{$cart->product->price}} Taka</strong>
                        -{{$cart->product_quantity}} item
                    </p>

                      @php
                      $total_price += $cart->product->price * $cart->product_quantity;
                      @endphp
                  @endforeach

                  <h5 class="font-weight-bold text-secondary border-bottom">Total Price : {{number_format($total_price,2)}} Tk</h5>
                  <h5 class="font-weight-bold text-secondary mt-2 border-bottom">Total price with shipping cost : {{number_format($total_price + App\Models\Setting::first()->shipping_cost,2)}} Taka</h5>
                  <p>
                      <a href="{{route('carts')}}">Change to cart item</a>
                  </p>
              </div>
          </div>

          <div class="col-md-9">
              <div class="card card-body mt-5">
                  <h5 class="text-danger font-weight-bold text-center">Order Products</h5>
                  <form method="POST" action="{{ route('user.profile.update') }}">
                      @csrf

                      <div class="form-group row mt-2">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text"
                                     class="form-control @error('name') is-invalid @enderror" name="name"
                                     value="{{Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : ''}}" required autocomplete="name" autofocus>

                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                          </div>
                      </div>


                      <div class="form-group row">
                          <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                          <div class="col-md-6">
                              <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror"
                                     name="phone_no" value="{{Auth::check() ? Auth::user()->phone_no : ''}}" autocomplete="phone_no" autofocus>

                              @error('phone_no')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                          </div>
                      </div>


                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                     name="email" value="{{Auth::check() ? Auth::user()->email : ''}}" autocomplete="email">

                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="shipping_address"
                                 class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address (optional)') }}</label>

                          <div class="col-md-6">
                        <textarea id="shipping_address"
                                  class="form-control @error('phone_no') is-invalid @enderror " rows="4" name="street_address"
                                  autocomplete="shipping_address" autofocus>
                        {{Auth::check() ? Auth::user()->shipping_address : ''}}
                        </textarea>

                              @error('shipping_address')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="payment_method" class="col-md-4 col-form-label text-md-right">Select a payment method</label>
                          <div class="col-md-6">
                              <select name="payment_method_id" class="form-control" required>
                                  <option value="">Select a payment method please</option>
                                  @foreach($payments as $payment)
                                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                                      @endforeach
                              </select>
                          </div>
                      </div>


                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary form-control">
                                  {{ __('Order Now') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
    @stop