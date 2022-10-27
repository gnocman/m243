<?php

namespace Magenest\Test2\Block\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class Exportproduct
 * @package Magenest\Test2\Block\System\Config
 */
class Button extends Field
{
    protected $_template = 'Magenest_Test2::system/config/button.phtml';

    public function __construct(
        Context $context,
        array   $data = []
    )
    {
        parent::__construct($context, $data);
    }

    public function render(AbstractElement $element)
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }

    public function getAjaxUrl()
    {
        return $this->getUrl('loyalty/export/allproducts'); //Put your controller action URL here
    }

    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Button'
        )->setData(
            [
                'id' => 'fieldbtn',
                'label' => __('Reload Page'),
            ]
        );
        return $button->toHtml();
    }

}
