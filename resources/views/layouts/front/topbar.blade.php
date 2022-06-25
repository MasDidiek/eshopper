<div class="row bg-secondary py-2 px-xl-5">
    <div class="col-lg-6 d-none d-lg-block">
        <div class="d-inline-flex align-items-center">
            <a class="text-dark" href="">FAQs</a>
            <span class="text-muted px-2">|</span>
            <a class="text-dark" href="">Help</a>
            <span class="text-muted px-2">|</span>
            <a class="text-dark" href="">Support</a>
        </div>
    </div>

</div>

<div class="row align-items-center py-3 px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
        <a href="/home" class="text-decoration-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
    </div>
    <div class="col-lg-6 col-6 text-left">
        <form action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for products">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-3 col-6 text-right">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{ count((array) session('cart')) }}</span>

                <div class="dropdown-menu rounded-0 m-0" style="right: 0; ">



                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                        <p>Total: <span class="text-info">Rp. {{ number_format($total) }}</span></p>
                    </div>

                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)

                    <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ $details['image'] }}" style="width: 50px;" />
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['name'] }}
                                <span class="price text-info"> Rp.{{ number_format($details['price']) }}</span>
                                <span class="count"> X {{ $details['quantity'] }}</span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>

                </div>
            </a>

        </div>
        <!-- 
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
            <div class="dropdown-menu rounded-0 m-0">
                <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                <a href="checkout.html" class="dropdown-item">Checkout</a>
            </div>
        </div> -->
    </div>
</div>