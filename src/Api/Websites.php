<?php

namespace Grayloon\Magento\Api;

class Websites extends AbstractApi
{
    /**
     * storeWebsiteRepositoryV1
     * All store websites.
     *
     *
     * @return array
     */
    public function all()
    {
        return $this->get('/store/websites');
    }
}