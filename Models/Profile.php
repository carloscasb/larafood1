<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name',  'description'];

 // RELACIONAMENTO DAS PERMISSÔES - ESSA SER AS PERMISSOES POSSIVEL NUM PERFIL
 public function permissions() {
    return $this->belongsToMany(Permission::class);
} 

// RELACIONAMENTO DAS PERFILS - ESSA SER os PLANOS  POSSIVEL NUM PERFIL
public function plans() {
    return $this->belongsToMany(Plan::class);
}   


/**
     * Permission not linked with this profile
     */

public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $permissions;
    }


}
