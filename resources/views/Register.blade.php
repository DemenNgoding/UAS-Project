<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- link to css --}}
    <link rel="stylesheet" href="{{asset('assets/css/Register.css')}}">

    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form method="POST">

            @csrf
            <h1>Register</h1>

            {{-- create error messages if email are not valid --}}
            @if (session()->has('error'))
    
            <div class="error" role="alert">
                {{ session('error') }}
            </div>
    
            @endif

            {{-- Input Name --}}
            <div class="input-box">
                <input type="text" name="name" placeholder="name" value="{{Session::get('name')}}" required>
            </div>

            {{-- Input Email --}}
            <div class="input-box">
                <input type="email" name="email" placeholder="email" value="{{Session::get('email')}}" required>

                @error('email')
                <div class="error" role="alert" style="text-align: center">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Password --}}
            <div class="input-box">
                <input type="password" name="password" placeholder="password" value="{{Session::get('password')}}" required>

                @error('password')
                <div class="error" role="alert" style="text-align: center">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button name="submit" type="submit" class="btn">Register</button>

            {{-- Link To Register --}}
            <div class="register-link">
                <p>Already Register? <a href="/login">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>