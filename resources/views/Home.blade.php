<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Import css --}}
    <link rel="stylesheet" href="{{asset('assets/css/Welcome.css')}}">

    <title>Home</title>

</head>
<body>
  @include('components/Navbar')
  <form action="/addcommunity">
        <button><h3 href="AddCommunity.blade.php">Add Community</h3></button>
  </form>
  <form action="/profile/1">
        <button><h3 href="ShowProfile.blade.php">Profile</h3></button>
  </form>
</body>
</html>