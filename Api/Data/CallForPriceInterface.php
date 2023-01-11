<?php

namespace Adorncommerce\CallForPrice\Api\Data;

/**
 * Interface CallForPriceInterface
 * @package Adorncommerce\CallForPrice\Api\Data
 */
interface CallForPriceInterface
{
    const ID = 'id';
    const CUSTOMER_NAME   ='customer_name';
    const CUSTOMER_EMAIL   = 'customer_email';
    const CUSTOMER_ID  = 'customer_id';
    const CUSTOMER_TELEPHONE    ='customer_telephone';
    const PRODUCT_ID        = 'product_id';
    const PRODUCT_NAME      = 'product_name';
    const STATUS    = 'status';
    const QTY = 'qty';
    const COMMENT = 'comment';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getCustomerName();

    /**
     * @return mixed
     */
    public function getCustomerEmail();

    /**
     * @return mixed
     */
    public function getCustomerId();

    /**
     * @return mixed
     */
    public function getCustomerTelephone();

    /**
     * @return mixed
     */
    public function getProductId();

    /**
     * @return mixed
     */
    public function getProductName();

    /**
     * @return mixed
     */
    public function getStatus();

    /**
     * @return mixed
     */
    public function getQty();

    /**
     * @return mixed
     */
    public function getComment();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param $customername
     * @return mixed
     */
    public function setCustomerName($customername);

    /**
     * @param $customeremail
     * @return mixed
     */
    public function setCustomerEmail($customeremail);

    /**
     * @param $customerid
     * @return mixed
     */
    public function setCustomerId($customerid);

    /**
     * @param $customertelephone
     * @return mixed
     */
    public function setCustomerTelephone($customertelephone);

    /**
     * @param $productid
     * @return mixed
     */
    public function setProductId($productid);

    /**
     * @param $productname
     * @return mixed
     */
    public function setProductName($productname);

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status);

    /**
     * @param $qty
     * @return mixed
     */
    public function setQty($qty);

    /**
     * @param $comment
     * @return mixed
     */
    public function setComment($comment);
}
