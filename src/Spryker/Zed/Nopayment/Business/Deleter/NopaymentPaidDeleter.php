<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Nopayment\Business\Deleter;

use Generated\Shared\Transfer\NopaymentPaidCollectionDeleteCriteriaTransfer;
use Generated\Shared\Transfer\NopaymentPaidCollectionResponseTransfer;
use Spryker\Zed\Nopayment\Persistence\NopaymentEntityManagerInterface;

class NopaymentPaidDeleter implements NopaymentPaidDeleterInterface
{
    public function __construct(protected NopaymentEntityManagerInterface $nopaymentEntityManager)
    {
    }

    public function deleteNopaymentPaidCollection(
        NopaymentPaidCollectionDeleteCriteriaTransfer $nopaymentPaidCollectionDeleteCriteriaTransfer
    ): NopaymentPaidCollectionResponseTransfer {
        if ($nopaymentPaidCollectionDeleteCriteriaTransfer->getSalesOrderItemIds()) {
            $this->nopaymentEntityManager->deleteNopaymentPaidEntitiesBySalesOrderItemIds(
                $nopaymentPaidCollectionDeleteCriteriaTransfer->getSalesOrderItemIds(),
            );
        }

        return new NopaymentPaidCollectionResponseTransfer();
    }
}
