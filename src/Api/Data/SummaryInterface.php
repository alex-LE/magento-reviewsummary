<?php

declare(strict_types=1);

namespace alexLE\ReviewSummaryApi\Api\Data;

/**
* @api
*/
interface SummaryInterface {

    const SUMMARY = 'summary';
    const COUNT = 'count';

    /**
     * @return int
     */
    public function getSummary();

    /**
     * @param int $summary
     * @return void
     */
    public function setSummary($summary);

    /**
     * @return int
     */
    public function getCount();

    /**
     * @param int $count
     * @return void
     */
    public function setCount($count);
}