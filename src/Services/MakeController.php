<?php

namespace NahidHasanLimon\CrudGen\Services;

use Illuminate\Support\Str;

class MakeController extends CrudBaseClass implements IMakeCrud
{
    public function getStub(): bool|string
    {
        return file_get_contents(__DIR__ . "/../stubs/Controller.stub");
    }

    public function getContent(): array|bool|string
    {
        return str_replace(
            [
                '{{controllerNamespace}}',
                '{{modelNamespace}}',
                '{{requestNamespace}}',
                '{{requestName}}',
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $this->preparedArguments->getControllerNamespace(),
                $this->preparedArguments->getModelNamespace(),
                $this->preparedArguments->getRequestNamespace(),
                $this->preparedArguments->getRequestName(),
                $this->preparedArguments->getModelName(),
                $this->preparedArguments->getModelNamePluralLowerCase(),
                $this->preparedArguments->getModelNameSingularLowerCase(),
            ],
            $this->getStub()
        );
    }

    public function make(): void
    {

        $this->writeIntoFile($this->getContent());
    }

    public function writeIntoFile($content): void
    {
        file_put_contents($this->preparedArguments->getControllerPath() . $this->preparedArguments->getControllerName() . ".php", $content);
    }

}
