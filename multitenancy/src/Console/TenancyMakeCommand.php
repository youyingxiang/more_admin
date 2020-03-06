<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/3/6
 * Time: 4:44 PM
 */

namespace Encore\Admin\Multitenancy\Console;

use Encore\Admin\Console\MakeCommand;
use Illuminate\Support\Arr;

class TenancyMakeCommand extends MakeCommand {

    protected $signature = 'admin:make:more {config} {name} 
        {--model=} 
        {--title=} 
        {--stub= : Path to the custom stub file. } 
        {--namespace=}
        {--O|output}';

    protected $description = '多后台make';

    public function handle() {
        $this->overrideConfig();
        parent::handle();
    }

    protected function overrideConfig()
    {
        $name = $this->argument('config');
        $configFile = config("admin.extensions.multitenancy.$name");

        if (empty($configFile) || !file_exists($configFile)) {
            $this->error("Config error");
            $this->error("    Please check your config file [config/{$name}.php]");
            exit;
        }

        $config = require config("admin.extensions.multitenancy.$name");

        config(['admin' => $config]);

        config(Arr::dot(config('admin.auth', []), 'auth.'));
    }
}
