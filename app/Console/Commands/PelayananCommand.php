<?php

namespace App\Console\Commands;

use App\Pelayanan\PelayananProvider;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;
use Illuminate\Support\Str;

class PelayananCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:pelayanan {slug} {type} {--name= : Nama lengkap pelayanan}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new pelayanan service';

    /**
     * Composer instance
     *
     * @var Composer
     */
    protected $composer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct($files);
        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->option('name');
        $slug = $this->argument('slug');
        $type = $this->argument('type');
        switch(strtolower($type)) {
            case 'gratis':
                $type = 'PelayananProvider::PELAYANAN_GRATIS';
                break;
            case 'berbayar':
                $type = 'PelayananProvider::PELAYANAN_BERBAYAR';
                break;
            default:
                $this->error('Tipe pelayanan tidak dikenali');
                return false;
        }
        if (empty($name)) {
            $this->error('Nama pelayanan tidak boleh kosong');
            return false;
        }

        if ($this->isAlreadyExists($slug)) {
            $this->error($this->type.' already exists!');

            return false;
        }

        // Create slug directory
        $this->info('Creating directory...');
        $this->files->makeDirectory($this->getBasePath($slug . '/Controller'), 0777, true, true);

        $param = [
            'slug' => $slug,
            'slug_lower' => strtolower($slug),
            'name' => $name,
            'type' => $type,
        ];

        // Create service provider
        $this->info('Creating ' . $slug . 'Provider.php...');
        $providerStub = $this->files->get($this->getStub());
        $this->files->put(
            $this->getProviderPath($slug),
            $this->sortImports(
                $this->fillStub($providerStub, $param)
            )
        );

        // Create route
        $this->info('Creating Route.php...');
        $routeStub = $this->files->get($this->getRouteStub());
        $this->files->put(
            $this->getRoutePath($slug),
            $this->sortImports(
                $this->fillStub($routeStub, $param)
            )
        );

        

        // Create controller
        $this->info('Creating ' . $slug . 'Controller.php...');
        $controllerStub = $this->files->get($this->getControllerStub());
        $this->files->put(
            $this->getControllerPath($slug),
            $this->sortImports(
                $this->fillStub($controllerStub, $param)
            )
        );

        $this->info('Register your pelayanan service in PelayananServiceProvider');
        return 0;
    }

    protected function isAlreadyExists($slug)
    {
        $this->info('Checking if '.$slug.' already exists...');
        return $this->files->exists(__DIR__.'/../../Pelayanan/Providers/' . $slug . '/' . $slug . 'Provider.php');
    }

    protected function getStub()
    {
        return __DIR__.'/stubs/pelayanan-provider.create.stub';
    }

    private function getProviderPath($slug)
    {
        return $this->getBasePath($slug) . '/' . $slug . 'Provider.php';
    }

    private function getRouteStub()
    {
        return __DIR__.'/stubs/pelayanan-route.create.stub';
    }

    private function getRoutePath($slug)
    {
        return $this->getBasePath($slug) . '/Routes.php';
    }

    private function getControllerStub()
    {
        return __DIR__.'/stubs/pelayanan-controller.create.stub';
    }

    private function getControllerPath($slug)
    {
        return $this->getBasePath($slug) . '/Controller/' . $slug . 'Controller.php';
    }

    private function getBasePath($slug)
    {
        return __DIR__.'/../../Pelayanan/Providers/' . $slug;
    }

    private function fillStub($stub, $data)
    {
        foreach($data as $key => $value) {
            $stub = str_replace(
                ["{{$key}}", "{{ $key }}"],
                $value, 
                $stub
            );
        }
        return $stub;
    }
}
