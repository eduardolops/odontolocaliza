<?php 
namespace Doctor\Facades;

use Illuminate\Support\Facades\Facade;

class CountAccess extends Facade
{
    protected static function getFacadeAccessor() { return 'countaccess'; }
}