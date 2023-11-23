<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list databakalcalons']);
        Permission::create(['name' => 'view databakalcalons']);
        Permission::create(['name' => 'create databakalcalons']);
        Permission::create(['name' => 'update databakalcalons']);
        Permission::create(['name' => 'delete databakalcalons']);

        Permission::create(['name' => 'list datadapils']);
        Permission::create(['name' => 'view datadapils']);
        Permission::create(['name' => 'create datadapils']);
        Permission::create(['name' => 'update datadapils']);
        Permission::create(['name' => 'delete datadapils']);

        Permission::create(['name' => 'list datakategoripemilus']);
        Permission::create(['name' => 'view datakategoripemilus']);
        Permission::create(['name' => 'create datakategoripemilus']);
        Permission::create(['name' => 'update datakategoripemilus']);
        Permission::create(['name' => 'delete datakategoripemilus']);

        Permission::create(['name' => 'list datapartais']);
        Permission::create(['name' => 'view datapartais']);
        Permission::create(['name' => 'create datapartais']);
        Permission::create(['name' => 'update datapartais']);
        Permission::create(['name' => 'delete datapartais']);

        Permission::create(['name' => 'list alldatatps']);
        Permission::create(['name' => 'view alldatatps']);
        Permission::create(['name' => 'create alldatatps']);
        Permission::create(['name' => 'update alldatatps']);
        Permission::create(['name' => 'delete alldatatps']);

        Permission::create(['name' => 'list perolehansuaras']);
        Permission::create(['name' => 'view perolehansuaras']);
        Permission::create(['name' => 'create perolehansuaras']);
        Permission::create(['name' => 'update perolehansuaras']);
        Permission::create(['name' => 'delete perolehansuaras']);

        Permission::create(['name' => 'list perolehansuarabacalegs']);
        Permission::create(['name' => 'view perolehansuarabacalegs']);
        Permission::create(['name' => 'create perolehansuarabacalegs']);
        Permission::create(['name' => 'update perolehansuarabacalegs']);
        Permission::create(['name' => 'delete perolehansuarabacalegs']);

        Permission::create(['name' => 'list perolehansuarapartais']);
        Permission::create(['name' => 'view perolehansuarapartais']);
        Permission::create(['name' => 'create perolehansuarapartais']);
        Permission::create(['name' => 'update perolehansuarapartais']);
        Permission::create(['name' => 'delete perolehansuarapartais']);

        Permission::create(['name' => 'list alltimsukses']);
        Permission::create(['name' => 'view alltimsukses']);
        Permission::create(['name' => 'create alltimsukses']);
        Permission::create(['name' => 'update alltimsukses']);
        Permission::create(['name' => 'delete alltimsukses']);

        Permission::create(['name' => 'list wilayahkabupatenkotas']);
        Permission::create(['name' => 'view wilayahkabupatenkotas']);
        Permission::create(['name' => 'create wilayahkabupatenkotas']);
        Permission::create(['name' => 'update wilayahkabupatenkotas']);
        Permission::create(['name' => 'delete wilayahkabupatenkotas']);

        Permission::create(['name' => 'list wilayahkecamatans']);
        Permission::create(['name' => 'view wilayahkecamatans']);
        Permission::create(['name' => 'create wilayahkecamatans']);
        Permission::create(['name' => 'update wilayahkecamatans']);
        Permission::create(['name' => 'delete wilayahkecamatans']);

        Permission::create(['name' => 'list wilayahkelurahandesas']);
        Permission::create(['name' => 'view wilayahkelurahandesas']);
        Permission::create(['name' => 'create wilayahkelurahandesas']);
        Permission::create(['name' => 'update wilayahkelurahandesas']);
        Permission::create(['name' => 'delete wilayahkelurahandesas']);

        Permission::create(['name' => 'list wilayahprovinsis']);
        Permission::create(['name' => 'view wilayahprovinsis']);
        Permission::create(['name' => 'create wilayahprovinsis']);
        Permission::create(['name' => 'update wilayahprovinsis']);
        Permission::create(['name' => 'delete wilayahprovinsis']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
