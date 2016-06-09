<?php

/*
 * (c) sides <sides@sides.tv>
 */

namespace Sides\Autoimg\Listener;

use Flarum\Event\ConfigureFormatter;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;

class FormatAutoimg
{
    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    /**
     * @param SettingsRepositoryInterface $settings
     */
    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureFormatter::class, [$this, 'addAutoimgFormatter']);
    }

    /**
     * @param ConfigureFormatter $event
     */
    public function addAutoimgFormatter(ConfigureFormatter $event)
    {
        $name = "Autoimage";
        $event->configurator->plugins->set(
            $name,
            "Sides\\Autoimg\\TextFormatter\\Plugins\\{$name}\\Configurator"
        );
    }
}
