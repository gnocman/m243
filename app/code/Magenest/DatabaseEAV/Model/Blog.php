<?php

namespace Magenest\DatabaseEAV\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Blog extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'magenest_blog';
    protected $_cacheTag = 'magenest_blog';
    protected $_eventPrefix = 'magenest_blog';

    protected function _construct()
    {
        $this->_init('Magenest\DatabaseEAV\Model\ResourceModel\Blog');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getSelect()
    {
        $values = [];
        return $values;
    }

}

