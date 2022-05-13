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
    protected $registry;

    protected $helperData;

    public function __construct(
        \Magento\Framework\Registry $registry,
        \Adorncommerce\CallForPrice\Helper\Data $helperData,
        Context $context,
        SaleableInterface $saleableItem,
        PriceInterface $price,
        RendererPool $rendererPool,
        array $data = [],
        SalableResolverInterface $salableResolver = null,
        MinimalPriceCalculatorInterface $minimalPriceCalculator = null
    ) {
        $this->registry = $registry;
        $this->helperData = $helperData;
        parent::__construct($context, $saleableItem, $price, $rendererPool, $data, $salableResolver, $minimalPriceCalculator);
    }

    protected function wrapResult($html)
    {
        $current_product = $this->registry->registry('current_product');

        if($current_product)
        {
            if($this->helperData->isEnable($current_product->getData('call_for_price_active'))){
                $result = '';
            }else{
                $result = parent::wrapResult($html);
            }
        }else{
            $result = parent::wrapResult($html);
        }

        return $result;
    }

}
