<?php

namespace Magenest\CustomizeAdminhtml\Plugin\Admin\Order;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Magento\Sales\Model\ResourceModel\Order\Grid\Collection;
use Magento\User\Model\ResourceModel\User\Collection as UserCollection;

class Grid extends \Magento\Framework\Data\Collection
{
    /**
     * @var ResourceConnection
     */
    protected $coreResource;
    /**
     * @var UserCollection
     */
    protected $adminUsers;

    /**
     * @param EntityFactoryInterface $entityFactory
     * @param ResourceConnection $coreResource
     * @param UserCollection $adminUsers
     */
    public function __construct(
        EntityFactoryInterface $entityFactory,
        ResourceConnection     $coreResource,
        UserCollection         $adminUsers
    )
    {
        parent::__construct($entityFactory);
        $this->coreResource = $coreResource;
        $this->adminUsers = $adminUsers;
    }

    public function beforeLoad($printQuery = false, $logQuery = false)
    {
        if ($printQuery instanceof Collection) {
            $collection = $printQuery;

            $joined_tables = array_keys(
                $collection->getSelect()->getPart('from')
            );

            $collection->getSelect()
                ->columns(
                    array(
                        'name' => new \Zend_Db_Expr('(SELECT GROUP_CONCAT(`name` SEPARATOR " & ") FROM `sales_order_item` WHERE `sales_order_item`.`order_id` = main_table.`entity_id` GROUP BY `sales_order_item`.`order_id`)')
                    )
                );

        }
    }
}
