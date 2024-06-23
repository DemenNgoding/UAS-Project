<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="{{asset('assets/css/Welcome.css')}}">
  
    <title>Mundus</title>
  </head>
  
  <body>
    <!-- Nav bar -->
    <div class="BackgroundImage">
      <header>
        <img class ="Logo" src="{{ asset('assets/images/Logo.png') }}" alt="Mundus" style="height: 100px; width: 100px;" >
        <nav>
          <ul class="Nav_link">
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>

        <a class="lbtn" href="/login"><button>LOGIN</button></a>
      </header>

      <div>
        <h1 class="slogan"> ONE STOP SOLUTION TO SEARCH COMMUNITY </h1>
      </div>
    </div>
  </body>
</html>