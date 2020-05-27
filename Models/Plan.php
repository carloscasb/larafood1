<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    protected $fillable = ['name', 'url', 'price', 'description'];

        // RELACIONAMENTO COM DETAIL

    public function details() {
                return $this->hasMany(DetailPlan::class);
                
    }   

        // RELACIONAMENTO DPERFIL (profile) - ESSA SER OS PERFIS POSSIVEL NUM PLANO
        public function profiles() {
            return $this->belongsToMany(Profile::class);
        } 


        // RELACIONAMENTO PLANO TENANT - 1:N UM PLANO VARIOS TENANTS ----E UM TENANT ESTA RELACIONANDO A UM  PLANO
        public function tenants() {
            return $this->hasMany(Tenant::class);
        } 




    public function search($filter = null) {

            $results = $this->where('name', 'LIKE', "%{$filter}%" )
                            ->orWhere('description' , 'LIKE', "%{$filter}%" )
                            ->paginate(1);
            return $results ;                
    }

    /**
     * Profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }
}
