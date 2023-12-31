<?php

namespace NahidHasanLimon\CrudGen\Services\View;
use NahidHasanLimon\CrudGen\Services\CrudBaseClass;

class MakeCreate extends CrudBaseClass 
{
    public function getStub(): bool|string
    {
        return file_get_contents(__DIR__ . "/../../stubs/views/create.stub");
    }

    public function getContent(): array|bool|string
    {
        
        return str_replace(
            [

                '{{variableRoute}}',
                '{{variableSingular}}',
            ],
            [
                $this->preparedArguments->getModelNamePluralLowerCase(),
                $this->preparedArguments->getModelNameSingularLowerCase(),
            ],
            $this->getStub()
        );
    }

    public function make(): void
    {
        $this->writeIntoFile();
    }
    public function getFilePath(){
        return $this->preparedArguments->getViewsFolderPath() . 'create.blade' . '.php';
    }

    public function writeIntoFile(): void
    {
        file_put_contents($this->getFilePath(), $this->getContent());
    }


}
