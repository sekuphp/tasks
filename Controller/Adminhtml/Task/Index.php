<?php
    namespace Seku\Tasks\Controller\Adminhtml\Task;

    use Seku\Tasks\Controller\Adminhtml\Task;

    class Index extends Task
    {
        public function execute()
        {
            $this->initModel();

            $this->_view->loadLayout();
            $this->_view->renderLayout();
        }

    }
?>