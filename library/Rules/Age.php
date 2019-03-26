<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Respect\Validation\Rules;

use DateTime;
use Respect\Validation\Exceptions\ComponentException;

class Age extends AllOf
{
    public $minAge;
    public $maxAge;

    public function __construct($minAge = null, $maxAge = null)
    {
        if (null === $minAge && null === $maxAge) {
            throw new ComponentException('An age interval must be provided');
        }

        if (null !== $minAge && null !== $maxAge && $maxAge <= $minAge) {
            throw new ComponentException(sprintf('%d cannot be greater than or equals to %d', $minAge, $maxAge));
        }

        $this->setMinAge($minAge);
        $this->setMaxAge($maxAge);
    }

    

    

    
}
