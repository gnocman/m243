<?php

namespace Magenest\DatabaseEAV\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'blog_id';
    protected $_eventPrefix = 'name';
    protected $_eventObject = 'description';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\DatabaseEAV\Model\Blog', 'Magenest\DatabaseEAV\Model\ResourceModel\Blog');
    }

}

