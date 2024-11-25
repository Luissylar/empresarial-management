<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user', 'company_id', 'user_id');
    }

    public function departaments()
    {
        return $this->hasMany(Departament::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'team_id');
    }

    public function passwordVaults()
    {
        return $this->hasMany(PasswordVault::class);
    }
}
