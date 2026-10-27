<?php

namespace Wernersoderstrom\MockingbirdWebhookClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wernersoderstrom\MockingbirdWebhookClient\MockingbirdWebhookClient
 */
class MockingbirdWebhookClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wernersoderstrom\MockingbirdWebhookClient\MockingbirdWebhookClient::class;
    }
}
