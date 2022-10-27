<?php

namespace Magenest\Test2\Model\Config\Source;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magenest\Test2\Model\ResourceModel\Movie\CollectionFactory;
use Magento\Framework\App\Config\Value;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Data\Collection\AbstractDb;

class CountMovie extends Value
{
    public $collectionFactory;

    public function __construct(
        CollectionFactory    $collectionFactory,
        Context              $context,
        Registry             $registry,
        ScopeConfigInterface $config,
        TypeListInterface    $cacheTypeList,
        AbstractResource     $resource = null,
        AbstractDb           $resourceCollection = null,
        array                $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    public function afterLoad()
    {
        $collection = $this->collectionFactory->create();
        $value = $collection->count();
        return $this->setValue($value);
    }
}
