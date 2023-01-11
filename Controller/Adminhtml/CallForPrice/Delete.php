<?php
namespace Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice;

use Magento\Backend\App\Action;

/**
 * Class Delete
 * @package Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice
 */
class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \Adorncommerce\CallForPrice\Model\CallForPriceFactory
     */
    protected $callForPriceFactory;

    /**
     * @param Action\Context $context
     * @param \Adorncommerce\CallForPrice\Model\CallForPriceFactory $callForPriceFactory
     */
    public function __construct(Action\Context $context, \Adorncommerce\CallForPrice\Model\CallForPriceFactory $callForPriceFactory)
    {
        $this->callForPriceFactory = $callForPriceFactory;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Adorncommerce_CallForPrice::delete');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->callForPriceFactory->create();
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The item has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a item to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
