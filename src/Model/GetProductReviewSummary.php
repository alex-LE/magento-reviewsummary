<?php
declare(strict_types=1);

namespace alexLE\ReviewSummaryApi\Model;

use alexLE\ReviewsApi\Api\Data\SummaryInterfaceFactory;
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
     * @var SummaryInterfaceFactory
     */
    private $summaryInterfaceFactory;

    /**
     * GetProductReviews constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param SummaryInterfaceFactory $summaryInterfaceFactory
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        SummaryInterfaceFactory $summaryInterfaceFactory
    ) {
        $this->productRepository = $productRepository;
        $this->summaryInterfaceFactory = $summaryInterfaceFactory;
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

        $result = $this->summaryInterfaceFactory->create();;
        $result->setSummary($product->getRatingSummary()->getRatingSummary());
        $result->setCount($product->getRatingSummary()->getReviewsCount());

        return $result;
    }
}