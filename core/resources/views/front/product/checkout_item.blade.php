@extends('front.layout')

@section('content')
<style>

</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<!--   hero area start   -->
<section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{convertUtf8($bs->checkout_title)}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($bs->checkout_title)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



    </div>
</section>
<!--====== PAGE TITLE PART ENDS ======-->
<!--   hero area end    -->

 <!--================Billing Details Area =================-->
 <section class="checkout-area">
    <form action="{{route('product.checkout_item.submit')}}" method="POST" id="payment">
        @csrf
        @if(Session::has('stock_error'))
        <p class="text-danger text-center my-3">{{Session::get('stock_error')}}</p>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="form billing-info">
                        <div class="shop-title-box">
                            <h3>{{__('Billing Address')}}</h3>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="field-label">{{__('Country')}} *</div>
                                    <div class="field-input">
                                        <input type="text" name="billing_country" value="{{$user->billing_country}}">
                                    </div>
                                    @error('billing_country')
                                        <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="field-label">{{__('First Name')}} *</div>
                                    <div class="field-input">
                                        <input type="text" name="billing_fname" value="{{$user->billing_fname}}">
                                    </div>
                                    @error('billing_fname')
                                        <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="field-label">{{__('Last Name')}} *</div>
                                    <div class="field-input">
                                        <input type="text" name="billing_lname" value="{{$user->billing_lname}}">
                                    </div>
                                    @error('billing_lname')
{{--                                        <p class="text-danger">{{convertUtf8($message)}}</p>--}}
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="field-label">{{__('Town / City')}} *</div>
                                    <div class="field-input">
                                        <select name="billing_city" id="billing_city">
                                            <option value="">Vui lòng chọn thị trấn/thành phố</option>
                                            @foreach($province as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('billing_city')
                                    <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="field-label">Quận / Huyện *</div>
                                    <div class="field-input">
                                        <select name="billing_district" id="billing_district">
                                            <option value="">Vui lòng chọn quận/huyện</option>
                                            @foreach($district as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('billing_district')
                                    <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="field-label">Xã / Phường *</div>
                                    <div class="field-input">
                                        <select name="billing_town" id="billing_town">
                                            <option value="">Vui lòng chọn xã/phường</option>
                                            @foreach($town as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('billing_town')
                                    <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="field-label">{{__('Address')}} *</div>
                                    <div class="field-input">
                                        <input type="text" name="billing_address" value="{{$user->billing_address}}">
                                    </div>
                                    @error('billing_address')
                                        <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="field-label">{{__('Contact Email')}} *</div>
                                    <div class="field-input">
                                        <input type="text" name="billing_email" value="{{$user->billing_email}}">
                                    </div>
                                    @error('billing_email')
                                    <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="field-label">{{__('Phone')}} *</div>
                                    <div class="field-input">
                                        <input type="text" name="billing_number" value="{{$user->billing_number}}">
                                    </div>
                                    @error('billing_number')
                                    <p class="text-danger">{{convertUtf8($message)}}</p>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="form shipping-info">
                        <div class="shop-title-box">
                            <h3>{{__('Shipping Address')}} (nếu có)</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-label">{{__('Country')}} *</div>
                                <div class="field-input">
                                    <input type="text" name="shpping_country" value="{{$user->shpping_country}}">
                                </div>
                                @error('shpping_country')
                                    <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">{{__('First Name')}} *</div>
                                <div class="field-input">
                                    <input type="text" name="shpping_fname" value="{{$user->shpping_fname}}">
                                </div>
                                @error('shpping_fname')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">{{__('Last Name')}} *</div>
                                <div class="field-input">
                                    <input type="text" name="shpping_lname" value="{{$user->shpping_lname}}">
                                </div>
                                @error('shpping_lname')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="field-label">{{__('Town / City')}} *</div>
                                <div class="field-input">
                                    <select name="shpping_city" id="shpping_city">
                                        <option value="">Vui lòng chọn thị trấn/thành phố</option>
                                        @foreach($province as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('shpping_city')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="field-label">Quận / Huyện *</div>
                                <div class="field-input">
                                    <select name="shpping_district" id="shpping_district">
                                        @foreach($district as $item)
                                            <option value="">Vui lòng chọn quận/huyện</option>
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('shpping_district')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="field-label">Xã phường *</div>
                                <div class="field-input">
                                    <select name="shpping_town" id="shpping_town">
                                        @foreach($town as $item)
                                            <option value="">Vui lòng chọn xã/phường</option>
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('shpping_town')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="field-label">{{__('Address')}} *</div>
                                <div class="field-input">
                                    <input type="text" name="shpping_address" value="{{$user->shpping_address}}">
                                </div>
                                @error('shpping_address')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="field-label">{{__('Contact Email')}} *</div>
                                <div class="field-input">
                                    <input type="text" name="shpping_email" value="{{$user->shpping_email}}">
                                </div>
                                @error('shpping_email')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">{{__('Phone')}} *</div>
                                <div class="field-input">
                                    <input type="text" name="shpping_number" value="{{$user->shpping_number}}">
                                </div>
                                @error('shpping_number')
                                <p class="text-danger">{{convertUtf8($message)}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($shippings->count() > 0)
                    <div class="col-12 mb-5">
                        <div class="table">
                            <div class="shop-title-box">
                                <h3>{{__('Shipping Methods')}}</h3>
                            </div>
                            <table class="cart-table shipping-method">
                                <thead class="cart-header">
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Method')}}</th>
                                    <th class="price">{{__('Cost')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($shippings)
                                    @foreach ($shippings as $key => $charge)
                                        <tr>
                                            <td>
                                                <input type="radio"
                                                       {{$key == 0 ? 'checked' : ''}} name="shipping_charge"
                                                       {{$cart == null ? 'disabled' : ''}} data="{{$charge->charge_city}}"
                                                       class="shipping-charge" value="{{$charge->id}}">
                                            </td>
                                            <td>
                                                <p class="mb-2"><strong>{{convertUtf8($charge->title)}}</strong></p>
                                                <p><small>{{convertUtf8($charge->text)}}</small></p>
                                            </td>
                                            <td>
                                                {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}
                                                <span>
                                                    {{number_format($charge->title == 'Giao hàng tận nhà' ? $feeShipCity : $charge->charge,0,',','.')}}
                                                </span>
                                                {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="table">
                        <div class="shop-title-box">
                            <h3>{{__('Order Summary')}}</h3>
                        </div>
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th class="product-column">{{__('Products')}}</th>
                                    <th>&nbsp;</th>
                                    <th>{{__('Quantity')}}</th>
                                    <th class="price">{{__('Total')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @if($cart)
                                @foreach ($cart as $key => $item)
                                <input type="hidden" name="product_id[]" value="{{$key}}" >
                                @php
                                    $total += $item['price'] * $item['qty'];
                                    $product = App\Models\Product::findOrFail($key);

                                @endphp
                                <tr>
                                    <td colspan="2" class="product-column">
                                        <div class="column-box">
                                            <div class="prod-thumb">
                                            <img src="{{asset('assets/front/img/product/featured/'.$item['photo'])}}" alt="">
                                            </div>
                                            <div class="product-title">
                                                <a target="_blank" href="{{route('front.product.details',[$product->slug,$product->id])}}"><h3 class="prod-title">{{convertUtf8($item['name'])}}</h3></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="qty">
                                        <input class="quantity-spinner" disabled type="text" value="{{$item['qty']}}" name="quantity">
                                    </td>
                                    <td class="price">
                                        {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}
                                        {{number_format($item['qty'] * $item['price'],0,',','.')}}
                                        {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="text-center">
                                <td colspan="4">{{__('Cart is empty')}}</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="cart-total">
                        <div class="shop-title-box">
                            <h3>{{__('Cart Totals')}}</h3>
                        </div>
                        <ul class="cart-total-table">
                            <li class="clearfix">
                                <span class="col col-title">{{__('Cart Subtotal')}}</span>
                                <span class="col">{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}} <span
                                        data="{{round($total,2)}}"
                                        class="subtotal">{{number_format($total,0,',','.')}}</span> {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">{{__('Shipping Charge')}}</span>
                                <span class="col">{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}
                                    <span
                                        data="{{$shippings->count() > 0 ? round($shippings[0]->charge,2) : 0}}"
                                        class="shipping">{{$shippings->count() > 0 ? number_format($shippings[0]->charge,0,',','.') : 0}}</span>
                                    {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                </span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">{{__('Order Total')}}</span>
                                <span class="col">{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}} <span
                                        data="{{$shippings->count() > 0 ? round($total + $shippings[0]->charge,2) : number_format($total,0,',','.') }}"
                                        class="grandTotal">{{$shippings->count() > 0 ? number_format($total + $shippings[0]->charge,0,',','.') : number_format($total,0,',','.') }}</span> {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</span>
                            </li>
                        </ul>

                        <div class="payment-options">
                            <h4 class="mb-4">{{__('Pay Via')}}</h4>

                            <div id="accordion" class="accordion_area">
                                {{-- paypal --}}
                                {{-- @if ($paypal->status == 1) --}}
                                    {{-- <div class="option-block">
                                        <div class="radio-block">

                                            <div class="checkbox" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <input name="method" type="radio" class="paypal-check" value="paypal">
                                                <a class="collapsed">
                                                    <span>{{__('Paypal')}}</span>
                                                </a> <br>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Cửa hàng sẽ gửi đến địa chỉ của bạn, bạn vui lòng điền đẩy đủ thông tin tài khoản paypal để thanh toán đơn hàng.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- @endif --}}

                                {{-- cod --}}
                                {{-- @if ($paypal->status == 1) --}}
                                    <div class="option-block">
                                        <div class="radio-block">
                                            <div class="checkbox" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <input name="method" type="radio" checked="checked" class="delivery-check" value="delivery">
                                                <a class="collapsed">
                                                <span>{{__('Thanh Toán Khi Nhận Hàng ')}}</span>
                                                </a> <br>
                                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Cửa hàng sẽ gửi đến địa chỉ của bạn, bạn vui lòng xem hàng rồi thanh toán tiền cho nhân viên giao hàng.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- @endif --}}

                                {{-- atm --}}
                                {{-- @if ($paypal->status == 1) --}}
                                    <div class="option-block">
                                        <div class="radio-block">
                                            <div class="checkbox" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <input name="method" type="radio" class="atm-check" value="atm">
                                                <a class="collapsed" >
                                                <span>{{__('Chuyển Khoản')}}</span>
                                                </a>

                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <b>HƯỚNG DẪN THANH TOÁN</b><br />

                                                        {{__('Method_1')}}<br/>

                                                        {{__('Method_1')}}<br/>
                                                        Chủ Tài Khoản : <b><i>{{__('Name_ATM')}}</i></b><br/>
                                                        Số tài khoản : <b><i>{{__('STK_ATM')}}</i></b><br/>
                                                        Địa chỉ: {{__('Address_ATM')}}<br/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- @endif --}}

                            </div>


                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="no_note" value="1">
                            <input type="hidden" name="lc" value="UK">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="ref_id" id="ref_id" value="">
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="currency_sign" value="$">


                            <div class="placeorder-button text-left mt-4">
                                <button {{$cart ? '' : 'disabled' }}  class="main-btn" id="Payment"  type="submit"><span class="btn-title">{{__('Pleace Order')}}</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!--================End Billing Details Area =================-->

<style type="text/css">
  .form-group .form-control{
    color: #000!important;
  }

  *:focus {
      outline: none;
  }

  .select2 {
      width: 100% !important;
  }
  .select2-container {
      width: 100% !important;
      outline: none;
  }

  .selection {
      width: 100%;
  }
  .selection .select2-selection {
      border: 1px solid #f0eef9;
      color: #848484;
      display: block;
      font-size: 16px;
      height: 48px;
      margin-bottom: 25px;
      padding: 0 15px;
      width: 100%;
      border-radius: 0;
      -webkit-transition: all 500ms ease;
      -o-transition: all 500ms ease;
      transition: all 500ms ease;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 48px;
  }

  .nice-select {
      border-radius: 0;
      width: 100%;
      display: none;
  }
</style>

@endsection

@section('script')
<script src="https://js.stripe.com/v2/"></script>
<script>
    "use strict";
    var paypalSubmit = '{{route("product.paypal.submit")}}';
    var stripeSubmit = '{{route("product.stripe.submit")}}';
</script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('assets/front/js/checkout.js')}}"></script>

<script>
    $(document).ready(function() {
        $('select[name="billing_city"]').select2();
        $('select[name="billing_district"]').select2();
        $('select[name="billing_town"]').select2();

        $('select[name="shpping_city"]').select2();
        $('select[name="shpping_district"]').select2();
        $('select[name="shpping_town"]').select2();

        $('select[name="billing_city"]').on('change',function() {
            let id = $(this).val();
            if (id == 1 || id == 79) {
                // HN or HCM
                {{--$('.shipping-method tbody tr:last-of-type td:last-of-type span').text({{env('FEE_SHIP_CITY', 20000)}});--}}
                $('.shipping-method tbody tr:last-of-type td:last-of-type span').text(`{{ number_format(env('FEE_SHIP_CITY', 20000),0,",",".") }}`);
                {{--$('.shipping-method tbody tr:last-of-type td:first-of-type input').data(`{{ number_format(env('FEE_SHIP_CITY', 20000),0,",",".") }}`);--}}
                $('.shipping-method tbody tr:last-of-type td:first-of-type input').attr("data", `{{ (env('FEE_SHIP_CITY', 20000)) }}`);
            } else {
                $('.shipping-method tbody tr:last-of-type td:last-of-type span').text(`{{ number_format(env('FEE_SHIP_DEFAULT', 35000),0,",",".") }}`);
                {{--$('.shipping-method tbody tr:last-of-type td:first-of-type input').data(`{{ number_format(env('FEE_SHIP_DEFAULT', 35000),0,",",".") }}`);--}}
                $('.shipping-method tbody tr:last-of-type td:first-of-type input').attr("data", `{{ (env('FEE_SHIP_DEFAULT', 35000)) }}`);
            }
            $.ajax({
                url: '{{ route("get.district") }}',
                type: "GET",
                data: {id},
                dataType: "json",
                success: function (data) {
                    $('select[name="billing_district"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="billing_district"]').append('<option value="' + value.id + '">' + value.name + '</option>');

                    });
                }
            });
        });

        $('select[name="billing_district"]').on('change',function() {
            let id = $(this).val();
            $.ajax({
                url: '{{ route("get.town") }}',
                type: "GET",
                data: {id},
                dataType: "json",
                success: function (data) {
                    $('select[name="billing_town"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="billing_town"]').append('<option value="' + value.id + '">' + value.name + '</option>');

                    });
                }
            });
        });

        $('select[name="shpping_city"]').on('change',function() {
            let id = $(this).val();
            $.ajax({
                url: '{{ route("get.district") }}',
                type: "GET",
                data: {id},
                dataType: "json",
                success: function (data) {
                    $('select[name="shpping_district"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="shpping_district"]').append('<option value="' + value.id + '">' + value.name + '</option>');

                    });
                }
            });
        });

        $('select[name="shpping_district"]').on('change',function() {
            let id = $(this).val();
            $.ajax({
                url: '{{ route("get.town") }}',
                type: "GET",
                data: {id},
                dataType: "json",
                success: function (data) {
                    $('select[name="shpping_town"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="shpping_town"]').append('<option value="' + value.id + '">' + value.name + '</option>');

                    });
                }
            });
        });
    });
</script>
@endsection
