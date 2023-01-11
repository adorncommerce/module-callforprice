<?php

namespace Adorncommerce\CallForPrice\Block\Adminhtml;

/**
 * Class CallForPrice
 * @package Adorncommerce\CallForPrice\Block\Adminhtml
 */
class CallForPrice extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_callforprice';
        $this->_blockGroup = 'Adorncommerce_CallForPrice';
        $this->_headerText = __('Call For Price');
        parent::_construct();
    }

    /**
     * @param $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
