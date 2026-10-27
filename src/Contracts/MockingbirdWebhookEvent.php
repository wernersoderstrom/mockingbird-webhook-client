<?php

namespace Wernersoderstrom\MockingbirdWebhookClient\Contracts;

use Wernersoderstrom\MockingbirdWebhookClient\Data\MockingbirdWebhookData;

interface MockingbirdWebhookEvent
{
    public function webhook(): MockingbirdWebhookData;
}
