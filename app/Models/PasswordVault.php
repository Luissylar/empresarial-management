<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use App\Traits\Auth\BelongsToAuthenticatedUser;

class PasswordVault extends Model
{
    use SoftDeletes;
    use HasTags;
    use BelongsToAuthenticatedUser;

    protected $fillable = [
        'company_id',
        'name',
        'username',
        'password',
        'url',
        'notes',
        'visibility',
        'active',
    ];

    protected $hidden = ['password'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
