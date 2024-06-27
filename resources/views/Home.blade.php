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
    <!-- search bar  -->
     <form action="{{url('communities/{id}')}}" method="post">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" name = "search" placeholder="Search Community here..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </form>
    </div>
  </div>
</nav>

  @include('components/Navbar')
  <form action="{{url('create_community/{user_id}')}}">
        <button>Create Community</button>
  </form>
      <a href="{{url('/profile/{user_id}')}}">
      </a>
</body>
</html>