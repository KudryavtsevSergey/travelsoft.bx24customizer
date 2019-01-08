<?php
/**
 * Created by PhpStorm.
 * User: sun
 * Date: 04.01.19
 * Time: 16:04
 */

namespace travelsoft\bx24customizer\stores;


use travelsoft\bx24customizer\adapters\Iblock;
use travelsoft\bx24customizer\traits\MasterTourRelatedStores;

class TourType extends Iblock
{
    use MasterTourRelatedStores;

    /**
     * @var int
     */
    protected static $storeName = 'tourType';
}
