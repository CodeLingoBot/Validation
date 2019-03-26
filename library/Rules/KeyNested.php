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

use ArrayAccess;
use Respect\Validation\Exceptions\ComponentException;

class KeyNested extends AbstractRelated
{
    public function hasReference($input)
    {
        try {
            $this->getReferenceValue($input);
        } catch (ComponentException $cex) {
            return false;
        }

        return true;
    }

    

    

    

    

    public function getReferenceValue($input)
    {
        if (is_scalar($input)) {
            $message = sprintf('Cannot select the %s in the given data', $this->reference);
            throw new ComponentException($message);
        }

        $keys = $this->getReferencePieces();
        $value = $input;
        while (!is_null($key = array_shift($keys))) {
            $value = $this->getValue($value, $key);
        }

        return $value;
    }
}
