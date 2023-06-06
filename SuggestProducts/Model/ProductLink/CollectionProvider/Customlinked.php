<?php

namespace Trung\SuggestProducts\Model\ProductLink\CollectionProvider;

class Customlinked
{
    public function getLinkedProducts($product)
    {
        return $product->getCustomlinkedProducts();
    }
}
