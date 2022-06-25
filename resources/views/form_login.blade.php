@extends('layouts.mainlayout')


@section('content')
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Login</span></h2>

    </div>


    <div class="container p-2" style=" max-width:450px">

        @if(session()->has('loginError'))
        <div class="errorLoginMessage">{{session('loginError')}}</div>
        @endif

        <form action="/login" method="post">
            @csrf
            <div class="row">

                <div class="col-md-12 mb-3">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="example@email.com" value="{{old('email')}}">
                    @error('email') <div class="errormsg">{{$message}}</div> @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" placeholder="enter password" name="password" required>

                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                </div>

            </div>

        </form>

    </div>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif



    @endsection