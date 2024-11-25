<?php

namespace App\Traits\Utilities;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;

trait Encryptable
{
    public static function bootEncryptable()
    {
        static::saving(function ($model) {
            foreach ($model->getEncryptableAttributes() as $attribute) {
                if ($model->{$attribute}) {
                    $model->{$attribute} = Crypt::encryptString($model->{$attribute});
                }
            }
        });

        static::retrieved(function ($model) {
            foreach ($model->getEncryptableAttributes() as $attribute) {
                if ($model->{$attribute}) {
                    try {
                        $model->{$attribute} = Crypt::decryptString($model->{$attribute});
                    } catch (DecryptException $e) {
                        Log::error("Error en el payload: ", [
                            'request_data' => request()->all(),
                            'session' => session()->all(),
                            'error' => $e->getMessage(),
                        ]);
                    }
                }
            }
        });
    }

    protected function getEncryptableAttributes(): array
    {
        return static::$encryptable ?? [];
    }
}
