<?php

namespace app\Console\Commands;

use Illuminate\Support\Str;
use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class OSchoolMigrationMakeCommand extends GeneratorCommand
{
    use ModuleCommandTrait;

    /**
     * The name of argument name.
     *
     * @var string
     */
    protected $argumentName = 'model';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'oschool:make-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration for the specified module.';

    public function handle()
    {
        $migrationName = 'create_' . $this->createTableName() . '_table';
        $this->call('module:make-migration', ['name' => $migrationName, 'module' => $this->argument('module')]);
    }

    /**
     * Create a proper migration name:
     * ProductDetail: product_details
     * Product: products
     * @return string
     */
    private function createTablePostfix()
    {
        $pieces = preg_split('/(?=[A-Z])/', $this->argument('migration'), -1, PREG_SPLIT_NO_EMPTY);

        $string = '';
        foreach ($pieces as $i => $piece) {
            if ($i+1 < count($pieces)) {
                $string .= strtolower($piece) . '_';
            } else {
                $string .= strtolower($piece);
            }
        }

        return $string;
    }

    private function createTablePrefix()
    {
        $pieces = preg_split('/(?=[A-Z])/', $this->getModuleName(), -1, PREG_SPLIT_NO_EMPTY);

        $string = '';
        foreach ($pieces as $i => $piece) {
            if ($i+1 < count($pieces)) {
                $string .= strtolower($piece) . '_';
            } else {
                $string .= strtolower($piece);
            }
        }

        return $string;
    }

    private function createTableName()
    {
        return $this->createTablePrefix() . '__' . $this->createTablePostfix();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['migration', InputArgument::REQUIRED, 'The name of migration will be created.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
    }

    /**
     * @return mixed
     */
    protected function getTemplateContents()
    {

    }

    /**
     * @return mixed
     */
    protected function getDestinationFilePath()
    {

    }

    /**
     * Get default namespace.
     *
     * @return string
     */
    public function getDefaultNamespace() : string
    {

    }
}
