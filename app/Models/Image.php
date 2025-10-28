<?php

namespace App\Models;


class Image extends BaseModel
{
    protected $fillable = [
        'url',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
