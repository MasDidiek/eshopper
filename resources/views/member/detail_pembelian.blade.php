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

                                <td width="400"><strong class="text-primary">20 Juni 2022</strong></td>
                                <td width="500"><strong class="text-info">INV 20255/02365603230</strong></td>
                                <td>Credit Card</td>

                            </tr>

                            <tr height="100">

                                <td>
                                    <strong class="text-info">Didiek Agus Kurniawan</strong>
                                    <strong>Home</strong><br>

                                    Jl. Sungai landak blok A
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
                                    <strong>{{ $itemBelanja->harga_satuan }}</strong>
                                </div>
                                <div class="col-md-2">
                                    <strong>{{ $itemBelanja->harga_satuan }}</strong>
                                </div>
                                <div class="col-md-2">
                                    <strong>{{ $itemBelanja->subtotal }}</strong>
                                </div>

                            </div>




                            @endforeach

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