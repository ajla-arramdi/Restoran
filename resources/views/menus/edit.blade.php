<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Menu</h1>
        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Name Field -->
            <div class="row mb-3">
                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputname" name="name" value="{{ old('name', $menu->name) }}" placeholder="Enter menu name" required>
                </div>
            </div>

            <!-- Price Field -->
            <div class="row mb-3">
                <label for="inputprice" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputprice" name="price" value="{{ old('price', $menu->price) }}" placeholder="Enter price" required>
                </div>
            </div>

            <!-- Description Field -->
            <div class="row mb-3">
                <label for="inputdescription" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="inputdescription" name="description" placeholder="Enter description" required>{{ old('description', $menu->description) }}</textarea>
                </div>
            </div>

            <!-- Category Dropdown -->
            <div class="row mb-3">
                <label for="id_category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="id_category" id="id_category" class="form-select" required>
                        <option value="" disabled selected>-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $menu->id_category == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Image -->
            <div class="mt-4">
                <label for="image" class="block text-sm font-medium text-white">Image</label>
                <input type="file" name="foto" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-white">
                @if($menu->foto)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $menu->foto) }}" alt="Current Image" class="w-32 h-32 object-cover">
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> 
</x-app-layout>
