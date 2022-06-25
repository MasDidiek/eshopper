<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #FFF;
        }

        /* Full-width input fields */
        input[type=email],
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 10px 0 2px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 3px;
        }

        label {
            font-size: 14px;
        }

        /* Set a style for all buttons */
        button {
            background-color: #196cb5;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .container {
            padding: 10px 16px;
        }


        /* Modal Content/Box */
        .modal-content {
            background-color: #FFF;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #fefefe;
            width: 400px;
            /* Could be more or less, depending on screen size */
        }

        .is-invalid {
            border: 1px solid palevioletred !important;
            background-color: #fff7f7;
        }

        .errormsg {
            font-size: 12px;
            color: palevioletred;
            margin-left: 6px;
        }
    </style>
</head>

<body>



    <form class="modal-content" action="/register" method="post">

        <div class="container">

            <center>
                <h2> Registration Form</h2>
            </center>


            @csrf

            <input type="text" placeholder="nama depan" name="nama_depan" required @error('name') class="is-invalid" @enderror value="{{old('nama_depan')}}">
            @error('nama_depan') <div class="errormsg">{{$message}}</div> @enderror

            <input type="text" placeholder="nama tengah" name="nama_tengah" required @error('username') class="is-invalid" @enderror value="{{old('nama_tengah')}}">
            @error('nama_tengah') <div class="errormsg">{{$message}}</div> @enderror

            <input type="text" placeholder="nama tengah" name="nama_belakang" required @error('username') class="is-invalid" @enderror value="{{old('nama_belakang')}}">
            @error('nama_belakang') <div class="errormsg">{{$message}}</div> @enderror

            <input type="email" placeholder=" email" name="email" required @error('email') class="is-invalid" @enderror value="{{old('email')}}">
            @error('email') <div class="errormsg">{{$message}}</div> @enderror

            <input type="password" placeholder=" Password" name="password" required>
            @error('password') <div class="errormsg">{{$message}}</div> @enderror


            <button type="submit">Register</button>

            <br>
            <center>Already Registered? <a href="/login">Login</a></center>

        </div>

    </form>


</body>

</html>