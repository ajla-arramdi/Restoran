<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <!-- Button to Create New Menu -->
        <div class="text-end mb-3">
            <a href="{{ route('menus.create') }}" class="btn btn-primary">Create Menu</a>
        </div>

        <h2 class="mb-4">Menu List</h2>

        <!-- Table -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $index => $menu)
                <tr>
                    <!-- Index -->
                    <td>{{ $index + 1 }}</td>

                    <!-- Name -->
                    <td>{{ $menu->name }}</td>
                    <td>{{$menu->price }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->category ? $menu->category->category_name : 'No Category' }}</td>   
                    <td>
            @if($menu->foto)
            <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->name }}" class="img-thumbnail" style="max-width: 100px;">
            @else
            <span class="text-muted">No image</span>
            @endif
        </td>

                    <!-- Actions -->
                    <td>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('menus.delete', $menu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- If no data exists -->
        @if($menus->isEmpty())
        <div class="alert alert-warning text-center">No menus found.</div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap" ></script>
    </body>
</x-app-layout>
