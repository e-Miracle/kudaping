<?php


namespace eMiracle\Kudaping\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class Kudaping
 * @package eMiracle\Kudaping\Facades
 */
class Kudaping extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'kudaping';
    }
}
