<?php

namespace Wernersoderstrom\MockingbirdWebhookClient\Jobs;

use Illuminate\Contracts\Events\Dispatcher;
use Wernersoderstrom\MockingbirdWebhookClient\Data\MockingbirdWebhookData;
use Wernersoderstrom\MockingbirdWebhookClient\Support\MockingbirdEventFactory;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

final class ProcessMockingbirdWebhookJob extends ProcessWebhookJob
{
    public function handle(
        MockingbirdEventFactory $factory,
        Dispatcher $dispatcher,
    ): void {

        $data = MockingbirdWebhookData::fromPayload(
            $this->webhookCall->payload
        );

        $event = $factory->make($data);
        $dispatcher->dispatch($event);

    }
}
