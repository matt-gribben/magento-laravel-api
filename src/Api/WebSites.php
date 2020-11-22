<?php

namespace Grayloon\Magento\Api;

class WebSites extends AbstractApi
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
        return $this->get('/inventory/stocks');
    }
}