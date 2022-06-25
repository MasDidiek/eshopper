<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/your-logo.png">
  <link rel="icon" type="image/png" href="../assets/img/your-logo.png">
  <title>Shopping Cart</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


  <style>
    body {
      margin: 0;
      padding: 0;
      color: #333;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
    }

    .grid-container {
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 50px 1fr 50px;

      grid-template-areas:
        'header'
        'main'
        'footer';
      height: 100vh;
    }

    .header {
      grid-area: header;
      background-color: whitesmoke;
    }

    .aside {
      grid-area: aside;
      background-color: darkblue;
    }

    .main {
      grid-area: main;
      background-color: #EEE;
    }

    .footer {
      grid-area: footer;
      background-color: whitesmoke;
    }

    /* flexing header and footer*/
    .header,
    .footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      color: darkblue;
      padding: 0 15px;
    }

    /* flexing aside */
    .aside {
      display: flex;
      flex-direction: column;
      height: 100%;
      width: 240px;
      position: fixed;
      overflow-y: auto;
      z-index: 2;
      transform: translateX(-245px);
    }

    .aside.active {
      transform: translateX(0);
    }

    .aside_list {
      padding: 0;
      margin-top: 85px;
      list-style-type: none;
    }

    .aside_list-item {
      padding: 20px 20px 20px 40px;
      color: #ddd;
    }

    .aside_list-item:hover {
      background-color: royalblue;
      cursor: pointer;
    }



    /* Layout for main content overview  and its cards*/
    .main_overview {

      flex-wrap: wrap;
      align-items: left;
      border-bottom: 1px solid lightgreen;
      background-color: #FFF;
      padding: 10px 20px;
      margin: 20px;
    }


    /* responsive layout */
    @media only screen and (min-width: 750px) {
      .grid-container {
        display: grid;
        grid-template-columns: 240px 1fr;
        grid-template-rows: 50px 1fr 50px;
        grid-template-areas:
          'aside header'
          'aside main'
          'aside footer';
        height: 100vh;
      }

      .aside {
        display: flex;
        flex-direction: column;
        position: relative;
        transform: translateX(0);
      }

      .main_cards {
        margin: 10px;
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-template-rows: 200px 300px;
        grid-template-areas:
          'card1 card2'
          'card1 card3';
        grid-gap: 10px;
      }
    }

    .menu-icon {
      position: fixed;
      display: flex;
      top: 2px;
      left: 8px;
      align-items: center;
      justify-content: center;
      z-index: 1;
      cursor: pointer;
      padding: 12px;
      color: black;
    }

    .header_search {
      margin-left: 24px;
    }

    .aside_close-icon {
      position: absolute;
      visibility: visible;
      top: 20px;
      right: 20px;
      cursor: pointer;
    }

    @media only screen and (min-width: 750px) {
      .aside_close-icon {
        display: none;
      }
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td,
    th {
      color: #333;
      border: 1px solid #DDD;
      padding: 5px;
    }

    th {
      padding: 10px;
      background-color: #EEE;
    }
  </style>
</head>

<body class="landing-page">
  <div class="grid-container">
    <div class="menu-icon">
      <strong> &#9776;</strong>
    </div>
    @include('layouts.navbars.navbar')


    @yield('content')


    <footer class="footer">
      <div class="footer_copyright">&copy;2020</div>
      <div class="footer_byline">Made with &hearts;</div>
    </footer>
  </div>




  @stack('js')
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    const menuIcon = document.querySelector('.menu-icon');
    const aside = document.querySelector('.aside');
    const asideClose = document.querySelector('.aside_close-icon');

    function toggle(el, className) {
      if (el.classList.contains(className)) {
        el.classList.remove(className);
      } else {
        el.classList.add(className);
      }
    }

    menuIcon.addEventListener('click', function() {
      toggle(aside, 'active');
    });

    asideClose.addEventListener('click', function() {
      toggle(aside, 'active');
    });
  </script>

</body>

</html>