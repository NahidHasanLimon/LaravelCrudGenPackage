<?php

namespace NahidHasanLimon\CrudGen\Services;

class MakeRequest extends CrudBaseClass implements IMakeCrud
{

    public function getStub(): bool|string
    {
        return file_get_contents(__DIR__ . "/../stubs/Request.stub");
    }

    public function getContent(): array|bool|string
    {
        return str_replace(
            ['{{modelName}}'],
            [$this->preparedArguments->getModelName()],
            $this->getStub()
        );


    }

    public function make(): void
    {

        $this->writeIntoFile($this->getContent());
    }

    public function ifDirectoryNoExistCreate(): void
    {
        if (!file_exists($this->preparedArguments->getRequestPath()))
            $this->makeRequestDir();

    }

    public function makeRequestDir(): void
    {
        mkdir($this->preparedArguments->getRequestPath(), 0777, true);
    }

    public function writeIntoFile($content): void
    {
        $this->ifDirectoryNoExistCreate();
        file_put_contents($this->preparedArguments->getRequestPath() . $this->preparedArguments->getRequestName() . ".php", $content);
    }

}
