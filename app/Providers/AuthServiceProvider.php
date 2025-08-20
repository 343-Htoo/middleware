<?php

use Illuminate\Support\Facades\Gate;
use App\Models\Permission;

public function boot()
{
    $this->registerPolicies();


    if (Schema::hasTable('permissions')) {
        Permission::all()->each(function ($permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasPermission($permission->name);
            });
        });
    }
}
