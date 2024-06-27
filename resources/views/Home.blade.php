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
  <form action="/addcommunity">
        <button>Add Community</button>
  </form>
  <!-- change to user id later -->
      <a href="{{url('/profile/{user_id}')}}">
      </a>
</body>
</html>