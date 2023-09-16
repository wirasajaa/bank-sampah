<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Bank Sampah' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="height: 100vh">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-2 fw-bold text-center text-uppercase">
                            Login
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('authenticate') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}" name="email"
                                    class="form-control @error('email')is-invalid @enderror" id="email"
                                    aria-describedby="emailInfo">
                                @error('email')
                                    <div id="emailInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" aria-describedby="passInfo" name="password"
                                    class="form-control @error('password')is-invalid @enderror" id="pass">
                                @error('password')
                                    <div id="passInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex">
                                <button type="submit" class="btn-lg btn btn-success w-100">Login</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
