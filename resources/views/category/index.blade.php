<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create and Manage Categories</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>

    <body>
    <div class="container my-4">
            <!-- Button to Create New Category -->
            <div class="text-end mb-3">
                <a href="{{ route('create') }}" class="btn btn-primary">Create Category</a>
            </div>

            

            <!-- Category List Section -->
            <h2 class="mb-4">Category List</h2>
            
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <!-- Delete Form -->
                                <form action="{{ route('category.delete', $category->id) }}" method="DELETE" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</x-app-layout>
