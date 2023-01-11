<?php

namespace Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice;

/**
 * Class Inline
 * @package Adorncommerce\CallForPrice\Controller\Adminhtml\CallForPrice
 */
class Inline extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;
    /**
     * @var \Adorncommerce\CallForPrice\Model\CallForPriceFactory
     */
    protected $callForPriceFactory;

    /**
     * Inline constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
     * @param \Adorncommerce\CallForPrice\Model\CallForPriceFactory $callForPriceFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Adorncommerce\CallForPrice\Model\CallForPriceFactory $callForPriceFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->callForPriceFactory = $callForPriceFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items');
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $modelid) {
                    /** @var \Magento\Cms\Model\Block $block */
                    $model = $this->callForPriceFactory->create()->load($modelid);
                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$modelid]));
                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = "[Mytesting ID: {$modelid}]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
