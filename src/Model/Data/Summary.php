<?php
declare(strict_types=1);

namespace alexLE\ReviewSummaryApi\Model\Data;

use alexLE\ReviewSummaryApi\Api\Data\SummaryInterface;
use Magento\Framework\Api\AbstractSimpleObject;

/**
 * @inheritdoc
 */
class Summary extends AbstractSimpleObject implements SummaryInterface {

    /**
     * @return int
     */
    public function getSummary()
    {
        return $this->_get(self::SUMMARY);
    }

    /**
     * @param int $summary
     * @return $this
     */
    public function setSummary($summary)
    {
        return $this->setData(self::SUMMARY, $summary);
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->_get(self::COUNT);
    }

    /**
     * @param int $count
     * @return $this
     */
    public function setCount($count)
    {
        return $this->setData(self::COUNT, $count);
    }
}