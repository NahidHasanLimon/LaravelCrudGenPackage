<?php

namespace NahidHasanLimon\CrudGen\Services;


use NahidHasanLimon\CrudGen\Services\View\WriteIntoView;

class MakeView extends CrudBaseClass implements IMakeCrud
{
    public function ifDirectoryNoExistCreate(): void
    {
        if (!file_exists($this->preparedArguments->getViewsFolderPath()))
            $this->makeRequestDir();

    }

    public function makeRequestDir(): void
    {
        mkdir($this->preparedArguments->getViewsFolderPath(), 0777, true);
    }

    public function make(): void
    {
        $this->ifDirectoryNoExistCreate();
        $this->writeLayout();
        $this->makeIndexView();
        $this->makeEditView();
        $this->makeShow();
    }


    public function makeIndexView(): void
    {
        $writeIntoView = new WriteIntoView($this->getIndexContent(), $this->getIndexFilePath());
        $writeIntoView->write();

    }

    public function getIndexContent(): array|bool|string
    {
        $stub = file_get_contents(__DIR__ . "/../stubs/views/index.stub");

        return str_replace(
            [
                '{{tableHeader}}',
                '{{variable}}',
                '{{variableSingular}}',
            ],
            [
                $this->preparedArguments->getTableName(),
                $this->preparedArguments->getModelNamePluralLowerCase(),
                $this->preparedArguments->getModelNameSingularLowerCase(),
            ],
            $stub
        );

    }

    public function makeEditView(): void
    {
        $writeIntoView = new WriteIntoView($this->getEditContent(), $this->getEditFilePath());
        $writeIntoView->write();
    }

    public function getEditFilePath(): string
    {
        return $this->preparedArguments->getViewsFolderPath() . 'edit.blade' . '.php';
    }

    public function getIndexFilePath(): string
    {
        return $this->preparedArguments->getViewsFolderPath() . 'index.blade' . '.php';
    }

    public function getEditContent(): array|bool|string
    {
        $stub = file_get_contents(__DIR__ . "/../stubs/views/edit.stub");

        return str_replace(
            [

                '{{variableRoute}}',
                '{{variableSingular}}',
            ],
            [
                $this->preparedArguments->getModelNamePluralLowerCase(),
                $this->preparedArguments->getModelNameSingularLowerCase(),
            ],
            $stub
        );
    }


    public function writeLayout(): void
    {
        $file_path     = $this->preparedArguments->getViewsFolderPath() . 'app.blade' . '.php';
        $stub          = file_get_contents(__DIR__ . "/../stubs/views/app.stub");
        $content       = str_replace([], [], $stub);
        $writeIntoView = new WriteIntoView($content, $file_path);
        $writeIntoView->write();
    }

    public function makeShow(): void
    {
        $stub = file_get_contents(__DIR__ . "/../stubs/views/show.stub");

        $content       = str_replace(
            [
                '{{variableSingular}}',
                '{{variableRoute}}',

            ],
            [
                $this->preparedArguments->getModelNameSingularLowerCase(),
                $this->preparedArguments->getModelNamePluralLowerCase(),
            ],
            $stub
        );
        $writeIntoView = new WriteIntoView($content, $this->preparedArguments->getViewsFolderPath() . 'show.blade' . '.php');
        $writeIntoView->write();
    }

}
