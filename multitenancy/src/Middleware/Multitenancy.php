<?php

namespace Encore\Admin\Multitenancy\Middleware;

use Illuminate\Support\Arr;

class Multitenancy
{
    public function handle($request, \Closure $next, ...$args)
    {
        $this->overrideConfig($args[0]);

        return $next($request);
    }

    protected function overrideConfig($name)
    {
        $config = require config("admin.extensions.multitenancy.$name");

        config(['admin' => $config]);

        config(Arr::dot(config('admin.auth', []), 'auth.'));
    }
}
