<?php

namespace NahidHasanLimon\CrudGen\Services;

class MakeModel extends CrudBaseClass implements IMakeCrud
{
    public function getStub(): bool|string
    {
        return file_get_contents(__DIR__ . "/../stubs/Model.stub");
    }

    public function getContent(): array|bool|string
    {
        return str_replace(
            [
                '{{modelNamespace}}',
                '{{modelName}}',
            ],
            [
                $this->preparedArguments->getModelNamespace(),
                $this->preparedArguments->getModelName()
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
        file_put_contents($this->preparedArguments->getModelPath() . "{$this->preparedArguments->getModelName()}.php", $content);
    }


}
