<?php

namespace Theiconic\Barcode\Validator;

use Theiconic\Barcode\Validator\Exception\LogicException;

/**
 * Class AbstractValidatorType
 * @package Theiconic\Barcode\Validator
 */
abstract class AbstractValidatorType implements ValidatorTypeInterface
{
    /** @var string Name of validator */
    protected $typeName = '';

    /** @var string[] Validation messages */
    protected $messages = [];

    /**
     * Returns the validator's name
     * @return string
     * @throws LogicException
     */
    public function getTypeName()
    {
        if (! $this->typeName) {
            throw new LogicException('The type name should be set up before usage!');
        }

        return $this->typeName;
    }

    /**
     * Returns the validation error message
     * @inheritdoc
     * @return string[]
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Sets the error messages
     * {@inheritdoc}
     * @param string[] $messages
     * @return $this
     */
    public function setMessages($messages)
    {
        $this->messages = []; // Empty it out
        if (is_array($messages) || $messages instanceof \Traversable) {
            foreach ($messages as $message) {
                $this->addMessage($message);
            }
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     * @param string $message
     * @return $this
     */
    public function addMessage($message)
    {
        if (is_string($message)) {
            $this->messages[] = $message;
        }

        return $this;
    }

    /**
     * Checks if the entire code is numeric
     * @param $code
     * @return bool
     */
    protected function codeIsAllNum($code)
    {
        if (is_numeric($code)) {
            $code = '' . $code; // Stringify code
        } elseif (is_object($code)) {
            return false;
        }

        for ($i = 0; $i < strlen($code); $i++) {
            if (! is_int($code[$i])) {
                // this code is not numeric
                $this->addMessage("Found a non-numeric character in the barcode: `{$code[$i]}'");
                return false;
            }
        }

        return true;
    }
}
