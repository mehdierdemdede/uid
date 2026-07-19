<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('t_route')) {
    /**
     * Resolve a route name to its locale-aware equivalent (bs.* prefix when
     * the current locale is Bosnian), falling back to the base route name
     * if no localized variant is registered.
     */
    function t_route(string $name, mixed $parameters = [], bool $absolute = true): string
    {
        $target = app()->getLocale() === 'bs' ? "bs.{$name}" : $name;

        if (! Route::has($target)) {
            $target = $name;
        }

        return route($target, $parameters, $absolute);
    }
}
