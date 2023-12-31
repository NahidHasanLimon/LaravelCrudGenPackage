<?php

namespace NahidHasanLimon\CrudGen\Services;

use Illuminate\Support\Str;

class MakeMigration extends CrudBaseClass implements IMakeCrud
{

    public function getStub(): bool|string
    {
        return file_get_contents(__DIR__ . "/../stubs/migration.create.stub");
    }

    public function getContent(): array|bool|string
    {

        return str_replace(
            [
                '{{ table }}',
            ],
            [
                $this->preparedArguments->getTableName(),
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
        file_put_contents(
            $this->preparedArguments->getMigrationPath() . $this->preparedArguments->getMigrationFileName() . ".php",
            $content);
    }

}
