<!-- Form cho việc tạo mới Customer -->
<form method="post" action="{{ route('users.store.customer') }}">
    @csrf
    <!-- Các trường input cho Customer -->
    <button type="submit">Save Customer</button>
</form>
