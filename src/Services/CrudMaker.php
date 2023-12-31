<?php

namespace NahidHasanLimon\CrudGen\Services;

use Illuminate\Support\Str;

class CrudMaker
{

    public $IMakeCrud;

    public function __construct(IMakeCrud $IMakeCrud)
    {
        $this->IMakeCrud = $IMakeCrud;

    }

    public function make()
    {
        $this->IMakeCrud->make();

    }


}
