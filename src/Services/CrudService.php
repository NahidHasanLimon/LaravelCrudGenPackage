<?php

namespace NahidHasanLimon\CrudGen\Services;
class CrudService
{
    public array $arguments;

    public function __construct($arguments)
    {
        $this->arguments = $arguments;

    }

    private function getArtifact(IMakeCrud $IMakeCrud)
    {
        $crudService = new CrudMaker($IMakeCrud);
        $crudService->make();
    }

    public function build()
    {

        $this->makeModel();
        $this->MakeRequest();
        $this->makeController();
        $this->makeRoute();
        $this->makeMigration();
        $this->makeMigration();
        $this->makeView();
    }

    private function makeModel(): void
    {
        $this->getArtifact(new MakeModel($this->arguments));
    }

    private function makeController(): void
    {
        $this->getArtifact(new MakeController($this->arguments));
    }

    private function makeRequest(): void
    {
        $this->getArtifact(new MakeRequest($this->arguments));
    }

    private function makeRoute(): void
    {
        $this->getArtifact(new MakeRoute($this->arguments));
    }

    private function makeMigration(): void
    {
        $this->getArtifact(new MakeMigration($this->arguments));
    }

    private function makeView(): void
    {
        $this->getArtifact(new MakeView($this->arguments));
    }

}
