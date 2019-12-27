<?php
namespace Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice
 */
class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Adorncommerce_CallForPrice::callforprice';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context,PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Adorncommerce_CallForPrice::callforprice');
        $resultPage->addBreadcrumb(__('Call For Price'), __('Call For Price'));
        $resultPage->getConfig()->getTitle()->prepend(__('Call For Price'));

        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}