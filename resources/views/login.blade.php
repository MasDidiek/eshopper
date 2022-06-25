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

        .errorLoginMessage {
            border: 1px solid palevioletred !important;
            background-color: #fff7f7;
            color: firebrick;
            padding: 10px;
            font-size: 13px;
        }
    </style>
</head>

<body>



    <form class="modal-content" action="/login" method="post">

        <div class="container">

            <center>
                <h2> Login Form</h2>
            </center>


            @if(session()->has('loginError'))
            <div class="errorLoginMessage">{{session('loginError')}}</div>
            @endif


            @csrf
            <input type="email" placeholder="Enter email" name="email" required autofocus @error('email') class="is-invalid" @enderror value="{{old('email')}}">
            @error('email') <div class="errormsg">{{$message}}</div> @enderror

            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
            <center>
                Not Registered? <a href="/register">Register</a>
            </center>


        </div>

    </form>


</body>

</html>