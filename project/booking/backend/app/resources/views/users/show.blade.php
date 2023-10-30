<!-- resources/views/users/show.blade.php -->

<h1>Chi Tiết Người Dùng</h1>
<p><strong>Email:</strong> {{ $userWithEmployee->email }}</p>

@if($userWithEmployee->employee)
    <h2>Thông Tin Nhân Viên</h2>
    <p><strong>Họ và Tên:</strong> {{ $userWithEmployee->employee->full_name ?? 'N/A' }}</p>
    <!-- Thêm các thông tin khác về nhân viên nếu cần -->
@endif

@if($userWithCustomer->customer)
    <h2>Thông Tin Khách Hàng</h2>
    <p><strong>Họ và Tên:</strong> {{ $userWithCustomer->customer->full_name ?? 'N/A' }}</p>
    <!-- Thêm các thông tin khác về khách hàng nếu cần -->
@endif

<a href="{{ route('users.index') }}">Quay Lại Danh Sách</a>
