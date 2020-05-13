<?php
declare(strict_types=1);

namespace alexLE\ReviewSummaryApi\Model;

use alexLE\ReviewSummaryApi\Api\GetProductReviewSummaryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

/**
 * Class GetProductReviewSummary load product reviews summary by product sku
 */
class GetProductReviewSummary implements GetProductReviewSummaryInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * GetProductReviewSummary constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @param string $sku
     * @return array
     */
    public function execute(string $sku)
    {
        $product = $this->productRepository->get($sku);

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
        $reviewFactory = $objectManager->create('Magento\Review\Model\Review');
        $storeId = $storeManager->getStore()->getId();
        $reviewFactory->getEntitySummary($product, $storeId);
        $ratingSummary = $product->getRatingSummary()->getRatingSummary();

        return intval($ratingSummary);
    }
}