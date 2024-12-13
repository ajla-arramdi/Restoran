<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create New Menu</h1>
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Name Field -->
        <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter menu name" required>
                </div>
            </div>

            <!-- Price Field -->
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Enter price" required>
                </div>
            </div>

            <!-- Description Field -->
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" placeholder="Enter description" required>{{ old('description') }}</textarea>
                </div>
            </div>

           <!-- Category Dropdown -->
<div class="row mb-3">
    <label for="id_category" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
        <select name="id_category" id="id_category" class="form-select" required>
            <option value="" disabled selected>-- Select Category --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('id_category') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

            <!-- File Upload -->
            <div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">Upload Image</label>
                <div class="col-sm-10">
                    <input class="form-control form-control-sm" id="foto" name="foto" type="file" accept="image/*">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</x-app-layout>