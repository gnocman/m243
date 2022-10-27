<?php

namespace Magenest\Test3\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ChangeDisplayText implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('customer');
        $displayText->setData('firstname', 'Magenest');
        return $this;
    }
}
