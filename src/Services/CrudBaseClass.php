<?php

namespace NahidHasanLimon\CrudGen\Services;

use Illuminate\Support\Str;

class CrudBaseClass
{

    public preparedArguments $preparedArguments;
    public  $arguments;
    public function __construct($arguments)
    {
        $this->arguments = $arguments;
        $this->preparedArguments = new PreparedArguments($arguments);
    }



}
