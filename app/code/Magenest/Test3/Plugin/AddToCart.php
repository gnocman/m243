<?php

namespace Magenest\Test3\Plugin;

use Magento\Catalog\Model\ProductFactory;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;
use Magento\Checkout\Model\Cart;

class AddToCart
{
    /**
     * @var Configurable
     */
    protected $configurableproduct;

    /**
     * @var ProductFactory
     */
    protected $product;

    /**
     * @param Configurable $configurableproduct
     * @param ProductFactory $productFactory
     */
    public function __construct(
        Configurable   $configurableproduct,
        ProductFactory $productFactory
    )
    {
        $this->configurableproduct = $configurableproduct;
        $this->product = $productFactory;
    }

    /**
     * @param Cart $subject
     * @param $productInfo
     * @param $requestInfo
     * @return array
     */
    public function beforeAddProduct(Cart $subject, $productInfo, $requestInfo)
    {
        $data = $productInfo->getTypeId(); // == getData('type_id');

        if ($data == 'configurable') {
            $attributes = $requestInfo['super_attribute'];
            $product = $this->product->create()->load($productInfo->getId());
            $new_product = $this->configurableproduct->getProductByAttributes($attributes, $product);
        } else {
            return [$productInfo, $requestInfo];
        }
        return [$new_product, $requestInfo];
    }
}
