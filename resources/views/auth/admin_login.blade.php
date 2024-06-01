<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registration Form of BASIS Standing Committee and Forums</title>
    <link rel="icon" type="image/x-icon" href="https://basis.org.bd/public/images/favicon.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        a {
            text-decoration: none;
        }
        .header-content{
            width: auto;
        }
        .container {
            width: 93%;
            margin: 12px auto !important;
        }
        .accordion-button{
            cursor: pointer;
        }


        @media screen and (min-width:767px) {
            .container {
                width: 30%;
                margin: auto;
                margin-top: 100px !important;
            }
        }

        input:focus,
        textarea:focus,
        select:focus {
            box-shadow: 0px 0px 2px 3px rgba(0, 128, 0, 0.4) !important;
        }

        select option:hover {
            background-color: rgba(0, 128, 0, 0.4) !important;
        }

        select option:hover {
            color: red !important;
        }

        button {
            padding: 0.4rem 2rem !important;
        }

        body {
           background-image: url('/images/form-bg.png'), linear-gradient(90deg, #fffbf9, #FFF4FF, #F0FCFF);
        }

        .form-header {
            background-image: url('/images/form-header-bg.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .fs-sm {
            font-size: 12px;
        }
    </style>
</head>

<body class="d-flex align-items-center">
    <div
        class="container bg-white border border-success-subtle shadow rounded-4 overflow-hidden">
        <div class="row py-3 py-xl-4 border border-bottom rounded-top-4"
            style="background-image: url('/images/form-header-bg.png'); background-position: center center; background-size:cover; background-repeat: no-repeat;">
            <div class="col-12">
                <h3 class="text-center">BASIS Standing Committee and Forums</h3>
                <h5 class="text-center mt-3">Admin Login pass</h5>
            </div>
        </div>
        <div class="row justify-content-center m-4">
            <div class="row">
                <div class="col-12 col-md-12">
                    <form class="user" method="POST" action="{{route('admin.login')}}">@csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email" autocomplete="email" autofocus=""
                                   aria-describedby="emailHelp" placeholder="Enter Email Address...">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            @if($msg = Session::get('error'))
                                <small class="text-danger">{{$msg}}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" autocomplete="current-password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                <label class="custom-control-label" for="remember">Remember
                                    Me</label>
                            </div>
                        </div>
                       <div class="d-grid mt-2">
                           <button type="submit" class="btn btn-primary">
                               Login
                           </button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
