<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($menus->isEmpty())
            <div class="alert alert-info">No menus available. Please create a new menu.</div>
        @else
            <div class="row">
                @foreach ($menus as $menu)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            @if ($menu->foto)
                                <img src="{{ asset('storage/' . $menu->foto) }}" class="card-img-top" alt="{{ $menu->name }}">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->name }}</h5>
                                <p class="card-text">{{ $menu->description }}</p>
                                <p class="card-text"><strong>Price:</strong> ${{ $menu->price }}</p>
                                <p class="card-text"><strong>Category:</strong> {{ $menu->category->category_name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</x-app-layout>
