<?php

namespace Magenest\Test4\Block\Customer;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\UrlInterface;
use Magento\Customer\Model\SessionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Customer\Model\Customer;

class Account extends Template
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var Customer
     */
    protected $customerModel;

    /**
     * @param Context $context
     * @param UrlInterface $urlBuilder
     * @param SessionFactory $customerSession
     * @param StoreManagerInterface $storeManager
     * @param Customer $customerModel
     * @param array $data
     */
    public function __construct(
        Context               $context,
        UrlInterface          $urlBuilder,
        SessionFactory        $customerSession,
        StoreManagerInterface $storeManager,
        Customer              $customerModel,
        array                 $data = []
    )
    {
        $this->urlBuilder = $urlBuilder;
        $this->customerSession = $customerSession->create();
        $this->storeManager = $storeManager;
        $this->customerModel = $customerModel;

        parent::__construct($context, $data);

        $collection = $this->getContracts();
        $this->setCollection($collection);
    }

    public function getBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl();
    }

    public function getMediaUrl()
    {
        return $this->getBaseUrl() . 'pub/media/';
    }

    public function getCustomerImageUrl($filePath)
    {
        return $this->getMediaUrl() . 'customer' . $filePath;
    }

    public function getFileUrl()
    {
        $customerData = $this->customerModel->load($this->customerSession->getId());    //lay ra du lieu ra FE
        $url = $customerData->getData('new_attribute');           //chon key new_attribute de lay dung anh
        if (!empty($url)) {
            return $this->getCustomerImageUrl($url);
        }
        return false;
    }
}
