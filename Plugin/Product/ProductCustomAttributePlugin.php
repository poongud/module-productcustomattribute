<?php
/**
 * Copyright © Adobe All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adobe\ProductCustomAttribute\Plugin\Product;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchResultsInterface;

/**
 * ProductCustomAttributePlugin interceptor get / getList methods
 */
class ProductCustomAttributePlugin
{

    /**
     * Product Attribute Code 1
     */
    const ATTRIBUTE_CODE1 = "custom_attribite1";

    /**
     * Product Attribute Code 2
     */
    const ATTRIBUTE_CODE2 = "custom_attribite2";

    /**
     * CUSTOM_ATTRIBUTE2_VALUE String Static value
     */
    const CUSTOM_ATTRIBUTE2_VALUE = "Special Sales";

    /**
     * @param ProductRepositoryInterface $subject
     * @param ProductInterface $entity
     * @return ProductInterface
     */
    public function afterGet(
        ProductRepositoryInterface $subject,
        ProductInterface           $entity)
    {
        $extensionAttributes = $entity->getExtensionAttributes();
        $extensionAttributes->setData(self::ATTRIBUTE_CODE1, "Test Value 1");
        $extensionAttributes->setData(self::ATTRIBUTE_CODE2, ['value1','value2','value3']);
        $entity->setExtensionAttributes($extensionAttributes);

        return $entity;
    }

    /**
     * @param ProductRepositoryInterface $subject
     * @param SearchResultsInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function afterGetList(
        ProductRepositoryInterface $subject,
        SearchResultsInterface     $searchCriteria
    )
    {
        $products = [];
        foreach ($searchCriteria->getItems() as $entity) {

            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setCustomAttribute1(self::CUSTOM_ATTRIBUTE2_VALUE);
            $entity->setExtensionAttributes($extensionAttributes);

            $products[] = $entity;
        }
        $searchCriteria->setItems($products);
        return $searchCriteria;
    }
}
