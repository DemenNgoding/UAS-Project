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
<!DOCTYPE html>
<html>
<head>
    <title>Community Search</title>
</head>
<body>
    <nav>
        <div>
            <form action="{{ url('community/search') }}" method="get" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search Community here..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div>
        @if(isset($community))
            <h2>Search Results:</h2>
            <ul>
                @foreach($community as $com)
                    <li>{{ $com->community_name }}</li>
                @endforeach
            </ul>

        @endif
    </div>
</body>
</html>


</div>
  @include('components/Navbar')
  <form action="/create_community">
        <button>Add Community</button>
  </form>
  <!-- change to user id later -->
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