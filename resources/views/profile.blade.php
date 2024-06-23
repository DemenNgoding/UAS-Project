<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Import css --}}
    <link rel="stylesheet" href="{{asset('assets/css/Welcome.css')}}">

    <title>Profile</title>
</head>
<body>
    @include('components/Navbar')

    <a class="lbtn" href="/logout"><button>logout</button></a>
</body>
</html>