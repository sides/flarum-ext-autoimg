<?php

/*
 * (c) sides <sides@sides.tv>
 */

namespace Sides\Autoimg\TextFormatter\Plugins\Autoimage;

use s9e\TextFormatter\Plugins\ConfiguratorBase;

class Configurator extends ConfiguratorBase
{
    protected $attrName = 'src';
    protected $quickMatch = '://';
    protected $regexp = '#https?://[-.\\w]+/[-./%\\w]+\\.(?:png|jpe?g|gif)(?!\\S)#';
    protected $tagName = 'IMG';

    protected function setUp()
    {
        if (isset($this->configurator->tags[$this->tagName])) {
            return;
        }
        $tag = $this->configurator->tags->add($this->tagName);
        $filter = $this->configurator->attributeFilters->get('#url');
        $tag->attributes->add($this->attrName)->filterChain->append($filter);
        $tag->template = '<img src="{@' . $this->attrName . '}"/>';
    }

    public function getJSParser()
    {
        return \file_get_contents(realpath(__DIR__.'/Parser.js'));
    }
}
