<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- link to css --}}
    <link rel="stylesheet" href="{{asset('assets/css/Login.css')}}">

    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            @csrf
            <h1>Login</h1>


            {{-- create error messages if email or password are wrong --}}
            @if (session()->has('error'))
    
            <div class="error" role="alert">
                {{ session('error') }}
            </div>
    
            @endif

            {{-- Input Email --}}
            <div class="input-box">
                <input type="email" name="email" placeholder="email" required>
            </div>

            {{-- Input Password --}}
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
            </div>

            {{-- Forgot Password --}}
            <div class="forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="/change_password">Forgot Password?</a>
            </div>

            {{-- Submit Button --}}
            <button name="submit" type="submit" class="btn">Login</button>

            {{-- Link To Register --}}
            <div class="register-link">
                <p>Don't have an account? <a href="/register">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>