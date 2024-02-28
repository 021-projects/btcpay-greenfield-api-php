<?php

namespace O21\BTCPayGreenfieldApi\Entities;

use O21\ApiEntity\BaseEntity;

/**
 * @property string $id
 * @property string $storeId
 * @property \O21\Numeric\Numeric $amount
 * @property string $currency
 * @property string $type
 * @property string $checkoutLink
 * @property \Carbon\Carbon $createdTime
 * @property \Carbon\Carbon $expirationTime
 * @property \Carbon\Carbon $monitoringExpiration
 * @property string $status
 * @property string $additionalStatus
 * @property array $availableStatusesForManualMarking
 * @property bool $archived
 * @property array $metadata
 */
class Invoice extends BaseEntity
{
    protected array $casts = [
        'amount' => \O21\Numeric\Numeric::class,
    ];
}
