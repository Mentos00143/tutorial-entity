<?php


namespace Perspective\TutorialEntity\Block;

use Magento\Catalog\Api\Data\ProductInterface;

class EntityResource extends \Magento\Framework\View\Element\Template
{
    protected $_productFactory;

    protected $_productResource;

    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Model\ResourceModel\Product $productResource,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->_productFactory = $productFactory;
        $this->_productResource = $productResource;
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductById($productId)
    {
        if (is_null($productId)) {
            return null;
        }

        $productModel = $this->_productFactory->create();
        $this->_productResource->load($productModel, $productId);

        return $productModel;
    }

    public function getCheapProducts ($price)
    {
        if (is_null($price)) {
            return [];
        }

        $productCollection = $this->_productCollectionFactory->create();
        $productCollection->addAttributeToSelect('*')
            ->addAttributeToFilter(ProductInterface::PRICE, ['lt'=>$price])
            ->load();

        return $productCollection->getItems();
    }
}
