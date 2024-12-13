<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create New Category</h1>
        <form action="{{ route('store') }}" method="post">
            @csrf
            <!-- Name Field -->
            <div class="row mb-3">
                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputname" name="inputname" placeholder="Enter menu name" name="category_name">
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