<?php

namespace NahidHasanLimon\CrudGen\Services;
use Illuminate\Support\Facades\File;
class MakeRoute implements IMakeCrud
{
    private preparedArguments $preparedArguments;


    public function __construct($arguments)
    {
        $this->preparedArguments = new PreparedArguments($arguments);
    }


    public function make(): void
    {
        $this->writeIntoFile();

    }


    public function writeIntoFile(): void
    {
        File::append(
            $this->preparedArguments->getRoutePath(),
            PHP_EOL . 'Route::resource(\'' . $this->preparedArguments->getModelNameLowerCasePlural() . "', {$this->preparedArguments->getControllerNamespace()}\\{$this->preparedArguments->getControllerName()}::class);");

    }

}
