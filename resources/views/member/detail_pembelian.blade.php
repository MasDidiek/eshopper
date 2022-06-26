@extends('layouts.mainlayout')


@section('content')
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Detail Shopping</span></h2>

    </div>


    <div class="container p-2">


        <div class="card p-3 mb-2">
            <div class="card-content">
                <div class="row">
                    <div class="col-md-12">
                        <table width="100%">
                            <tr>

                                <td width="400"><strong class="text-primary">{{$headerCheckout->tanggal}}</strong></td>
                                <td width="500"><strong class="text-info">{{$headerCheckout->invoice_code}}</strong></td>
                                <td> {{$headerCheckout->payment_method}}</td>

                            </tr>

                            <tr height="100">

                                <td>
                                    <strong class="text-info">Didiek Agus Kurniawan</strong>
                                    <strong>{{$headerCheckout->title_location}}</strong><br>

                                    {{$headerCheckout->address}}
                                </td>
                            </tr>
                        </table>

                        <hr>

                        <div class="card-content">
                            <div class="row">
                                <div class="col-sm-2">#</div>
                                <div class="col-sm-4">Product Name</div>
                                <div class="col-sm-2">Price</div>
                                <div class="col-sm-2">Qty</div>
                                <div class="col-sm-2">Total</div>
                            </div>
                            <hr>

                            @foreach($checkoutItem as $itemBelanja)



                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="{{ $itemBelanja->product_image }}" width="50" height="50" class="img-responsive" /></div>
                                <div class="col-md-4">
                                    {{ $itemBelanja->product_name}}
                                </div>
                                <div class="col-md-2">
                                    <strong>Rp. {{ number_format($itemBelanja->harga_satuan) }}</strong>
                                </div>
                                <div class="col-md-2">
                                    <strong>{{ $itemBelanja->qty }}</strong>
                                </div>
                                <div class="col-md-2 text-right">
                                    <strong>Rp. {{number_format($itemBelanja->subtotal) }}</strong>
                                </div>

                            </div>



                            @endforeach
                            <div class="row pt-4">
                                <div class="col-md-10">Subtotal</div>
                                <div class="col-md-2 text-right">Rp. {{number_format($headerCheckout->total)}} </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-10">Shipping Charge</div>
                                <div class="col-md-2  text-right">Rp. {{number_format($headerCheckout->shipping_charge)}} </div>
                            </div>
                            <div class="row py-2" style="background-color: #EEE; font-weight:bold">
                                <div class="col-md-10">Total</div>
                                <div class="col-md-2 text-right">Rp. {{number_format($headerCheckout->grand_total)}} </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>





    </div>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif



    @endsection