<!-- categories/edit.blade.php -->

<h1>Edit Category</h1>

<!-- Form to edit an existing category, customize the form structure as needed -->
<form method="post" action="{{ route('categories.update', ['category' => $category->category_id]) }}">
    @csrf
    @method('put')

    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" value="{{ $category->name }}" required>

    <!-- Add other form fields for category editing if needed -->

    <button type="submit">Update</button>
</form>

<a href="{{ route('categories.index') }}">Back to Categories</a>
