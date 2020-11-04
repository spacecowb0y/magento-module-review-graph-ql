<?php

namespace Magento\ReviewGraphQl\Compat;

use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\StoreManagerInterface;

trait WithGraphQLContextValuesTrait
{
  /**
   * The store parameter in GraphQL context appeared in 2.3.3
   * and before https://github.com/magento/graphql-ce/pull/742/ there
   * was no way to add extra parameters to the context.
   *
   * This trait provides a fallback implementation for earlier Magento versions.
   *
   * @param ContextInterface $context
   * @param StoreManagerInterface $storeManager
   * @return StoreInterface
   */
  protected function getStore(
    ContextInterface $context,
    StoreManagerInterface $storeManager
  ): StoreInterface {
    $extension = $context->getExtensionAttributes();
    if (method_exists($extension, 'getStore')) {
      return $extension->getStore();
    }
    return $storeManager->getStore();
  }
}
