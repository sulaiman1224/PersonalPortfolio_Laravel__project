

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <title>Admin Login</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap');

        body {
            background-color: #f5f5f5;
        }

        h1 {
            padding: 0 0 30px;
        }

        .form-container {
            font-family: 'Roboto', sans-serif;
            padding: 0 10px;
            max-width: 700px; /* Increased width */
            width: 100%;
            min-height: 450px;
            margin: 0 auto;
        }

        .form-container .form-horizontal {
            background: rgba(255, 255, 255, 0.99);
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            margin-top: 100px;
            min-height: 350px;
        }

        .form-container .title {
            color: #fff;
            background: linear-gradient(#00c6ff, #0072ff);
            font-size: 23px;
            font-weight: 500;
            text-align: center;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            padding: 15px 10px;
            margin: 0 -10px 30px -10px;
            position: relative;
        }

        .form-container .title:before,
        .form-container .title:after {
            content: '';
            background: linear-gradient(45deg, transparent 49%, #0a57b5 50%);
            width: 10px;
            height: 10px;
            position: absolute;
            left: 0;
            top: 100%;
        }

        .form-container .title:after {
            transform: rotateY(180deg);
            left: auto;
            right: 0;
        }

        .form-horizontal .form-group {
            background-color: rgba(255, 255, 255, 0.15);
            margin: 0 30px 15px;
            border: 1px solid #b5b5b5;
            border-radius: 20px;
        }

        .form-horizontal .input-icon {
            color: #b5b5b5;
            font-size: 20px;
            text-align: center;
            line-height: 35px;
            height: 35px;
            width: 30px;
            margin: 0 0 0 4px;
            vertical-align: top;
            border-right: 1px solid #b5b5b5;
            display: inline-block;
        }

        .form-horizontal .input-icon i {
            line-height: inherit;
        }

        .form-horizontal .form-control {
            color: #222;
            background-color: transparent;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 1px;
            width: calc(100% - 55px);
            height: 33px;
            padding: 3px 10px 0 10px;
            box-shadow: none;
            border: none;
            border-radius: 0;
            display: inline-block;
            transition: all 0.3s;
        }

        .form-horizontal .form-control:focus {
            box-shadow: none;
            border: none;
        }

        .form-horizontal .form-control::placeholder {
            color: #b5b5b5;
            font-size: 15px;
            font-weight: 400;
            text-transform: capitalize;
        }

        .form-horizontal .btn {
            color: rgba(255, 255, 255, 0.8);
            background: linear-gradient(#00c6ff, #0072ff);
            font-size: 15px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100px;
            padding: 10px 15px;
            margin: 0 0 20px 30px;
            border: none;
            border-radius: 20px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .form-horizontal .btn:hover,
        .form-horizontal .btn:focus {
            color: #fff;
            background-color: #D31128;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .form-horizontal .forgot-pass {
            font-size: 12px;
            text-align: right;
            width: calc(100% - 145px);
            margin: 0 30px 20px 0;
            vertical-align: middle;
            display: inline-block;
        }

        .form-horizontal .forgot-pass a {
            color: #999;
            transition: all 0.3s ease;
        }

        .form-horizontal .forgot-pass a:hover {
            color: #777;
            text-decoration: underline;
        }

        .form-horizontal .user-signup {
            color: #fff;
            background: linear-gradient(#00c6ff, #0072ff);
            text-align: center;
            padding: 10px;
            border-radius: 0 0 10px 10px;
            display: block;
        }

        .form-horizontal .user-signup a {
            color: #fff;
            transition: all 0.3s ease;
        }

        .form-horizontal .user-signup a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="demo form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-container">
                        <form class="form-horizontal" action="{{ Route('AdminLoginCheck') }}" method="POST">
                            @csrf
                            <h3 class="title">User Login</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input class="form-control" type="email" placeholder="Email Address" name="email">
                                <span class="FormAuthentication">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" placeholder="Password" name="password">
                                <span class="FormAuthentication">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <input type="submit" value="Login" class="btn signin" name="submit">
                            <span class="FormAuthentication">
                                @error('submit')
                                    {{ $message }}
                                @enderror
                            </span>
                            <span class="forgot-pass"><a href="#">Forgot Password?</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    @if ($errors->has('login'))
        swal("Error!", "{{ $errors->first('login') }}", "error");
    @endif

    var form = document.querySelector('form'); // Store a reference to the form
    form.addEventListener('submit', function(event) {
        var email = document.querySelector('input[name="email"]').value;
        var password = document.querySelector('input[name="password"]').value;

        if (email === "" || password === "") {
            event.preventDefault(); // Prevent submission
            swal("Error!", "Please fill in all fields.", "error");
        }
        // If valid, the form will be submitted naturally
    });
});

    </script>
</body>
</html>
