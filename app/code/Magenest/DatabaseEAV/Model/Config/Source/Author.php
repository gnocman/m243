<?php

namespace Magenest\DatabaseEAV\Model\Config\Source;

use \Magento\User\Model\ResourceModel\User\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class Author implements OptionSourceInterface
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
                'label' => $director->getUserName(),
                'value' => $director->getId(),
            ];
        }

        return $options;
    }
}
