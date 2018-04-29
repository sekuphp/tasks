<?php
namespace Seku\Tasks\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Task extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('seku_tasks', 'id'); 
    }
}