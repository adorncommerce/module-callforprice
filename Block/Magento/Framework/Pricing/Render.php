<?php
namespace Adorncommerce\CallForPrice\Block\Magento\Framework\Pricing;

use Magento\Framework\Pricing\SaleableInterface;
use Magento\Framework\Pricing\Render\Layout;
use Magento\Framework\View\Element\Template;
use Adorncommerce\CallForPrice\Helper\Data;

/**
 * Class Render
 * @package Adorncommerce\CallForPrice\Block\Magento\Framework\Pricing
 */
class Render extends \Magento\Framework\Pricing\Render
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;
    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * Render constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param Layout $priceLayout
     * @param array $data
     */
    public function __construct(Template\Context $context, \Magento\Framework\Registry $registry, Layout $priceLayout, Data $dataHelper, array $data)
    {
        $this->_registry = $registry;
        $this->dataHelper = $dataHelper;
        parent::__construct($context, $priceLayout, $data);
    }

    /**
     * @param string $priceCode
     * @param SaleableInterface $saleableItem
     * @param array $arguments
     * @return string
     */
    public function render($priceCode, SaleableInterface $saleableItem, array $arguments = [])
    {
        if ($this->dataHelper->isModuleOutputDisabled() || !$this->dataHelper->isAvailableForCustomer()) {
            return parent::render($priceCode, $saleableItem, $arguments);
        }
        if ($this->_registry->registry('current_product')) {
            $CurrentProduct = $this->_registry->registry('current_product');
            if ($CurrentProduct->getData('call_for_price_active')) {
                return '';
            } else {
                return parent::render($priceCode, $saleableItem, $arguments);
            }
        } else {
            return parent::render($priceCode, $saleableItem, $arguments);
        }
    }
}
