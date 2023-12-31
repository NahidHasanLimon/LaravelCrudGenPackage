<?php

namespace NahidHasanLimon\CrudGen\Services\View;

use NahidHasanLimon\CrudGen\Services\IMakeCrud;
use NahidHasanLimon\CrudGen\Services\preparedArguments;

class WriteIntoView
{
    private $content;
    private $file_path;

    public function __construct($content, $file_path)
    {
        $this->content   = $content;
        $this->file_path = $file_path;
    }

    public function write(): void
    {

        file_put_contents($this->file_path, $this->content);
    }

}
