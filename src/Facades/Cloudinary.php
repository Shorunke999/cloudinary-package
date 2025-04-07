<?php

namespace Shorunke\Cloudinary\Facades;

use Illuminate\Support\Facades\Facade;

class Cloudinary extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Shorunke\Cloudinary\CloudinaryService::class;
    }
}
