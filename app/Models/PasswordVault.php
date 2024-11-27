<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use App\Traits\Auth\BelongsToAuthenticatedUser;
use App\Traits\Utilities\Encryptable;
use App\Models\Scopes\VisibilityPasswordScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([VisibilityPasswordScope::class])]

class PasswordVault extends Model
{
    use SoftDeletes;
    use HasTags;
    use BelongsToAuthenticatedUser;
    use Encryptable;

    protected static array $encryptable = ['password'];

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


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
