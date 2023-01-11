<?php

namespace Adorncommerce\CallForPrice\Model\Config\Source;

/**
 * Class Status
 * @package Adorncommerce\CallForPrice\Model\Config\Source
 */
class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Adorncommerce\CallForPrice\Model\CallForPrice
     */
    protected $_grid;

    /**
     * Status constructor.
     * @param \Adorncommerce\CallForPrice\Model\CallForPrice $callForPrice
     */
    public function __construct(\Adorncommerce\CallForPrice\Model\CallForPrice $callForPrice)
    {
        $this->_grid = $callForPrice;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_grid->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
