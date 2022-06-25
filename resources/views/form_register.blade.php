@extends('layouts.mainlayout')


@section('content')
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Registration</span></h2>

    </div>


    <div class="container p-2" style=" max-width:450px">

        <form action="/register_do" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>First Name</label>
                    <input class="form-control" type="text" placeholder="enter first name" name="first_name" required value="{{old('first_name')}}">
                    @error('first_name') <div class="errormsg">{{$message}}</div> @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label>Middle Name</label>
                    <input class="form-control" type="text" placeholder="enter middle name" name="middle_name" required value="{{old('middle_name')}}">
                    @error('middle_name') <div class="errormsg">{{$message}}</div> @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label>Last name</label>
                    <input class="form-control" type="text" placeholder="enter last name" name="last_name" required value="{{old('last_name')}}">
                    @error('last_name') <div class="errormsg">{{$message}}</div> @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label>Phone Number</label>
                    <input class="form-control" type="text" placeholder="enter phone number" name="phone" required value="{{old('phone')}}">
                    @error('phone') <div class="errormsg">{{$message}}</div> @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="example@email.com" value="{{old('email')}}">
                    @error('email') <div class="errormsg">{{$message}}</div> @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" placeholder="enter password" name="password" required>
                    @error('password') <div class="errormsg">{{$message}}</div> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
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