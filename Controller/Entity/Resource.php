<?php

namespace Perspective\TutorialEntity\Controller\Entity;

use Magento\Framework\Controller\ResultFactory;

class Resource extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
