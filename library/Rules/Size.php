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
use SplFileInfo;

/**
 * Validate file size.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class Size extends AbstractRule
{
    /**
     * @var string
     */
    public $minSize;

    /**
     * @var int
     */
    public $minValue;

    /**
     * @var string
     */
    public $maxSize;

    /**
     * @var int
     */
    public $maxValue;

    /**
     * @param string $minSize
     * @param string $maxSize
     */
    public function __construct($minSize = null, $maxSize = null)
    {
        $this->minSize = $minSize;
        $this->minValue = $minSize ? $this->toBytes($minSize) : null;
        $this->maxSize = $maxSize;
        $this->maxValue = $maxSize ? $this->toBytes($maxSize) : null;
    }

    /**
     * @todo Move it to a trait
     *
     * @param mixed $size
     *
     * @return int
     */
    

    /**
     * @param int $size
     *
     * @return bool
     */
    

    /**
     * {@inheritdoc}
     */
    public function validate($input)
    {
        if ($input instanceof SplFileInfo) {
            return $this->isValidSize($input->getSize());
        }

        if (is_string($input)) {
            return $this->isValidSize(filesize($input));
        }

        return false;
    }
}
