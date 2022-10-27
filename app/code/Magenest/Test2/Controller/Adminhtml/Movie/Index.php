<?php

namespace Magenest\Test2\Controller\Adminhtml\Movie;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Index extends Action
{
    /**
     * @var bool|PageFactory
     */
    protected $resultPageFactory = false;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context     $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();   //tao giao dien layout
        $resultPage->getConfig()->getTitle()->prepend((__('Magenest Movie')));
        return $resultPage;
    }

}
