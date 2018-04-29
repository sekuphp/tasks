<?php
namespace Seku\Tasks\Model;

use Magento\Framework\Model\AbstractModel;

class Task extends AbstractModel
{
    public function _construct() {
       	$this->_init('Seku\Tasks\Model\ResourceModel\Task');
    }     
}