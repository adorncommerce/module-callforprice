<?php
namespace Adorncommerce\CallForPrice\Block;
/**
 * Class CallForPrice
 * @package Adorncommerce\CallForPrice\Block
 */
class CallForPrice extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;
    /**
     * @var \Magento\Catalog\Block\Product\View
     */
    protected $_registry;
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $customerRepository;
    /**
     * @var \Magento\Customer\Api\AddressRepositoryInterface
     */
    protected $addressRepository;


    /**
     * CallForPrice constructor.
     * @param \Magento\Catalog\Block\Product\View $productcollections
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
     * @param \Magento\Customer\Api\AddressRepositoryInterface $addressRepository
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param array $data
     */
     public function __construct(
         \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
         \Magento\Customer\Api\AddressRepositoryInterface $addressRepository,
         \Magento\Framework\Registry $registry,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\SessionFactory $customerSession,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->addressRepository = $addressRepository;
        $this->customerRepository = $customerRepository;
        $this->customerSession = $customerSession;
        $this->_registry = $registry;
    }

    /**
     * @return \Magento\Customer\Model\Customer
     */
    public function getCustomerData(){

         if($this->customerSession->create()->isLoggedIn()){
             return $this->customerSession->create()->getCustomer();
         }
    }
    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }
}