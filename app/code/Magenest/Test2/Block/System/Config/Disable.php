<?php

namespace Magenest\Test2\Block\System\Config;

use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Config\Block\System\Config\Form\Field;

class Disable extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $element->setReadonly('readonly');
        return $element->getElementHtml();
    }
}
