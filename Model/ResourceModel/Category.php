<?php
namespace FalconMedia\CategoryThumbnail\Model\ResourceModel;

class Category extends \Magento\Catalog\Model\ResourceModel\Category
{
    /* Override this method */

    public function getChildrenCategories($category)
    {
        $collection = $category->getCollection();
        /* @var $collection
        \Magento\Catalog\Model\ResourceModel\Category\Collection */
        $collection->addAttributeToSelect(
            'url_key'
        )->addAttributeToSelect(
            'name'
        )->

        /* Add this section to select image */
        addAttributeToSelect(
            'image'
        )->
        /* Add this section to select image */

        addAttributeToSelect(
            'all_children'
        )->addAttributeToSelect(
            'is_anchor'
        )->addAttributeToFilter(
            'is_active',
            1
        )->addIdFilter(
            $category->getChildren()
        )->setOrder(
            'position',
            \Magento\Framework\DB\Select::SQL_ASC
        )->joinUrlRewrite()->load();

        return $collection;
    }
}