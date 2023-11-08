<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        label {
            color: #E5ECFF;
        }
    </style>
    <title>Ancol</title>
</head>
<body style="background-color: #3A467E;">
    <div class="d-flex">
        <div class="row mx-auto p-0 m-0">


            <div class="col-lg-6">
                <img style="background-color: #3A467E;border-radius: 10px; top: 35%;left: 25%;" class=" position-absolute  w-50 p-3 "
                    src="{{ url('assets/logo_ancol.png') }}" alt="">
            </div>


            <div class="col-lg-6 p-0 m-0">
                <div class="row p-0 m-0">
                    <div style="background-color: white" class="img">
                        <img src="{{ url('assets/foto_pantai_ancol.png') }}" class="img-fluid" alt="">
                        <img src="{{ url('assets/foto_ancol_1.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="card mb-3 position-absolute"
                            style="top: 25%;left: 25%;border-radius: 50px;border: 1px solid #FFF;background: rgba(247, 159, 184, 0.23);backdrop-filter: blur(5px);">
                            <div class="card-header">
                                <a href="{{ url('signup') }}" class="btn" style="color: #E5ECFF;">Sign Up</a>
                                <a href="#" class="btn active" style="color: #5A5C85#E5ECFF;">Sign in</a>
                            </div>
                            <div style="border-radius: 50px;background-color: rgba(58, 70, 126, 0.76);backdrop-filter: blur(5px);border: 2px solid #3A467E;"
                                class="card-body">
                                <form action="{{ route('check') }}" method="POST">
                                    @csrf
                                    <label for="">Email</label>
                                    <input class="form-control" value="{{ Session::get('email') }}" type="email"
                                        id="email" name="email" >
                                    <label for="">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" required>
                                    <button type="submit" class="btn btn-block mt-2 btn-sm"
                                        style="background-color: #E5ECFF;color: #3A467E;border-radius: 10px;font-size: 105x;font-style: normal;font-weight: 600;">Sign
                                        In</button>
                                    <div class="d-flex justify-content-center mt-2" style="font-size: 12px">
                                        <p class="mr-1" style="color: white">Dont have an account? </p>
                                        <a href="{{ url('signup') }}" style="color: black"> Sign up</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
