<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Admin có tất cả các quyền
        $adminPermissions = range(1, 10);
        $this->insertRolePermissions(1, $adminPermissions);

        // Nhân viên đặt tour có các quyền liên quan đến quản lý tour
        $bookingStaffPermissions = [1, 2, 3, 4, 5, 6, 7];
        $this->insertRolePermissions(2, $bookingStaffPermissions);

        // Khách hàng có quyền đặt tour và xem thông tin đặt tour
        $customerPermissions = [5, 6, 7];
        $this->insertRolePermissions(3, $customerPermissions);

        // Content Manager có quyền quản lý nội dung
        $contentManagerPermissions = [1, 2, 3, 4];
        $this->insertRolePermissions(4, $contentManagerPermissions);

        // Người duyệt tin có quyền xem tour và xem đánh giá
        $moderatorPermissions = [4, 7];
        $this->insertRolePermissions(5, $moderatorPermissions);

        // Người quản lý hệ thống có quyền quản lý người dùng, roles và quyền hạn
        $systemAdminPermissions = [8, 9, 10];
        $this->insertRolePermissions(6, $systemAdminPermissions);
    }

    protected function insertRolePermissions($roleId, $permissions)
    {
        foreach ($permissions as $permission) {
            DB::table('role_permissions')->insert([
                'role_id' => $roleId,
                'permission_id' => $permission,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
