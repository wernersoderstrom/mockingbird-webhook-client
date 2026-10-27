<?php

namespace Wernersoderstrom\MockingbirdWebhookClient\Support;

use Illuminate\Contracts\Container\Container;
use Wernersoderstrom\MockingbirdWebhookClient\Contracts\MockingbirdWebhookEvent;
use Wernersoderstrom\MockingbirdWebhookClient\Data\MockingbirdWebhookData;
use Wernersoderstrom\MockingbirdWebhookClient\Events\AssetUpdated;
use Wernersoderstrom\MockingbirdWebhookClient\Events\ContactUpdated;
use Wernersoderstrom\MockingbirdWebhookClient\Events\EditionContributorsUpdated;
use Wernersoderstrom\MockingbirdWebhookClient\Events\EditionPriceUpdated;
use Wernersoderstrom\MockingbirdWebhookClient\Events\EditionTextsUpdated;
use Wernersoderstrom\MockingbirdWebhookClient\Events\EditionUpdated;
use Wernersoderstrom\MockingbirdWebhookClient\Events\PrintTimePlanUpdated;
use Wernersoderstrom\MockingbirdWebhookClient\Exceptions\UnsupportedMockingbirdEvent;

final class MockingbirdEventFactory
{
    /**
     * TODO:
     *
     * Bundle
     * PrintDeforestationRegulation
     * Education
     * DeliverySpecification
     * DeliverySpecificationDelete
     * SeriesTree
     */
    private const EVENT_MAP = [
        'asset.changed.v1' => AssetUpdated::class,
        'product.changed.v1' => EditionUpdated::class,
        'contact.changed.v1' => ContactUpdated::class,
        'product.contributors.changed.v1' => EditionContributorsUpdated::class,
        'product.price.changed.v1' => EditionPriceUpdated::class,
        'product.texts.changed.v1' => EditionTextsUpdated::class,
        'product.timeplan.changed.v1' => PrintTimePlanUpdated::class,
    ];

    public function __construct(private readonly Container $container) {}

    public function make(MockingbirdWebhookData $data): MockingbirdWebhookEvent
    {
        $eventClass = self::EVENT_MAP[$data->eventType] ?? throw UnsupportedMockingbirdEvent::forType($data->eventType);

        return $this->container->make(
            $eventClass,
            ['data' => $data]
        );
    }
}
