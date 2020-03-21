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


    protected $crud = [
        'create', 'read', 'update', 'delete'
    ];

    protected $models = [
            'company',
            'address',
            'meal',
            'kitchen',
            'meal_category',
            'order'
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
        foreach (config('permission.app_permission_settings') as $roleItem => $rolePermissionsItems) {
            if(!$role = Role::query()->where('name', $roleItem)->first()) {
                $role = Role::create(['name' => $roleItem]);
            }

            $permissionList = [];
            if($rolePermissionsItems === '*') {
                foreach ($this->models as $modelItem) {
                    foreach ($this->crud as $crudItem) {
                        $permissionName = $modelItem.':'.$crudItem;
                        if(!$permission = Permission::query()->where('name', $modelItem.':'.$crudItem)->first()) {
                            $permission = Permission::create(['name' => $permissionName]);
                        }

                        $permissionList[] = $permission;
                    }

                }
            } else {
                foreach ($rolePermissionsItems as $key => $rolePermissionsItem) {

                    if($rolePermissionsItem === '*') {
                        $rolePermissionsItem = $this->crud;
                    }
                    foreach ($rolePermissionsItem as $permissionItem) {
                        $permissionName = $key.':'.$permissionItem;
                        if(!$permission = Permission::query()->where('name', $key.':'.$permissionItem)->first()) {
                            $permission = Permission::create(['name' => $permissionName]);
                        }

                        $permissionList[] = $permission;
                    }
                }
            }
            $role->syncPermissions($permissionList);
            $this->output->success(sprintf('%s %s permission synced', $role->name, count($permissionList)));
        }

        $this->output->success('Done');
    }
}
