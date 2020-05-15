<?php
declare(strict_types=1);

namespace alexLE\ReviewSummaryApi\Api;

/**
 * Retrieve product review summary by sku
 *
 * @api
 */
interface GetProductReviewSummaryInterface
{
    /**
     * Get product review summary
     *
     * @param string $sku
     * @return alexLE\ReviewSummaryApi\Api\Data\SummaryInterface
     */
    public function execute(string $sku);
}