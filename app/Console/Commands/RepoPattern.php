<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class RepoPattern extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'class {name} {--option}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating model, controller, migration, request, repository, dto classes';

    private $controller = null;
    private $model = null;
    private $migration = null;
    private $request = null;
    private $dto = null;
    private $repo = null;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->setClassNames();

        // creating laravel model, migrations, form request, controller classes
        $this->call('make:model', [
            'name' => $this->model,
            '--migration' => true, // Generate migration
            '--controller' => true, // Generate controller
        ]);

        $this->call('make:request', ['name' => $this->request]);

        $this->createController();
        $this->createDto();
        $this->createRepository();

        $this->info("Custom class {$this->model} generated successfully!");
    }

    private function setClassNames()
    {
        $name = $this->argument('name');

        $this->controller = $name . 'Controller';
        $this->model = $name;
        $this->migration = Str::plural(strtolower($name));
        $this->request = $name . 'Request';
        $this->dto = $name . 'Dto';
        $this->repo = $name . 'Repository';
    }

    private function getStub($name)
    {
        return file_get_contents(base_path("stubs/{$name}.stub"));
    }

    private function replacePlaceholders($stub, array $replacements)
    {
        foreach ($replacements as $key => $value) {
            $stub = str_replace('{{' . $key . '}}', $value, $stub);
        }

        return $stub;
    }

    private function createController()
    {
        $stub = $this->getStub('controller.custom');

        $replacements = [
            'RequestName' => $this->request,
            'DtoName' => $this->dto,
            'repositoryName' => $this->repo,
            'route_name' => $this->migration
        ];

        $stub = $this->replacePlaceholders($stub, $replacements);
        $stub = str_replace('{{ controllerName }}', $this->controller, $stub);

        $newControllerPath = app_path("Http/Controllers/{$this->controller}.php");

        // Write the modified stub to the new controller file
        file_put_contents($newControllerPath, $stub);
    }

    private function createDto()
    {
        $classPath = app_path("Dto/{$this->dto}.php");

        if (File::exists($classPath)) {
            $this->error("The {$this->dto} already exists!");
            return;
        } else {
            $dtoDirectory = app_path("Dto");
            // Check if the directory already exists.
            if (!File::exists($dtoDirectory)) {
                // Create the directory.
                File::makeDirectory($dtoDirectory);
            }

            $stub = $this->getStub('dto');
            $stub = str_replace('{{ DtoName }}', $this->dto, $stub);

            // File::put($classPath, '');
            file_put_contents($classPath, $stub);
        }
    }

    private function createRepository()
    {
        $classPath = app_path("Repositories/{$this->repo}.php");

        if (File::exists($classPath)) {
            $this->error("The {$this->repo} already exists!");
            return;
        } else {
            $repoDirectory = app_path("Repositories");
            // Check if the directory already exists.
            if (!File::exists($repoDirectory)) {
                // Create the directory.
                File::makeDirectory($repoDirectory);
            }

            $stub = $this->getStub('repo');

            $stub = str_replace('{{ modelDto }}', $this->dto, $stub);
            $stub = str_replace('{{ modelName }}', $this->model, $stub);
            $stub = str_replace('{{ repositoryName }}', $this->repo, $stub);

            file_put_contents($classPath, $stub);
        }
    }
}
