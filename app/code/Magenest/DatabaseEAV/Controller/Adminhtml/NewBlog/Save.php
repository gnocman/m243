<?php

namespace Magenest\DatabaseEAV\Controller\Adminhtml\NewBlog;

use Magento\Backend\App\Action\Context;
use Magenest\DatabaseEAV\Model\BlogFactory;
use Magento\Backend\App\Action;
use Magento\UrlRewrite\Model\UrlRewrite;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Magenest\DatabaseEAV\Model\ResourceModel\Blog;

class Save extends Action
{
    /**
     * @var UrlRewriteFactory
     */
    protected $_urlRewriteFactory;
    /**
     * @var Blog
     */
    protected $_resourceBlog;
    /**
     * @var UrlRewrite
     */
    protected $_urlRewrite;
    /**
     * @var BlogFactory
     */
    protected $blogFactory;

    /**
     * @param UrlRewrite $urlRewrite
     * @param Context $context
     * @param BlogFactory $BlogFactory
     * @param UrlRewriteFactory $urlRewriteFactory
     * @param Blog $resourceBlog
     */
    public function __construct(
        UrlRewrite        $urlRewrite,
        Context           $context,
        BlogFactory       $BlogFactory,
        UrlRewriteFactory $urlRewriteFactory,
        Blog              $resourceBlog

    )
    {
        parent::__construct($context);
        $this->_urlRewrite = $urlRewrite;
        $this->blogFactory = $BlogFactory;
        $this->_urlRewriteFactory = $urlRewriteFactory;
        $this->_resourceBlog = $resourceBlog;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        try {
            $model = $this->blogFactory->create();
//            $model->setData('title', $data['title']);
//            $model->setTitle($data['title']);
            $model->addData([
                "title" => $data['title'],
                "description" => $data['description'],
                "content" => $data['content'],
                "url_rewrite" => $data['url_rewrite'],
                "status" => $data['status'],
                "created_at" => $data['created_at'],
                "update_at" => $data['update_at'],
                "author_id" => $data['author_id'],
            ]);
//            //cach 1
//            $model->save();
            //cach 2
            $this->_resourceBlog->save($model);

            $this->messageManager->addSuccess(__('Insert data Successfully !'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('backend/blog/index');
    }
}
