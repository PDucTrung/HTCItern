<?php

namespace Trung\SuggestProducts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\ResourceConnection;
use Magento\Checkout\Model\Cart;
use Magento\Catalog\Model\Product;
use Magento\Framework\Data\Form\FormKey;

class SuggestProductsBlock extends Template
{
    protected $resourceConnection;
    protected $cart;
    protected $product;
    // 
    protected $formKey;
    protected $urlBuilder;

    public function __construct(
        Context $context,
        ResourceConnection $resourceConnection,
        Cart $cart,
        Product $product,
        FormKey $formKey,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->resourceConnection = $resourceConnection;
        $this->cart = $cart;
        $this->product = $product;
        $this->urlBuilder = $urlBuilder;
        $this->formKey = $formKey;
        parent::__construct($context, $data);
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    public function getCartItems()
    {
        return $this->cart->getQuote()->getAllVisibleItems();
    }

    public function getProductById($id)
    {
        return $this->product->load($id);
    }

    public function getProductsData($id)
    {
        $productId = '';
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('catalog_product_link');

        $sql = "SELECT * FROM $tableName WHERE (`product_id` = $id AND `link_type_id` = '6') ORDER BY `product_id` LIMIT 1";

        $results = $connection->fetchAll($sql);

        foreach ($results as $row) {
            $productId = $row['linked_product_id'];
        }

        return $productId;
    }

    public function getCheckoutUrl()
    {
        return $this->urlBuilder->getUrl('checkout/index/index');
    }
}
