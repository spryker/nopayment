<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\Nopayment;

use Spryker\Shared\Kernel\AbstractBundleConfig;

class NopaymentConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @var string
     */
    public const PAYMENT_PROVIDER_NAME = 'Nopayment';

    /**
     * @api
     *
     * @var string
     */
    public const PAYMENT_METHOD_NAME = 'paid';
}
