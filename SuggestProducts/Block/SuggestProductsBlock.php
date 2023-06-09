<?php

namespace Trung\SuggestProducts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\ResourceConnection;
use Magento\Checkout\Model\Cart;
use Magento\Catalog\Model\Product;
use Magento\Framework\Data\Form\FormKey;
use Magento\Catalog\Block\Product\ListProduct;
use Trung\SuggestProducts\Model\Product\Link;

class SuggestProductsBlock extends Template
{
    protected $resourceConnection;
    protected $cart;
    protected $product;
    // 
    protected $formKey;
    protected $urlBuilder;
    protected $listProduct;
    private $link;

    public function __construct(
        Context $context,
        ResourceConnection $resourceConnection,
        Cart $cart,
        Product $product,
        FormKey $formKey,
        ListProduct $listProduct,
        Link $link,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->resourceConnection = $resourceConnection;
        $this->cart = $cart;
        $this->product = $product;
        $this->urlBuilder = $urlBuilder;
        $this->formKey = $formKey;
        $this->listProduct = $listProduct;
        $this->link = $link;
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

    public function AddToCart($product){
        return $this->listProduct->getAddToCartUrl($product);
    }

    public function getProductsData($id)
    {
        $productId = '';
        $link_type = $this->link::LINK_TYPE_CUSTOMLINKED;
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('catalog_product_link');

        $sql = "SELECT * FROM $tableName WHERE `product_id` = $id AND (`link_id` = $link_type OR `product_id` = $link_type OR `linked_product_id` = $link_type OR `link_type_id` = $link_type) LIMIT 1";

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
