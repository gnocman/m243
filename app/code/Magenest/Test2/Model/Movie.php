<?php

namespace Magenest\Test2\Model;

use Magento\Framework\Model\AbstractModel;

class Movie extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Magenest\Test2\Model\ResourceModel\Movie');
    }

}
