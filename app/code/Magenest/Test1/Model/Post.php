<?php

namespace Magenest\Test1\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    const MOVIE_NAME = 'name';

    protected function _construct()
    {
        $this->_init('Magenest\Test1\Model\ResourceModel\Post');
    }

    public function getName()
    {
        return $this->getData(self::MOVIE_NAME);
    }

}
