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


    public function getId();
    public function getCustomerName();
    public function getCustomerEmail();
    public function getCustomerId();
    public function getCustomerTelephone();
    public function getProductId();
    public function getProductName();
    public function getStatus();
    public function getQty();
    public function getComment();


    public function setId($id);
    public function setCustomerName($customername);
    public function setCustomerEmail($customeremail);
    public function setCustomerId($customerid);
    public function setCustomerTelephone($customertelephone);
    public function setProductId($productid);
    public function setProductName($productname);
    public function setStatus($status);
    public function setQty($qty);
    public function setComment($comment);

}
