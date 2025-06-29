<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="/assets/img/pemmz-icon.png" rel="shortcut icon">
    <title>Rekomendasi_Laptop</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/content.css">
    <link rel="stylesheet" href="assets/css/global/scroll-senkatech.css">
    <link rel="stylesheet" href="assets/css/accordion.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="d-flex align-items-start align-content-center m-auto senkatech-login-container senkatech-container">
        <div
            class="shadow-sm justify-content-center align-items-center align-content-center align-self-center senkatech-login-form-container">
            <div class="align-items-center image-holder"
                style="background: url(&quot;assets/img/login-bg.jpg&quot;) center / cover no-repeat;"></div>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group text-center">
                    <h4 class="login-title">LOGIN</h4>
                    <p class="paragraph-login" style="transform: scale(1);">Administrator</p>
                </div>
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-style form-control shadow-none"
                        placeholder="Email" autofocus required value="{{ old('email') }}">
                    <i class="input-icon uil uil-at"></i>
                </div>
                <div class="form-group mt-2">
                    <input type="password" name="password" id="password"
                        class="form-style form-control shadow-none password" placeholder="Password">
                    <span><i class="fa fa-eye-slash field-icon toggle-password" toggle="#password"></i></span>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-block btn-sm btn-login">Login</button>
                </div>
            </form>

        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/toggle-password.js"></script>
</body>

</html>
