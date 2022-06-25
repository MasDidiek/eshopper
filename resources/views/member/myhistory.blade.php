@extends('layouts.mainlayout')


@section('content')
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">History Shopping</span></h2>

    </div>


    <div class="container p-2" style="max-width: 800px;">


        @foreach($myhistory as $belanja)
        <div class="card p-3 mb-2">
            <div class="card-content">
                <div class="row">
                    <div class="col-md-6"> <strong> {{ date('d F Y', strtotime($belanja->tanggal))}} </strong> &nbsp; &nbsp; - &nbsp; &nbsp;
                        <strong><a href="/detail_pembelian/{{$belanja->id}}">{{ $belanja->invoice_code }}</a></strong>
                    </div>
                    <div class="col-md-6 text-right">Total Harga <br> <strong>Rp.{{ number_format($belanja->grand_total) }}</strong>

                        <br> <br><a href="/detail_pembelian/{{$belanja->id}}">Lihat Detail Transaksi</a>
                    </div>

                </div>
            </div>
        </div>

        @endforeach




    </div>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif



    @endsection