<?php
namespace Seku\Tasks\Model\ResourceModel\Task;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Seku\Tasks\Model\Task',
            'Seku\Tasks\Model\ResourceModel\Task'
        );
    }
}