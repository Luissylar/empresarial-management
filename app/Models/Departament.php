<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'company_id',
        'description',
        'is_active'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
