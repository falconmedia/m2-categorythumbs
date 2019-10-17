<?php
namespace FalconMedia\CategoryThumbnail\Observer;

use Magento\Framework\Event\ObserverInterface;

class CategoryThumbsObserver implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $select = $observer->getData('select');
        $select->columns('image');
    }
}