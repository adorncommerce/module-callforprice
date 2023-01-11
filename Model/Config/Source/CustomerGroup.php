<?php

namespace Adorncommerce\CallForPrice\Model\Config\Source;

use \Magento\Customer\Model\ResourceModel\Group\Collection;

/**
 * Class CustomerGroup
 * @package Adorncommerce\CallForPrice\Model\Config\Source
 */
class CustomerGroup implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Collection
     */
    protected $_customerGroup;

    protected $_options;

    /**
     * @param Collection $customerGroup
     */
    public function __construct(Collection $customerGroup)
    {
        $this->_customerGroup = $customerGroup;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->_options) {
            $this->_options = $this->_customerGroup->toOptionArray();
        }
        return $this->_options;
    }
}
