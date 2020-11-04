<?php

namespace Magento\ReviewGraphQl\Compat;

use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Before https://github.com/magento/graphql-ce/pull/742/ there
 * was no way to add extra parameters to the context.
 *
 * This trait provides a fallback implementation to get values
 * now in the context, but for earlier Magento versions.
 */
trait WithGraphQLContextValuesTrait
{
  /**
   * The store parameter in GraphQL context appeared in 2.3.3
   * see Magento\StoreGraphQl\Model\Context\AddStoreInfoToContext
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

  /**
   * The isCustomer parameter in GraphQL context appeared in 2.3.3
   * see Magento\CustomerGraphQl\Model\Context\AddUserInfoToContext
   *
   * @param ContextInterface $context
   * @return bool
   */
  protected function getIsCustomer(ContextInterface $context): bool
  {
    $extension = $context->getExtensionAttributes();
    if (method_exists($extension, 'getIsCustomer')) {
      return  $extension->getIsCustomer();
    }

    $userId = $context->getUserId();
    return !empty($userId);
  }
}
