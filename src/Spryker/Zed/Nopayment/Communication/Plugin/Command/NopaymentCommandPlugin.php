<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Nopayment\Communication\Plugin\Command;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;

/**
 * @method \Spryker\Zed\Nopayment\Communication\NopaymentCommunicationFactory getFactory()
 * @method \Spryker\Zed\Nopayment\Business\NopaymentFacadeInterface getFacade()
 * @method \Spryker\Zed\Nopayment\NopaymentConfig getConfig()
 * @method \Spryker\Zed\Nopayment\Persistence\NopaymentQueryContainerInterface getQueryContainer()
 */
class NopaymentCommandPlugin extends AbstractPlugin implements CommandByOrderInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<\Orm\Zed\Sales\Persistence\SpySalesOrderItem> $orderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @return array
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        return $this->getFacade()->setAsPaid($orderItems);
    }
}
