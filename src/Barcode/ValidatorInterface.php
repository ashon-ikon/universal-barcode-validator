<?php

namespace Theiconic\Barcode;

use Theiconic\Barcode\Validator\ValidatorTypeInterface;

/**
 * Interface ValidatorInterface
 * @package Theiconic\Barcode
 */
interface ValidatorInterface
{
    /**
     * Adds a validator type.
     *      e.g EAN-13, JAN-13, ISBN etc
     *
     * @param ValidatorTypeInterface $type
     * @return mixed
     */
    public function addValidatorType(ValidatorTypeInterface $type);

    /**
     * Validates a given barcode
     * @param $code
     * @return mixed
     */
    public function validate($code);

    /**
     * Returns a list of validation error if there are
     * @return mixed
     */
    public function getErrors();

    /**
     * Returns a list of registered Validator Types
     * @return ValidatorTypeInterface[]|mixed
     */
    public function getRegisteredValidators();
}
