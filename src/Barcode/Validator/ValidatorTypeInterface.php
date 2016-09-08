<?php

namespace Theiconic\Barcode\Validator;

/**
 * Interface ValidatorTypeInterface
 * @package Theiconic\Barcode\Validator
 */
interface ValidatorTypeInterface
{
    /**
     * Returns the validator's name
     * @return string
     */
    public function getTypeName();

    /**
     * Validates the given code based on algorithm for given type
     * @param $code
     * @return mixed|bool
     */
    public function validate($code);

    /**
     * Returns the validation error messages if any
     * @return mixed
     */
    public function getMessages();

    /**
     * Sets the validation message
     * @param string[] $messages
     * @return mixed
     */
    public function setMessages($messages);

    /**
     * Adds a validation message
     * @param string $message
     * @return mixed
     */
    public function addMessage($message);

    /**
     * Checks if this validator can supports this type
     * @param $code
     * @return mixed|bool
     */
    public function matchesType($code);

}
