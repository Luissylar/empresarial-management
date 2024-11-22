<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departament extends Model
{
    use HasFactory;

    protected $filable = ['name', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
