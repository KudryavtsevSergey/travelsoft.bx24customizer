<?php
/**
 * Created by PhpStorm.
 * User: sun
 * Date: 27.12.18
 * Time: 15:29
 */

namespace travelsoft\bx24customizer\traits;

trait MasterTourRelatedStores
{
    public static function getIblockIdByMasterTourId($masterId, $masterTourProperty = 'MASTER_TOUR_ID')
    {
        $items = self::get(['filter' => ["PROPERTY_{$masterTourProperty}" => $masterId]]);

        if(empty($items)){
            return '';
        }

        $item = current($items);

        if($item['PROPERTIES'][$masterTourProperty]['VALUE'] != $masterId){
            return '';
        }

        return $item['ID'];
    }
}
