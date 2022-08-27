<?php
namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess () {
        $this->defineGateCategory();
    }
    public function defineGateCategory () {
        //category
        Gate::define('gate-category-view', 'App\Policies\ProductCategoryPolicy@view');
        Gate::define('gate-category-create', 'App\Policies\ProductCategoryPolicy@create');
        Gate::define('gate-category-update', 'App\Policies\ProductCategoryPolicy@update');
        Gate::define('gate-category-delete', 'App\Policies\ProductCategoryPolicy@delete');

        //list user
        Gate::define('gate-settings-view', 'App\Policies\SettingsUserPolicy@view');
        Gate::define('gate-settings-create', 'App\Policies\SettingsUserPolicy@create');
        Gate::define('gate-settings-update', 'App\Policies\SettingsUserPolicy@update');
        Gate::define('gate-settings-delete', 'App\Policies\SettingsUserPolicy@delete');

        //list role
        Gate::define('gate-role-view', 'App\Policies\RoleUserPolicy@view');
        Gate::define('gate-role-create', 'App\Policies\RoleUserPolicy@create');
        Gate::define('gate-role-update', 'App\Policies\RoleUserPolicy@update');
        Gate::define('gate-role-delete', 'App\Policies\RoleUserPolicy@delete');

        //permissions
        Gate::define('gate-permissions-view', 'App\Policies\PermissionsUserPolicy@view');
        Gate::define('gate-permissions-create', 'App\Policies\PermissionsUserPolicy@create');

    }
}