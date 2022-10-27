<?php

namespace Magenest\Test2\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Relation implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => '1',
                'label' => __('Show')
            ],
            [
                'value' => '2',
                'label' => __('Not-Show')
            ],
        ];
    }
}
