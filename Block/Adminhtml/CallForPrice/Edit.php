<?php

namespace Adorncommerce\CallForPrice\Block\Adminhtml\CallForPrice;

/**
 * Class Edit
 * @package Adorncommerce\CallForPrice\Block\Adminhtml\CallForPrice
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * @var \Magento\Framework\Registry|null
     */
    protected $_coreRegistry = null;

    /**
     * Edit constructor.
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Adorncommerce_CallForPrice';
        $this->_controller = 'adminhtml_CallForPrice';

        parent::_construct();

        if ($this->_isAllowedAction('Adorncommerce_CallForPrice::save')) {
            $this->buttonList->update('save', 'label', __('Save Request'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

        if ($this->_isAllowedAction('Adorncommerce_CallForPrice::delete')) {
            $this->buttonList->update('delete', 'label', __('Delete Request'));
        } else {
            $this->buttonList->remove('delete');
        }

        if ($this->_coreRegistry->registry('callforprice')->getId()) {
            $this->buttonList->remove('reset');

        }
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
