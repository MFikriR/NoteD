<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhNBdEQclaDpdc14GSFbviCnwIFwGODtRrOzlJgqJ-B8gS5QSaNvklHQzdGDdNzfRvt1zQ7DzhBWWIM3Q7NFdR3mp8b8La2k6GzogKU8mS7CUo0jV8Spzvmt_w8kHstTUOfu2x6xWC5JQgk/s1600/Slider-2-Menara_Pandang-BanjarmasinTourism.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }


        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        /* Input Styles */
        .form-control {
            padding: 10px;
            border: 1px solid orange;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(102, 175, 233, 0.6); /* Inner and outer shadow */
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }

        /* Button Styles */
        .btn-primary {
            background-color: #4CAF50;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-success {
            background-color: #007BFF;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container p-3">
        <h1 class="text-center">Registrasi Pengguna Baru</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="form">
                    <form method="post" action="{{ route('register.store') }}">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nama">
                            <label for="name">Nama</label>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            <label for="email">Email</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>