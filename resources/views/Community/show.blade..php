<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Welcome.css') }}">
    <title>Community Details</title>
</head>
<body>
    @include('components/Navbar')

    <div>
        <h1>{{ $community->community_name }}</h1>
        <p>Category: {{ $community->category }}</p>
        <p>Members: {{ $community->members }}</p>
        <p>Description: {{ $community->description }}</p>
        <p>City: {{ $community->city }}</p>
        <p>Date Created: {{ $community->date_created }}</p>
    </div>
</body>
</html>
