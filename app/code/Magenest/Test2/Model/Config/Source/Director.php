<?php

namespace Magenest\Test2\Model\Config\Source;

use Magenest\Test2\Model\ResourceModel\Director\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class Director implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function toOptionArray()
    {
        $options[] = ['label' => '-- Please Select --', 'value' => ''];
        $collection = $this->collectionFactory->create()->load();

        foreach ($collection as $director) {
            $options[] = [
                'label' => $director->getName(),
                'value' => $director->getId(),
            ];
        }

        return $options;
    }
}
