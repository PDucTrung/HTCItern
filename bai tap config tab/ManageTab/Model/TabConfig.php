<?php

namespace Trung\ManageTab\Model;

use Magento\Framework\App\ResourceConnection;

class TabConfig
{
    private $connection;

    public function __construct(ResourceConnection $resource)
    {
        $this->connection = $resource->getConnection();
    }

    public function getTabs()
    {
        $tableName = $this->connection->getTableName('trung_managetab_tab');

        $select = $this->connection->select()
            ->from($tableName, ['name', 'content', 'status'])
            ->where('status = ?', 1);

        $tabs = $this->connection->fetchAll($select);

        $result = [];

        foreach ($tabs as $tab) {
            $tabName = $tab['name'];
            $result[$tabName] = [
                'title' => $tab['name'],
                'description' => $tab['content'],
                'sortOrder' => 10
            ];
        }

        return $result;
    }
}
