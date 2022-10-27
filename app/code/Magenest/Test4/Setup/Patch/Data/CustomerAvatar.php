<?php

namespace Magenest\Test4\Setup\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class CustomerAvatar implements DataPatchInterface
{
    /**
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * @var ModuleDataSetupInterface
     */
    private $setup;

    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * AccountPurposeCustomerAttribute constructor.
     * @param ModuleDataSetupInterface $setup
     * @param Config $eavConfig
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $setup,
        Config                   $eavConfig,
        CustomerSetupFactory     $customerSetupFactory
    )
    {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->setup = $setup;
        $this->eavConfig = $eavConfig;
    }

    /** We'll add our customer attribute here */
    public function apply()
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $this->setup]);
        $customerEntity = $customerSetup->getEavConfig()->getEntityType(Customer::ENTITY);
        $attributeSetId = $customerSetup->getDefaultAttributeSetId($customerEntity->getEntityTypeId());
        $attributeGroup = $customerSetup->getDefaultAttributeGroupId($customerEntity->getEntityTypeId(), $attributeSetId);
        $customerSetup->addAttribute(Customer::ENTITY, 'new_attribute',
            [
                'type' => 'text',
                'label' => 'Avatar',
                'input' => 'file',
                'source' => '',
                'required' => false,
                'visible' => true,
                'position' => 200,
                'system' => false,
                'backend' => ''
            ]);
        $newAttribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'new_attribute');
        $newAttribute->addData(
            ['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit'
            ]
            ]);
        $newAttribute->save();
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
