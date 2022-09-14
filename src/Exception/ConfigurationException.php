<?php declare(strict_types=1);
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Kingscode\EnormailApi\Exception;

use Exception;

final class ConfigurationException extends Exception
{
    public function __construct(
        string $configKey,
        int $code = 0,
        Exception $previous = null
    ) {
        parent::__construct(
            sprintf(
                'Missing config or env "%s"',
                $configKey,
            ),
            $code,
            $previous
        );
    }
}
