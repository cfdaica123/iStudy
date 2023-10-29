<!-- categories/create.blade.php -->

<h1>Create Category</h1>

<!-- Form to create a new category, customize the form structure as needed -->
<form method="post" action="{{ route('categories.store') }}">
    @csrf
    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" required>

    <!-- Add other form fields for category creation if needed -->

    <button type="submit">Create</button>
</form>

<a href="{{ route('categories.index') }}">Back to Categories</a>
