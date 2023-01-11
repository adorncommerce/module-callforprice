<?php

namespace Adorncommerce\CallForPrice\ViewModel;

class CallForPrice implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @param \Adorncommerce\CallForPrice\Helper\Data $helperData
     */
    public function __construct(
        \Adorncommerce\CallForPrice\Helper\Data $helperData
    )
    {
        $this->helperData = $helperData;
    }

    /**
     * @return \Adorncommerce\CallForPrice\Helper\Data
     */
    public function getHelperData(): \Adorncommerce\CallForPrice\Helper\Data
    {
        return $this->helperData;
    }
}
