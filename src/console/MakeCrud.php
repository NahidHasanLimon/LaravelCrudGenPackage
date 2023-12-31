<?php

namespace NahidHasanLimon\CrudGen\console;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use NahidHasanLimon\CrudGen\Services\CrudService;


class MakeCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud
    {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a CRUD';



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $crudGenerator = new CrudService($this->arguments());
            dd($crudGenerator->build());
        $name = $this->argument('name');

        $this->model($name);

    }






}

