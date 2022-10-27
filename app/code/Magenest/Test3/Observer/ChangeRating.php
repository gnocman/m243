<?php

namespace Magenest\Test3\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ChangeRating implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $model = $observer->getData('magenest_movie');
        $model->setData("rating", "0");
        $observer->setData('magenest_movie', $model);
    }
}
