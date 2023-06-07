<?php

namespace Trung\SuggestProducts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\ResourceConnection;

class SuggestProductsBlock extends Template
{
    protected $resourceConnection;

    public function __construct(
        Context $context,
        ResourceConnection $resourceConnection,
        array $data = []
    ) {
        $this->resourceConnection = $resourceConnection;
        parent::__construct($context, $data);
    }

    public function getProductsData($id)
    {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('catalog_product_link');

        // Viết câu lệnh SQL để lấy dữ liệu từ bảng
        $sql = "SELECT * FROM $tableName WHERE (`product_id` = $id AND `link_type_id` = '6') ORDER BY `product_id` LIMIT 1";

        // Thực thi câu lệnh SQL và trả về kết quả
        $results = $connection->fetchAll($sql);

        foreach ($results as $row) {
            $productId = $row['linked_product_id'];
        }

        return $productId;
    }
}
