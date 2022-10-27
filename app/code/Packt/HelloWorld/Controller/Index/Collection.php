<?php

namespace Packt\HelloWorld\Controller\Index;
class Collection extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect([
                'name',
                'price',
                'image',
            ])
//            ->addAttributeToFilter('name', 'Overnight Duffleang');
//            ->setPageSize(10, 1); //lọc 10 size trên 1 trang
//            ->addAttributeToFilter('entity_id', array('in' => array(159, 160, 161)));
            ->addAttributeToFilter('name', array('like' => '%Sport%'));

        $output = $productCollection->getSelect()->__toString();
        foreach ($productCollection as $product) {
            $output .= var_dump($product->debug());
        }
        $this->getResponse()->setBody($output);
    }
}
