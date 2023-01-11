<?php

namespace Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice;

use Magento\Backend\App\Action;

/**
 * Class Edit
 * @package Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice
 */
class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry|null
     */
    protected $_coreRegistry = null;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var \Adorncommerce\CallForPrice\Model\CallForPriceFactory
     */
    protected $callForPriceFactory;

    /**
     * Edit constructor.
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     * @param \Adorncommerce\CallForPrice\Model\CallForPriceFactory $callForPriceFactory
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Adorncommerce\CallForPrice\Model\CallForPriceFactory $callForPriceFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->callForPriceFactory = $callForPriceFactory;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Adorncommerce_CallForPrice::save');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Adorncommerce_CallForPrice::callforprice')
            ->addBreadcrumb(__('Call For Price'), __('Call For Price'));
        return $resultPage;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->callForPriceFactory->create();
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');

            }
        }
        $this->_coreRegistry->register('callforprice', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            __('Edit Grid'),
            __('Edit Grid')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Call For Price'));
        $resultPage->getConfig()->getTitle()
            ->prepend(__('Edit Item ' . $id));

        return $resultPage;
    }
}
