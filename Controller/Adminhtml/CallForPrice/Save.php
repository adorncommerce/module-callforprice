<?php

namespace Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice;

use Magento\Backend\App\Action;
use Magento\Framework\Model;

/**
 * Class Save
 * @package Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice\
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Adorncommerce\CallForPrice\Model\CallForPrice
     */
    protected $model;
    /**
     * @var $session
     */
    protected $session;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param \Adorncommerce\CallForPrice\Model\CallForPrice $model
     * @param \Magento\Backend\Model\Session $session
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Adorncommerce\CallForPrice\Model\CallForPrice $model,
        \Magento\Backend\Model\Session $session
    ) {
        $this->model = $model;
        $this->session = $session;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Adorncommerce_CallForPrice::save');
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $this->model->load($id);
            }
            try {
                $this->model
                        ->setCustomerName($data['customer_name'])
                        ->setCustomerEmail($data['customer_email'])
                        ->setStatus($data['status']);
                $this->model->save();
                $this->messageManager->addSuccess(__('You saved this item.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $this->model->getId(), '_current' => true]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the item.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
