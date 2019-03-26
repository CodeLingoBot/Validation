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

use ReflectionClass;
use ReflectionException;
use Respect\Validation\Exceptions\ComponentException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validation;

class Sf extends AbstractRule
{
    const SYMFONY_CONSTRAINT_NAMESPACE = 'Symfony\Component\Validator\Constraints\%s';
    public $name;
    private $constraint;

    public function __construct($name, $params = [])
    {
        $this->name = ucfirst($name);
        $this->constraint = $this->createSymfonyConstraint($this->name, $params);
    }

    

    

    public function assert($input)
    {
        $violations = $this->returnViolationsForConstraint($input, $this->constraint);
        if (count($violations) == 0) {
            return true;
        }

        throw $this->reportError((string) $violations);
    }

    public function validate($input)
    {
        $violations = $this->returnViolationsForConstraint($input, $this->constraint);
        if (count($violations)) {
            return false;
        }

        return true;
    }
}
