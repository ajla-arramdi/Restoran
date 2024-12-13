<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">New Category</h1>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('POST')
            <!-- Name Field -->
            <div class="mb-3 row">
    <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control"id="category_name" name="category_name" value="{{ $category->category_name }}" placeholder="Enter category name" required/>
    </div>
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
