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
        .btn-login {
            background-color: skyblue;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
        }

        .btn-login:hover {
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


        .succesmsg {
            font-size: 16px;
            color: darkgreen;
            margin-left: 6px;
            background-color: #e8ffe9;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>



    <form class="modal-content" action="/login" method="post">

        <div class="container">

            <center>
                <div class="succesmsg"><strong> Registrasi berhasil!</strong> &nbsp; <Br> Terima kasih sudah melakukan registrasi, silahkan melakukan login


                </div>


                <br><br> <br> <a href="/login" class="btn-login">Login</a> <br><br> <br>

            </center>




        </div>

    </form>


</body>

</html>