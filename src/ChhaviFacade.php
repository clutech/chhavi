<?php
namespace Clutech\Chhavi;
use Illuminate\Support\Facades\Facade;

class ChhaviFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Chhavi';
    }
}