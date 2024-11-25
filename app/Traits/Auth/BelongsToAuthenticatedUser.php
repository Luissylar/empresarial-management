<?php

namespace App\Traits\Auth;
use Illuminate\Support\Facades\Auth;

trait BelongsToAuthenticatedUser
{
    protected static function bootBelongsToAuthenticatedUser()
    {
        static::creating(function ($model) {
            if (Auth::check() && !$model->user_id) {
                $model->user_id = Auth::id();
            }
        });
    }
}
