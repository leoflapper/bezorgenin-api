<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SetPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets the permissions for the various roles';


    protected $resourceActions = [
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy'
    ];

    protected $resources = [
        'companies',
        'addresses',
        'meals',
        'kitchens',
        'meal_categories',
        'orders'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (config('permission.app_permission_settings') as $name => $rolePermissionsResources) {
            $role = $this->getOrCreateRole($name);

            $permissionList = [];
            if($rolePermissionsResources === '*') {
                foreach (config('permission.app_permission_resources') as $resourceItem) {
                    foreach ($this->resourceActions as $resourceActionsItem) {
                        $permissionList[] = $this->getOrCreatePermission($resourceItem.'.'.$resourceActionsItem);
                    }

                }
            } else {
                foreach ($rolePermissionsResources as $key => $rolePermissionsItem) {

                    if($rolePermissionsItem === '*') {
                        $rolePermissionsItem = $this->resourceActions;
                    }
                    foreach ($rolePermissionsItem as $permissionItem) {
                        $permissionList[] = $this->getOrCreatePermission($key.'.'.$permissionItem);
                    }
                }
            }
            $role->syncPermissions($permissionList);
            $this->output->success(sprintf('%s %s permission synced', $role->name, count($permissionList)));
        }

        $this->output->success('Done');
    }

    /**
     * @param string $name
     * @return Role
     */
    private function getOrCreateRole(string $name): Role
    {
        if(!$role = Role::query()->where('name', $name)->first()) {
            $role = Role::create(['name' => $name]);
        }
        return $role;
    }

    /**
     * @param string $name
     * @return Permission
     */
    private function getOrCreatePermission(string $name): Permission
    {
        if(!$permission = Permission::query()->where('name', $name)->first()) {
            $permission = Permission::create(['name' => $name]);
        }
        return $permission;
    }
}
