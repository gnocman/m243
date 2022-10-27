<?php

namespace Magenest\Test2\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;

class Actor extends AbstractDb
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('magenest_actor', 'actor_id');
    }

}
