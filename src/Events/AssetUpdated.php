<?php

namespace Wernersoderstrom\MockingbirdWebhookClient\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Wernersoderstrom\MockingbirdWebhookClient\Contracts\MockingbirdWebhookEvent;
use Wernersoderstrom\MockingbirdWebhookClient\Data\MockingbirdWebhookData;

final class AssetUpdated implements MockingbirdWebhookEvent
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public readonly MockingbirdWebhookData $data
    ) {}

    public function webhook(): MockingbirdWebhookData
    {
        return $this->data;
    }

    public function assetId(): string
    {
        return basename($this->data->entityId);
    }
}
