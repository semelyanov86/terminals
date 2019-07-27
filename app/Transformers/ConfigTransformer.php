<?php

namespace App\Transformers;

use App\Config;
use League\Fractal\TransformerAbstract;

class ConfigTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['terminal', 'configImage'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Config $config)
    {
        return [
            'id' => $config->id,
            'name' => $config->name,
            'server' => $config->server,
            'phone' => $config->phone,
            'ping_block' => $config->ping_block,
            'printer_block' => $config->printer_block,
            'company' => $config->company,
            'website' => $config->website
        ];
    }
    public function includeTerminal(Config $config)
    {
        return $this->item(request()->user(), new TerminalTransformer);
    }
    public function includeConfigImage(Config $config)
    {
        return $this->collection($config->images, new ConfigImageTransformer());
    }
}