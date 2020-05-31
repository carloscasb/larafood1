<?php

namespace App\Tenant\Observers;
use Illuminate\Support\Str;
use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TenantObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        $managerTenant = app(ManagerTenant::class);
                      
      //  $identify = $managerTenant->getTenantIdentify();
        $model->tenant_id = $managerTenant->getTenantIdentify();

/* 
        if ($identify)
            $model->tenant_id = $identify;

            */
    }

}    