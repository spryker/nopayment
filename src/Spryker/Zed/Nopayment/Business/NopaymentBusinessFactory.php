<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Nopayment\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Nopayment\Business\Checkout\NopaymentCheckoutPreConditionChecker;
use Spryker\Zed\Nopayment\Business\Checkout\NopaymentCheckoutPreConditionCheckerInterface;
use Spryker\Zed\Nopayment\Business\Deleter\NopaymentPaidDeleter;
use Spryker\Zed\Nopayment\Business\Deleter\NopaymentPaidDeleterInterface;
use Spryker\Zed\Nopayment\Business\Nopayment\NopaymentMethodFilter;
use Spryker\Zed\Nopayment\Business\Nopayment\NopaymentMethodFilterInterface;
use Spryker\Zed\Nopayment\Business\Nopayment\Paid;
use Spryker\Zed\Nopayment\Business\Nopayment\PaidInterface;
use Spryker\Zed\Nopayment\Business\Updater\QuotePaymentUpdater;
use Spryker\Zed\Nopayment\Business\Updater\QuotePaymentUpdaterInterface;

/**
 * @method \Spryker\Zed\Nopayment\NopaymentConfig getConfig()
 * @method \Spryker\Zed\Nopayment\Persistence\NopaymentQueryContainerInterface getQueryContainer()
 * @method \Spryker\Zed\Nopayment\Persistence\NopaymentEntityManagerInterface getEntityManager()
 */
class NopaymentBusinessFactory extends AbstractBusinessFactory
{
    public function createNopaymentMethodFilter(): NopaymentMethodFilterInterface
    {
        return new NopaymentMethodFilter($this->getConfig());
    }

    public function createNopaymentPaid(): PaidInterface
    {
        return new Paid(
            $this->getQueryContainer(),
        );
    }

    public function createNopaymentCheckoutPreConditionChecker(): NopaymentCheckoutPreConditionCheckerInterface
    {
        return new NopaymentCheckoutPreConditionChecker();
    }

    public function createQuotePaymentUpdater(): QuotePaymentUpdaterInterface
    {
        return new QuotePaymentUpdater();
    }

    public function createNopaymentPaidDeleter(): NopaymentPaidDeleterInterface
    {
        return new NopaymentPaidDeleter($this->getEntityManager());
    }
}
