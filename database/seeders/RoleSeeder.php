<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrator']);
        $role2 = Role::create(['name' => 'Associate']);

        Permission::create(['name' => 'admin.dashboard', 'description' => 'Administration Dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.products.index', 'description' => 'List of Products'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.create', 'description' => 'Create Product'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.edit', 'description' => 'Edit Product'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.destroy', 'description' => 'Delete Product'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.investments.index', 'description' => 'List of Investments'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.investments.create', 'description' => 'Create Investment'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.investments.show', 'description' => 'Show Investment'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.investments.edit', 'description' => 'Edit Investment'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.investments.destroy', 'description' => 'Delete Investment'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.investmentarchives.index', 'description' => 'List of Investment Archives'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.investmentarchives.show', 'description' => 'Show Investment Archive'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.interests.index', 'description' => 'List of Interests'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.interests.show', 'description' => 'Show Interests'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.interests.generate', 'description' => 'Generate Interest'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.interests.approve', 'description' => 'Approve Interest'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.interests.rollback', 'description' => 'Rollback Interest'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.taxes.index', 'description' => 'List of Taxes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.taxes.create', 'description' => 'Create Tax'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.taxes.edit', 'description' => 'Edit Tax'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.taxes.destroy', 'description' => 'Delete Tax'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.withdrawals.index', 'description' => 'List of Withdrawals'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.withdrawals.create', 'description' => 'Create Withdrawal'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.withdrawals.edit', 'description' => 'Edit Withdrawal'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.withdrawals.destroy', 'description' => 'Delete Withdrawal'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.index', 'description' => 'List of Users'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Create User'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Edit User'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy', 'description' => 'Delete User'])->syncRoles([$role1]);
    }
}
