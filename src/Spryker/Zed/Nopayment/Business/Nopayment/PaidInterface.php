<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Nopayment\Business\Nopayment;

use Orm\Zed\Sales\Persistence\SpySalesOrderItem;

interface PaidInterface
{
    /**
     * @param array<\Orm\Zed\Sales\Persistence\SpySalesOrderItem> $orderItems
     *
     * @return array<\Orm\Zed\Sales\Persistence\SpySalesOrderItem>
     */
    public function setAsPaid(array $orderItems): array;

    public function isPaid(SpySalesOrderItem $orderItem): bool;
}
