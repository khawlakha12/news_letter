<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$roleAdmin = Role::create(['name' => 'admin']);
$roleEditor = Role::create(['name' => 'editor']);

$permission1 = Permission::create(['name' => 'edit articles']);
$permission2 = Permission::create(['name' => 'delete articles']);
$permission3 = Permission::create(['name' => 'update articles']);

$roleAdmin->givePermissionTo($permission1, $permission2, $permission3);
$roleEditor->givePermissionTo($permission1 , $permission3);
