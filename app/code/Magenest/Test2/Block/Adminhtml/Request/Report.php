<?php

namespace Magenest\Test2\Block\Adminhtml\Request;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Module\FullModuleList;

class Report extends Template
{
    /**
     * @var FullModuleList
     */
    protected $fullModuleList;
    protected $_customerFactory;
    protected $_productCollectionFactory;
    protected $_orderCollectionFactory;
    protected $_invoiceCollectionFactory;
    protected $_creditmemoCollectionFactory;

    /**
     * @param Context $context
     * @param FullModuleList $fullModuleList
     * @param \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory
     * @param \Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory $invoiceCollectionFactory
     * @param \Magento\Sales\Model\ResourceModel\Order\Creditmemo\CollectionFactory $creditmemoCollection
     * @param array $data
     */
    public function __construct(
        Context                                                               $context,
        FullModuleList                                                        $fullModuleList,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory      $customerFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory        $productCollectionFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory            $orderCollectionFactory,
        \Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory    $invoiceCollectionFactory,
        \Magento\Sales\Model\ResourceModel\Order\Creditmemo\CollectionFactory $creditmemoCollection,
        array                                                                 $data = []
    )
    {
        $this->fullModuleList = $fullModuleList;
        $this->_customerFactory = $customerFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->_invoiceCollectionFactory = $invoiceCollectionFactory;
        $this->_creditmemoCollectionFactory = $creditmemoCollection;
        parent::__construct($context, $data);
    }

    /**
     * @return int|null
     * get All Module in magento2
     */
    public function getCountAllModule()
    {
        return count($this->fullModuleList->getNames());
    }

    /**
     * @return array
     * get Module of you in magento2
     */
    public function getModuleMagento()
    {
        $result = [];
        $modules = $this->fullModuleList->getNames();
        foreach ($modules as $_module) {
            if (strpos($_module, 'Magento') !== false) {
                $result[] = $_module;
            }
        }
        return $result;
    }

    /**
     * @return int
     * get all customers
     */
    public function getCustomerCollection()
    {
        return $this->_customerFactory->create()->count();
    }

    /**
     * @return int
     * get all products
     */
    public function getProductCollection()
    {
        return $this->_productCollectionFactory->create()->count();
    }

    /**
     * @return int
     * get all orders
     */
    public function getOrderCollection()
    {
        return $this->_orderCollectionFactory->create()->count();
    }

    /**
     * @return int
     * get all invoice
     */
    public function getInvoiceCollection()
    {
        return $this->_invoiceCollectionFactory->create()->count();
    }

    /**
     * @return int
     * get all credit
     */
    public function getCreditCollection()
    {
        return $this->_creditmemoCollectionFactory->create()->count();
    }
}
