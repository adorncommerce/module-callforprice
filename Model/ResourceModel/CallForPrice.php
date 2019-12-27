<?php
namespace Adorncommerce\CallForPrice\Model\ResourceModel;
/**
 * Class CallForPrice
 * @package Adorncommerce\CallForPrice\Model\ResourceModel
 */
class CallForPrice extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var $_blockGridTable
     */
    protected $_blockGridTable;

    /**
     * CallForPrice constructor.
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param null $resourcePrefix
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('callforprice_request', 'id');
    }

}
