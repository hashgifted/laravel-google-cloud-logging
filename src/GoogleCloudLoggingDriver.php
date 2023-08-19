<?php

namespace SuperChairon\LaravelGoogleCloudLogging;


use Illuminate\Log\ParsesLogConfiguration;
use Monolog\Logger;

class GoogleCloudLoggingDriver
{
    use ParsesLogConfiguration;

    public function __invoke($config)
    {
        return new Logger($this->parseChannel($config), [
            new GoogleCloudLoggingHandler(
                $config['labels'], $config['logName'], $this->level($config)
            ),
        ]);
    }

    protected function getFallbackChannelName()
    {
        return 'unknown';
    }
}
