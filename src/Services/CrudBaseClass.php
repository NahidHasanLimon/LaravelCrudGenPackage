<?php

namespace NahidHasanLimon\CrudGen\Services;

use Illuminate\Support\Str;

class CrudBaseClass
{

    public preparedArguments $preparedArguments;

    public function __construct($arguments)
    {
        $this->preparedArguments = new PreparedArguments($arguments);
    }



}
