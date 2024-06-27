<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Import css --}}
    <link rel="stylesheet" href="{{asset('assets/css/Welcome.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">   -->

    <title>Home</title>
</head>
<body>
  @include('components/Navbar')
  <form action="{{url('create_community/{user_id}')}}">
        <button>Create Community</button>
  </form>
      <a href="{{url('/profile/{user_id}')}}">
      </a>
  <form action="/profile/1">
        <button>Profile</button>
  </form>
  <form action="{{ route('events.index') }}">
        <button>Events</button>
  </form>
</body>
</html>