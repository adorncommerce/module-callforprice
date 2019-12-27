<?php

namespace Adorncommerce\CallForPrice\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('callforprice_request')) {
            try {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('callforprice_request')
                )
                    ->addColumn(
                        'id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary' => true,
                            'unsigned' => true,
                        ],
                        'Id'
                    )
                    ->addColumn(
                        'customer_name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Customer Name'
                    )
                    ->addColumn(
                        'customer_email',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Customer Email'
                    )
                    ->addColumn(
                        'customer_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        255,
                        [
                            'nullable' => false,
                            'unsigned' => true
                        ],
                        'Customer Id'
                    )
                    ->addColumn(
                        'customer_telephone',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Customer Telephone'
                    )
                    ->addColumn(
                        'product_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        255,
                        [
                            'nullable' => true,
                            'unsigned' => false
                        ],
                        'Product Id'
                    )
                    ->addColumn(
                        'product_name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Product Name'
                    )
                    ->addColumn(
                        'status',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Status'
                    )
                    ->addColumn(
                        'qty',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        255,
                        [
                            'nullable' => true
                        ],
                        'Qty'
                    )
                    ->setComment('CallForPrice Request');
                $installer->getConnection()->createTable($table);
            } catch (\Exception $e) {
                $this->logger->info($e);
            }
        }
        $installer->endSetup();
    }
}