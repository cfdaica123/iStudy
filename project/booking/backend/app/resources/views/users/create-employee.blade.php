<!-- Form cho việc tạo mới Employee -->
<form method="post" action="{{ route('users.store.employee') }}">
    @csrf
    <!-- Các trường input cho Employee -->
    <button type="submit">Save Employee</button>
</form>
