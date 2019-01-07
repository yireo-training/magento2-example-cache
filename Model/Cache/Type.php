<?php
declare(strict_types=1);

namespace Yireo\ExampleCache\Model\Cache;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;

/**
 * Class Type
 * @package Yireo\ExampleCache\Model\Cache
 */
class Type extends TagScope
{
    /**
     * Type identifier
     */
    const TYPE_IDENTIFIER = 'example';

    /**
     * Cache tag
     */
    const CACHE_TAG = 'EXAMPLE';

    /**
     * Type constructor.
     * @param FrontendPool $cacheFrontendPool
     */
    public function __construct(
        FrontendPool $cacheFrontendPool
    ) {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}
