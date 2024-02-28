<?php

namespace O21\BTCPayGreenfieldApi\Endpoints;

use O21\BTCPayGreenfieldApi\Entities\Invoice as InvoiceEntity;
use O21\BTCPayGreenfieldApi\Exceptions\StoreIDRequiredException;
use O21\Numeric\Numeric;

trait Invoice
{
    public function createInvoice(
        string|int|float|Numeric|null $amount = null,
        ?string $currency = null,
        ?string $storeId = null,
        ?array $metadata = null,
        ?array $receipt = null,
        ?array $additionalSearchTerms = null,
    ): InvoiceEntity {
        $storeId = $storeId ?? $this->getStoreId();

        StoreIDRequiredException::assert($storeId);

        $body = compact('amount', 'currency', 'metadata', 'receipt', 'additionalSearchTerms');

        $response = $this->client->post("stores/{$storeId}/invoices", [
            'json' => $body,
        ]);

        return new InvoiceEntity($response);
    }

    public function getInvoice(string $invoiceId, ?string $storeId = null): InvoiceEntity
    {
        $storeId = $storeId ?? $this->getStoreId();

        StoreIDRequiredException::assert($storeId);

        $response = $this->client->get("stores/{$storeId}/invoices/{$invoiceId}");

        return new InvoiceEntity($response);
    }
}
