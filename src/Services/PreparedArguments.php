<?php

namespace NahidHasanLimon\CrudGen\Services;

use Illuminate\Support\Str;

class PreparedArguments
{
    public array $arguments;

    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    public function getModelName()
    {
        return $this->arguments['name'];
    }

    public function getControllerName(): string
    {
        return $this->getModelName() . 'Controller';

    }

    public function getRequestName(): string
    {
        return $this->getModelName() . 'Request';

    }

    public function getModelNamePluralLowerCase(): string
    {
        return strtolower(Str::plural($this->getModelName()));

    }

    public function getModelNameLowerCasePlural(): string
    {
        return Str::plural(strtolower($this->getModelName()));
    }

    public function getModelNameSingularLowerCase(): string
    {
        return strtolower($this->getModelName());
    }

    public function getModelNamespace(): string
    {
        return 'App\Models';
    }

    public function getControllerNamespace(): string
    {
        return 'App\Http\Controllers';
    }

    public function getRequestNamespace(): string
    {
        return 'App\Http\Requests';
    }

    public function getModelPath(): string
    {
        return app_path('/Models/');
    }

    public function getControllerPath(): string
    {
        return app_path('/Http/Controllers/');
    }

    public function getRequestPath(): string
    {
        return app_path('/Http/Requests/');
    }

    public function getViewsFolderPath(): string
    {
        return resource_path('/views/' . $this->getModelNameSingularLowerCase() . '/');
    }

    public function getTableName(): string
    {
        return Str::plural(Str::snake($this->getModelName()));
    }

    public function getMigrationPath(): string
    {
        return base_path('/database/migrations/');
    }

    public function getMigrationClassName(): string
    {
        return Str::studly('create_' . $this->getTableName() . '_table');
    }

    public function getMigrationFileName(): string
    {
        return date('Y_m_d_His') . '_create_' . $this->getTableName() . '_table.php';
    }


    public function getRoutePath(): string
    {
        return base_path('routes/web.php');
    }

}
