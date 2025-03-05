<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>rekomendasi-kacamata-admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/content.css">
    <link rel="stylesheet" href="assets/css/global/scroll-senkatech.css">
    <link rel="stylesheet" href="assets/css/accordion.css">
    <link rel="stylesheet" href="assets/css/tab.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body>
    @include('dashboard.layouts.navbar')
    <div id="wrapper-L">
        @include('dashboard.layouts.sidebar')
        @yield('container')
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/toggle-password.js"></script>
</body>

</html>
