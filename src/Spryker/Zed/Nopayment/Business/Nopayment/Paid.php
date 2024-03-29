<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Nopayment\Business\Nopayment;

use Orm\Zed\Nopayment\Persistence\SpyNopaymentPaid;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Nopayment\Persistence\NopaymentQueryContainerInterface;

class Paid implements PaidInterface
{
    /**
     * @var \Spryker\Zed\Nopayment\Persistence\NopaymentQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @param \Spryker\Zed\Nopayment\Persistence\NopaymentQueryContainerInterface $queryContainer
     */
    public function __construct(NopaymentQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem $orderItem
     *
     * @return void
     */
    protected function setOrderItemAsPaid(SpySalesOrderItem $orderItem): void
    {
        $paidItem = new SpyNopaymentPaid();
        $paidItem->setOrderItem($orderItem);
        $paidItem->save();
    }

    /**
     * @param array<\Orm\Zed\Sales\Persistence\SpySalesOrderItem> $orderItems
     *
     * @return array<\Orm\Zed\Sales\Persistence\SpySalesOrderItem>
     */
    public function setAsPaid(array $orderItems): array
    {
        foreach ($orderItems as $orderItem) {
            $this->setOrderItemAsPaid($orderItem);
        }

        return $orderItems;
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem $orderItem
     *
     * @return bool
     */
    public function isPaid(SpySalesOrderItem $orderItem): bool
    {
        return ($this->queryContainer->queryOrderItem($orderItem)->count() > 0);
    }
}
