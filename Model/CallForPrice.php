<?php
namespace Adorncommerce\CallForPrice\Model;

use Magento\Framework\DataObject\IdentityInterface;

/**
 * Class CallForPrice
 * @package Adorncommerce\CallForPrice\Model
 */
class CallForPrice extends \Magento\Framework\Model\AbstractModel implements \Adorncommerce\CallForPrice\Api\Data\CallForPriceInterface, IdentityInterface
{
    const STATUS_NEW = 1;

    const STATUS_COMPLETED = 2;
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'callforprice';

    /**
     * @var string
     */
    protected $_cacheTag = 'callforprice';
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'callforprice';


    function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Adorncommerce\CallForPrice\Model\ResourceModel\CallForPrice');
    }

    /**
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_NEW => __('New'), self::STATUS_COMPLETED => __('Completed')];
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }
    public function getCustomerName()
    {
        return $this->getData(self::CUSTOMER_NAME);
    }
    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }
    public function getCustomerTelephone()
    {
        return $this->getData(self::CUSTOMER_TELEPHONE);
    }
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }
    public function getProductName()
    {
        return $this->getData(self::PRODUCT_NAME);
    }
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }
    public function getQty()
    {
        return $this->getData(self::QTY);
    }
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }


    public function setId($id)
    {
        return $this->setData(self::ID,$id);
    }
    public function setCustomerName($customername)
    {
        return $this->setData(self::CUSTOMER_NAME , $customername);
    }
    public function setCustomerEmail($customeremail)
    {
        return $this->setData(self::CUSTOMER_EMAIL,$customeremail);
    }
    public function setCustomerId($customerid)
    {
        return $this->setData(self::CUSTOMER_ID,$customerid);
    }
    public function setCustomerTelephone($customertelephone)
    {
        return $this->setData(self::CUSTOMER_TELEPHONE,$customertelephone);
    }
    public function setProductId($productid)
    {
        return $this->setData(self::PRODUCT_ID,$productid);
    }
    public function setProductName($productname)
    {
        return $this->setData(self::PRODUCT_NAME,$productname);
    }
    public function setStatus($status)
    {
        return $this->setData(self::STATUS,$status);
    }
    public function setQty($qty)
    {
        return $this->setData(self::QTY,$qty);
    }
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT,$comment);
    }
}
