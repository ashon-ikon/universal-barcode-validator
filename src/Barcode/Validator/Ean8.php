<?php

namespace Theiconic\Barcode\Validator;

/**
 * Class Ean8
 * @package Theiconic\Barcode\Validator
 */
class Ean8 extends Ean13
{
    protected $typeName = 'EAN-8';

    /**
     * {@inheritdoc}
     * @param $code
     * @return bool
     */
    public function matchesType($code)
    {
        return false;
    }
}
