<?php

namespace Magenest\Test2\Controller\Adminhtml\Form;

use Magento\Backend\App\Action\Context;
use Magenest\Test2\Model\MovieFactory;
use Magento\Backend\App\Action;

class Save extends Action
{
    /**
     * @var MovieFactory
     */
    protected $movieFactory;

    /**
     * @param Context $context
     * @param MovieFactory $MovieFactory
     */
    public function __construct(
        Context      $context,
        MovieFactory $MovieFactory
    )
    {
        parent::__construct($context);
        $this->movieFactory = $MovieFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();    //nhap form xong gui di
        try {
            $model = $this->movieFactory->create();
            $model->addData([
                "name" => $data['name'],
                "description" => $data['description'],
                "rating" => $data['rating'],
                "director_id" => $data['director_id'],
            ]);
//            $this->_eventManager->dispatch('movie_save_before', ['magenest_movie' => $model]);  //events
            $saveData = $model->save();
            if ($saveData) {
                $this->messageManager->addSuccess(__('Insert data Successfully !'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('backend/movie/index');
    }
}
