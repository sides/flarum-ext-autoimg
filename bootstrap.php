<?php

/*
 * (c) sides <sides@sides.tv>
 */

use Sides\Autoimg\Listener;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->subscribe(Listener\FormatAutoimg::class);
};
