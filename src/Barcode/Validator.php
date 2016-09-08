<?php

namespace Theiconic\Barcode;

use Theiconic\Barcode\Validator\Exception\LogicException;
use Theiconic\Barcode\Validator\ValidatorTypeInterface;

/**
 * Class Validator
 * @package Theiconic\Barcode
 */
class Validator implements ValidatorInterface
{
    /**
     * List of errors
     * @var string[]
     */
    protected $errors = [];

    /** @var ValidatorTypeInterface[] */
    protected $validators = [];

    /**
     * @inheritDoc
     */
    public function addValidatorType(ValidatorTypeInterface $type)
    {
        $this->validators[$type->getTypeName()] = $type;
    }

    /**
     * @inheritDoc
     */
    public function validate($code)
    {
        $matchFound = false;
        foreach ($this->getRegisteredValidators() as $validator) {

            if ($validator->matchesType($code)) {
                if (! $validator->validate($code)) {
                    $this->errors = array_merge($this->errors, $validator->getMessages());
                }
                $matchFound = true;
            }

        }

        if (! $matchFound) {
            $this->errors[] = 'No matching barcode validator found';
        }
    }

    /**
     * @inheritDoc
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @inheritDoc
     * @throws LogicException
     */
    public function getRegisteredValidators()
    {
        if (empty($this->validators)) {
            throw new LogicException('At least one validator type must be added!');
        }

        return $this->validators;
    }

}
