<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Nopayment;

use Spryker\Shared\Nopayment\NopaymentConfig as NopaymentNopaymentConfig;
use Spryker\Shared\Nopayment\NopaymentConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class NopaymentConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @return array<string>
     */
    public function getNopaymentMethods()
    {
        $methods = $this->get(NopaymentConstants::NO_PAYMENT_METHODS, $this->getNopaymentMethodsDefaults());

        return $methods;
    }

    /**
     * @api
     *
     * @return array<string>
     */
    public function getWhitelistMethods()
    {
        $whitelistMethods = $this->get(NopaymentConstants::WHITELIST_PAYMENT_METHODS, []);

        return $whitelistMethods;
    }

    /**
     * @return array<string>
     */
    protected function getNopaymentMethodsDefaults()
    {
        return [
            NopaymentNopaymentConfig::PAYMENT_PROVIDER_NAME,
        ];
    }
}
