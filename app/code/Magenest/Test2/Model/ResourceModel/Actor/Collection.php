<?php

namespace Magenest\Test2\Model\ResourceModel\Actor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\Test2\Model\Actor', 'Magenest\Test2\Model\ResourceModel\Actor');
    }

}
