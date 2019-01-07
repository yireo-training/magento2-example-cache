<?php
declare(strict_types=1);

namespace Yireo\ExampleCache\Model;

use Magento\Framework\App\Cache\Manager;
use Magento\Framework\DataObject;
use Yireo\ExampleCache\Model\Cache\Type;

/**
 * Class Example
 * @package Yireo\ExampleCache\Model
 */
class Example extends DataObject
{
    /**
     * @var Manager
     */
    private $cacheManager;

    /**
     * @var Type
     */
    private $cacheType;

    /**
     * Example constructor.
     * @param Manager $cacheManager
     * @param Type $cacheType
     * @param array $data
     */
    public function __construct(
        Manager $cacheManager,
        Type $cacheType,
        array $data = []
    ) {
        parent::__construct($data);
        $this->cacheManager = $cacheManager;
        $this->cacheType = $cacheType;
    }

    /**
     * Clean cache of type "example"
     */
    public function cleanCache()
    {
        $this->cacheManager->clean(['example']);
    }

    /**
     * @return $this
     */
    public function load()
    {
        $data = $this->cacheType->load($this->getCacheId());
        $this->setData($data);
        return $this;
    }

    /**
     * @return $this
     */
    public function save()
    {
        $this->cacheType->save($this->getData(), $this->getCacheId(), ['EXAMPLE']);
        return $this;
    }

    /**
     * @return int
     */
    private function getCacheId(): int
    {
        return 42;
    }
}
