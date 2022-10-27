<?php

namespace Magenest\Test1\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magenest\Test1\Model\ResourceModel\Post\CollectionFactory;

class Showdata extends Template
{
    /**
     * @var CollectionFactory
     */
    public $collection;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
//        $collection = $this->collection->create();
//        $collection->joinTableToGetActorAndDirectory();
//        return $collection;
        return $this->collection->create()->joinTableToGetActorAndDirectory();
    }

}
