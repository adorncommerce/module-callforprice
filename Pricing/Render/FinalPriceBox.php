<?php

namespace Adorncommerce\CallForPrice\Pricing\Render;

use Magento\Catalog\Model\Product\Pricing\Renderer\SalableResolverInterface;
use Magento\Catalog\Pricing\Price\MinimalPriceCalculatorInterface;
use Magento\Framework\Pricing\Price\PriceInterface;
use Magento\Framework\Pricing\Render\RendererPool;
use Magento\Framework\Pricing\SaleableInterface;
use Magento\Framework\View\Element\Template\Context;

class FinalPriceBox extends \Magento\Catalog\Pricing\Render\FinalPriceBox
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;
    /**
     * @var \Adorncommerce\CallForPrice\Helper\Data
     */
    protected $helperData;

    /**
     * @param Context $context
     * @param SaleableInterface $saleableItem
     * @param PriceInterface $price
     * @param RendererPool $rendererPool
     * @param SalableResolverInterface|null $salableResolver
     * @param MinimalPriceCalculatorInterface|null $minimalPriceCalculator
     * @param \Magento\Framework\Registry $registry
     * @param \Adorncommerce\CallForPrice\Helper\Data $helperData
     * @param array $data
     */
    public function __construct(
        Context $context,
        SaleableInterface $saleableItem,
        PriceInterface $price,
        RendererPool $rendererPool,
        SalableResolverInterface $salableResolver = null,
        MinimalPriceCalculatorInterface $minimalPriceCalculator = null,
        \Magento\Framework\Registry $registry,
        \Adorncommerce\CallForPrice\Helper\Data $helperData,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->helperData = $helperData;
        parent::__construct($context, $saleableItem, $price, $rendererPool, $data, $salableResolver, $minimalPriceCalculator);
    }

    /**
     * @param $html
     * @return string
     */
    protected function wrapResult($html)
    {
        $current_product = $this->registry->registry('current_product');
        if ($current_product) {
            if ($this->helperData->isEnable($current_product->getData('call_for_price_active')) || ($this->helperData->isEnableForZeroPrice() && ($current_product->getFinalPrice()==0))) {
                $result = '';
            } else {
                $result = parent::wrapResult($html);
            }
        } else {
            $result = parent::wrapResult($html);
        }
        return $result;
    }
}
