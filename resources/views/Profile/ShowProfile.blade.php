<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Import css --}}
    <!-- <link rel="stylesheet" href="{{asset('assets/css/welcome.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">

    <title>Profile</title>
</head>
<body>
    <center>
    @include('components/Navbar')
    <!-- Image still cannot be shown. Supposed to be default image when user doesnt upload their image yet -->
    <img src="{!! $user->image !!}" alt="Profile Picture" width=200px>
    <br><br>
    <!-- Default edit: user_id = 1. To be changed to /profile/{user_id}/edit -->
    <form action="/profile/1/edit" method="GET">
        <input type="submit" value="Edit">
    </form>
    <p><strong>Name:</strong> {{$user->name}}</p>
    <p><strong>Email:</strong> {{$user->email}}</p>
    <p><strong>Bio:</strong> {{$user->bio}}</p>
    <p><strong>City:</strong> {{$user->city}}</p>
    <p><strong>Birth Date:</strong> {{$user->birth_date}}</p>
    <p><strong>Gender:</strong> {{$user->gender}}</p>
    <a href="/logout"><button>logout</button></a>
    </center>
</body>
</html>

