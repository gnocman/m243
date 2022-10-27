<?php

namespace Magenest\DatabaseEAV\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magenest\DatabaseEAV\Model\ResourceModel\Blog\CollectionFactory;
use Magenest\DatabaseEAV\Model\BlogFactory;

class MassDelete extends Action
{
    /**
     * @var BlogFactory
     */
    public $blogFactory;
    /**
     * @var CollectionFactory
     */
    public $collectionFactory;
    /**
     * @var Filter
     */
    public $filter;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param BlogFactory $blogFactory
     */
    public function __construct(
        Context           $context,
        Filter            $filter,
        CollectionFactory $collectionFactory,
        BlogFactory      $blogFactory
    )
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->blogFactory = $blogFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());

            $count = 0;
            foreach ($collection as $model) {
                $model = $this->blogFactory->create()->load($model->getBlogId());
                $model->delete();
                $count++;
            }
            $this->messageManager->addSuccess(__('A total of %1 blog(s) have been deleted.', $count));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('backend/blog/index');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Vendor_Module::delete');   //acl
    }
}
