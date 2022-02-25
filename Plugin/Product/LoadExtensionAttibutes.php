<?php
/**
 * Copyright © Adobe All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adobe\ProductCustomAttribute\Plugin\Product;

use Magento\Catalog\Api\Data\ProductExtensionFactory;
use Magento\Catalog\Api\Data\ProductExtensionInterface;
use Magento\Catalog\Api\Data\ProductInterface;

/**
 * LoadExtensionAttibutes for fetch Extension Attributes
 */
class LoadExtensionAttibutes
{
    /**
     * @var ProductExtensionFactory
     */
    private $extensionFactory;

    /**
     * @param ProductExtensionFactory $extensionFactory
     */
    public function __construct(
        ProductExtensionFactory $extensionFactory
    )
    {
        $this->extensionFactory = $extensionFactory;
    }

    /**
     * @param ProductInterface $entity
     * @param ProductExtensionInterface|null $extension
     * @return ProductExtensionInterface|null
     */
    public function afterGetExtensionAttributes(
        ProductInterface          $subject,
        ProductExtensionInterface $extension = null
    )
    {
        if ($extension === null) {
            $extension = $this->extensionFactory->create();
        }

        return $extension;
    }

}
