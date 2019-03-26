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

use Respect\Validation\Exceptions\ComponentException;

class FilterVar extends Callback
{
    public function __construct()
    {
        $arguments = func_get_args();
        if (!isset($arguments[0])) {
            throw new ComponentException('Cannot validate without filter flag');
        }

        if (!$this->isValidFilter($arguments[0])) {
            throw new ComponentException('Cannot accept the given filter');
        }

        $this->callback = 'filter_var';
        $this->arguments = $arguments;
    }

    
}
