<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Nopayment\Communication\Plugin\Checkout;

use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Payment\Dependency\Plugin\Checkout\CheckoutPreCheckPluginInterface;

/**
 * @deprecated Use {@link \Spryker\Zed\Nopayment\Communication\Plugin\Checkout\NopaymentCheckoutPreConditionPlugin} instead.
 *
 * @method \Spryker\Zed\Nopayment\Business\NopaymentFacadeInterface getFacade()
 * @method \Spryker\Zed\Nopayment\Communication\NopaymentCommunicationFactory getFactory()
 * @method \Spryker\Zed\Nopayment\NopaymentConfig getConfig()
 * @method \Spryker\Zed\Nopayment\Persistence\NopaymentQueryContainerInterface getQueryContainer()
 */
class NopaymentPreCheckPlugin extends AbstractPlugin implements CheckoutPreCheckPluginInterface
{
    /**
     * @var int
     */
    public const ERROR_CODE_NOPAYMENT_NOT_ALLOWED = 403;

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return bool
     */
    public function execute(
        QuoteTransfer $quoteTransfer,
        CheckoutResponseTransfer $checkoutResponseTransfer
    ) {
        if ($quoteTransfer->getTotals()->getPriceToPay() > 0) {
            $error = new CheckoutErrorTransfer();
            $error->setMessage('Nopayment is only available if the price to pay is 0');
            $error->setErrorCode(static::ERROR_CODE_NOPAYMENT_NOT_ALLOWED);
            $checkoutResponseTransfer->addError($error);

            return false;
        }

        return true;
    }
}
