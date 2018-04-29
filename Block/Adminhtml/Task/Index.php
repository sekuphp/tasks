<?php
namespace Seku\Tasks\Block\Adminhtml\Task;

use Seku\Tasks\Block\Adminhtml\Task;

class Index extends Task
{
    public function _construct()
    {
        parent::_construct();
    }

    public function getTasks()
    {
        return $this->registry->registry('current_model')->getCollection();
    }
}