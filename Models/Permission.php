<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name',  'description'];

    
// RELACIONAMENTO DOS PERFIS - ESSss são os PERFIS POSSIVEL NUMA PERMISSÂO
public function profiles()
{
    return $this->belongsToMany(Profile::class);
}

}
