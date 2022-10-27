<?php

namespace Magenest\DatabaseEAV\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Blog extends AbstractDb
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('magenest_blog', 'blog_id');
    }
}

