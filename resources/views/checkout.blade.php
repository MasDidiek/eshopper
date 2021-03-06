@extends('layouts.mainlayout')


@section('content')
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Checkout</span></h2>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row px-xl-5 pb-3">
        <form action="/checkout" method="post">
            <div class="row px-xl-5">
                <div class="col-lg-8">

                    @csrf
                    <div class="col-lg-12">
                        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nama </label>
                                <input class="form-control" name="full_name" required type="text" value=" {{auth()->user()->first_name}} {{auth()->user()->middle_name}} {{auth()->user()->last_name}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" value="{{auth()->user()->email}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phone Number</label>
                                <input class="form-control" type="text" name="phone" value="{{auth()->user()->phone}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Title Shipping</label>
                                <input class="form-control" name="title_location" type="text" placeholder="home, office, apartement" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address </label>
                                <textarea name="address" id="address" class="form-control" id="address" required></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-info" onclick="getLocation()" style="margin-left: 15px;">Dapatkan Alamat</button>

                    <input id="latlng" type="hidden" value="-6.1045917,106.939519" />
                    <div id="map">map loading</div>



                    <input id="submit" type="button" value="Reverse Geocode" style="display: none;" />

                    <div id="result"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Products</h5>

                            @php $total = 0 @endphp

                            @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <div class="d-flex justify-content-between">
                                <p>{{ $details['name'] }} &nbsp; &nbsp; &nbsp; ( x {{ $details['quantity'] }} )</p>
                                <p>Rp. {{ number_format($details['price'] * $details['quantity']) }}</p>
                            </div>

                            @endforeach


                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">Rp. {{ number_format($total) }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">Rp. 15,000</h6>
                            </div>
                        </div>

                        @php
                        $grandTotal = $total+15000;
                        @endphp
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">Rp. {{number_format($grandTotal)}}</h5>
                            </div>
                        </div>


                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <input type="hidden" name="grand_total" value="<?php echo $grandTotal; ?>">
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="jns_pembayaran" value="creditcard" checked>
                                    <label class="custom-control-label" for="paypal">Credit Card</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="jns_pembayaran" value="virtualaccount">
                                    <label class="custom-control-label" for="directcheck">Virtual Account</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="jns_pembayaran" value="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- Products End -->




<!-- Vendor End -->

@endsection

@section('scripts')




<script>
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: {
                lat: -6.1045917,
                lng: 106.939519
            },
        });
        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        geocodeLatLng(geocoder, map, infowindow);

        document.getElementById("submit").addEventListener("click", () => {
            geocodeLatLng(geocoder, map, infowindow);
        });
    }



    function geocodeLatLng(geocoder, map, infowindow) {
        const input = document.getElementById("latlng").value;
        const latlngStr = input.split(",", 2);
        const latlng = {

            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };

        geocoder
            .geocode({
                location: latlng
            })
            .then((response) => {
                if (response.results[0]) {
                    map.setZoom(11);

                    const marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                    });

                    infowindow.setContent(response.results[0].formatted_address);
                    document.getElementById(
                        "address"
                    ).innerHTML = `${response.results[0].formatted_address}`;
                    infowindow.open(map, marker);
                } else {
                    window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
    }
</script>


<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);

        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        // x.innerHTML = "Latitude: " + position.coords.latitude +
        //     "<br>Longitude: " + position.coords.longitude;

        latitude = position.coords.latitude;
        longitude = position.coords.longitude;

        // geocodeLatLng(geocoder, map, infowindow, latitude, longitude);

        const name = document.getElementById('latlng');
        // setting the value
        name.value = latitude + "," + longitude;
        document.getElementById('submit').click();


        //geocodeLatLng(geocoder, map, infowindow);

    }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4ULw0TXRCvk5YaDkVBUdUwDZXLMs8opc&callback=initMap" type="text/javascript"></script>

@endsection