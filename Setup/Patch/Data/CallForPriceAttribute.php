<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adorncommerce\CallForPrice\Setup\Patch\Data;

use Magento\Catalog\Ui\DataProvider\Product\ProductCollectionFactory;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Psr\Log\LoggerInterface;

/**
 * Class CallForPriceAttribute for Create Product Attribute using Data Patch.
 */
class CallForPriceAttribute implements DataPatchInterface, PatchRevertableInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @var ProductCollectionFactory
     */
    private $productCollectionFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var \Magento\Customer\Model\ResourceModel\Attribute
     */
    private $attributeResource;

    /**
     * CustomerAttribute Constructor
     * @param EavSetupFactory $eavSetupFactory
     * @param Config $eavConfig
     * @param LoggerInterface $logger
     * @param \Magento\Customer\Model\ResourceModel\Attribute $attributeResource
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig,
        LoggerInterface $logger,
        \Magento\Customer\Model\ResourceModel\Attribute $attributeResource,
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->logger = $logger;
        $this->attributeResource = $attributeResource;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Apply Function
     *
     * @return CallForPriceAttribute|void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Zend_Validate_Exception
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->addCallForPriceAttribute();
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * AddCallForPriceAttribute Function
     *
     * @return void
     */
    public function addCallForPriceAttribute()
    {
        $eavSetup = $this->eavSetupFactory->create();
        /*$eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'call_for_price_active');*/
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'call_for_price_active',
            [
                'group' => 'Product Details',
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Call for Price',
                'input' => 'boolean',
                'class' => '',
                'source' => Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => 0,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false
            ]
        );
    }

    /**
     * GetDependencies
     *
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Revert
     *
     * @return void
     */
    public function revert()
    {
    }

    /**
     * GetAliases
     *
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
