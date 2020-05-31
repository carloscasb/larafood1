<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
   
   // public function getTenantIdentify()  
   public function getTenantIdentify(): int 
    {
      //  return auth()->check() ? auth()->user()->tenant_id : '';
                return auth()->user()->tenant_id;
    }

    
   // public function getTenant()
         public function getTenant(): Tenant
    {
       // return auth()->check() ? auth()->user()->tenant : '';
       return auth()->user()->tenant;

    }
//  METODO IDENTIFICA SE É ADMIN OU NAO
    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }

    
}