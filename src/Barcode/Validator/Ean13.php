<?php

namespace Theiconic\Barcode\Validator;


class Ean13 extends AbstractValidatorType
{
    /**
     * @inheritDoc
     * @var string
     */
    protected $typeName = 'EAN-13';

    /**
     * @inheritDoc
     */
    public function validate($code)
    {
        // First ensure all is numeric
    }

    /**
     * @inheritDoc
     */
    public function matchesType($code)
    {
        // TODO: Implement matchesType() method.
    }

}
