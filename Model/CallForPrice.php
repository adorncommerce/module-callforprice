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

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param array $data
     */
    function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
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

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array|mixed|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @return array|mixed|null
     */
    public function getCustomerName()
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * @return array|mixed|null
     */
    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    /**
     * @return array|mixed|null
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * @return array|mixed|null
     */
    public function getCustomerTelephone()
    {
        return $this->getData(self::CUSTOMER_TELEPHONE);
    }

    /**
     * @return array|mixed|null
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * @return array|mixed|null
     */
    public function getProductName()
    {
        return $this->getData(self::PRODUCT_NAME);
    }

    /**
     * @return array|mixed|null
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @return array|mixed|null
     */
    public function getQty()
    {
        return $this->getData(self::QTY);
    }

    /**
     * @return array|mixed|null
     */
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    /**
     * @param $id
     * @return CallForPrice|mixed
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @param $customername
     * @return CallForPrice|mixed
     */
    public function setCustomerName($customername)
    {
        return $this->setData(self::CUSTOMER_NAME, $customername);
    }

    /**
     * @param $customeremail
     * @return CallForPrice|mixed
     */
    public function setCustomerEmail($customeremail)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customeremail);
    }

    /**
     * @param $customerid
     * @return CallForPrice|mixed
     */
    public function setCustomerId($customerid)
    {
        return $this->setData(self::CUSTOMER_ID, $customerid);
    }

    /**
     * @param $customertelephone
     * @return CallForPrice|mixed
     */
    public function setCustomerTelephone($customertelephone)
    {
        return $this->setData(self::CUSTOMER_TELEPHONE, $customertelephone);
    }

    /**
     * @param $productid
     * @return CallForPrice|mixed
     */
    public function setProductId($productid)
    {
        return $this->setData(self::PRODUCT_ID, $productid);
    }

    /**
     * @param $productname
     * @return CallForPrice|mixed
     */
    public function setProductName($productname)
    {
        return $this->setData(self::PRODUCT_NAME, $productname);
    }

    /**
     * @param $status
     * @return CallForPrice|mixed
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @param $qty
     * @return CallForPrice|mixed
     */
    public function setQty($qty)
    {
        return $this->setData(self::QTY, $qty);
    }

    /**
     * @param $comment
     * @return CallForPrice|mixed
     */
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }
}
