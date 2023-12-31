<?php

namespace NahidHasanLimon\CrudGen;
use Illuminate\Support\ServiceProvider;
use NahidHasanLimon\CrudGen\console\MakeCrud;

class CrudGenServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->commands(
            MakeCrud::class,
        );

    }

    public function boot()
    {
    }
}
