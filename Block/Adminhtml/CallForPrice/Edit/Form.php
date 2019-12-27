<?php

namespace Adorncommerce\CallForPrice\Block\Adminhtml\CallForPrice\Edit;

/**
 * Class Form
 * @package Adorncommerce\CallForPrice\Block\Adminhtml\CallForPrice\Edit
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    /**
     * @var $_formFactory
     */
    protected $_formFactory;
    /**
     * @var \Adorncommerce\CallForPrice\Model\Config\Source\Status
     */
    protected $_status;

    /**
     * Form constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param \Adorncommerce\CallForPrice\Model\Config\Source\Status $status
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Adorncommerce\CallForPrice\Model\Config\Source\Status $status,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return \Magento\Backend\Block\Widget\Form\Generic
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('callforprice');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form',
                        'action' => $this->getData('action'),
                        'method' => 'post',
                        'enctype'=>"multipart/form-data"]
            ]);

        $form->setHtmlIdPrefix('callforprice_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            [   'legend' => __('General Information'),
                'class' => 'fieldset-wide',
                'collapsable' => false]
        );

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldset->addField(
            'customer_name',
            'text',
            ['name' => 'customer_name', 'label' => __('Customer Name'), 'title' => __('Customer Name'), 'required' => false]
        );

        $fieldset->addField(
            'customer_email',
            'text',
            ['name' => 'customer_email', 'label' => __('Customer Email'), 'title' => __('Customer Email'), 'required' => false]
        );
        $fieldset->addField(
            'product_name',
            'textarea',
            ['name' => 'product_name', 'label' => __('Request Details'), 'title' => __('Request Details'), 'readonly' => true,'required' => false]
        );
        $fieldset->addField(
            'qty',
            'text',
            ['name' => 'qty', 'label' => __('Qty Needed'), 'title' => __('Qty Needed'), 'required' => false,'readonly' => true]
        );
        $fieldset->addField(
            'status',
            'select',
            ['name' => 'status', 'label' => __('status'), 'title' => __('status'),'values' => $this->_status->toOptionArray(), 'required' => false]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}