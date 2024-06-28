<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap CSS diambil dari CDN untuk keperluan demo -->
</head>
<body>
    <div class="container mt-4">
        <h2>Community Search</h2>

        <form action="{{ route('communities.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Community" name="search" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @if ($communities->isEmpty())
            <div class="alert alert-warning mt-4" role="alert">
                No communities found.
            </div>
        @else
            <ul class="list-group">
                @foreach ($communities as $community)
                    <li class="list-group-item">{{ $community->community_name }}</li>
                @endforeach
            </ul>

            <nav aria-label="Page navigation">
                <ul class="pagination mt-4">
                    {{ $communities->links() }}
                </ul>
            </nav>
        @endif
    </div>
</body>
</html