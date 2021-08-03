<?php

namespace Perspective\TutorialEntity\Controller\Entity;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Repository extends Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create( ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
