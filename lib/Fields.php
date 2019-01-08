<?php

namespace travelsoft\bx24customizer;


class Fields
{
    private static function getCodeField($codeField)
    {
        return \Bitrix\Main\Config\Option::get("travelsoft.bx24customizer", $codeField);
    }

    public static function getIdCodeField()
    {
        return self::getCodeField('MASTERTOUR_ID_CODE_FIELD');
    }

    public static function getInfoCodeField()
    {
        return self::getCodeField('MASTERTOUR_INFO_DEAL_CODE_FIELD');
    }

    public static function getSecretApiKey()
    {
        return self::getCodeField('MASTERTOUR_SECRET_API_KEY');
    }

    public static function getMasterApiUrl()
    {
        return self::getCodeField('MASTERTOUR_API_URL');
    }

    /**
     * Поле даты тура (сделка)
     * @return string
     */
    public static function getTourDateDealField()
    {
        return self::getCodeField('TOUR_DATE_DEAL_FIELD');
        //return 'UF_CRM_1545905284';
    }

    /**
     * Поле страны (сделка)
     * @return string
     */
    public static function getCountryDealField()
    {
        return self::getCodeField('COUNTRY_DEAL_FIELD');
        //return 'UF_CRM_1545904677';
    }

    /**
     * Поле курорта (сделка)
     * @return string
     */
    public static function getResortDealField()
    {
        return self::getCodeField('RESORT_DEAL_FIELD');
        //return 'UF_CRM_1545905211';
    }

    /**
     * Поле продолжительности (сделка)
     * @return string
     */
    public static function getDurationDealField()
    {
        return self::getCodeField('DURATION_DEAL_FIELD');
        //return 'UF_CRM_1545905390';
    }

    /**
     * Поле питание (сделка)
     * @return string
     */
    public static function getFoodDealField()
    {
        return self::getCodeField('FOOD_DEAL_FIELD');
        //return 'UF_CRM_1545904985';
    }

    /**
     * @return string
     */
    public static function countryStoreId()
    {
        return self::getCodeField('COUNTRY_STORE_ID');
        //return '31';
    }

    /**
     * @return string
     */
    public static function foodStoreId()
    {
        return self::getCodeField('FOOD_STORE_ID');
        //return '32';
    }

    /**
     * @return string
     */
    public static function resortStoreId()
    {
        return self::getCodeField('RESORT_STORE_ID');
    }

    /**
     * @return string
     */
    public static function tourTypeStoreId()
    {
        return self::getCodeField('TOUR_TYPE_STORE_ID');
        //return '34';
    }

    public static function advertisingSourcesStoreId()
    {
        return self::getCodeField('ADVERTISING_SOURCES_STORE_ID');
        //return '35';
    }

    /**
     * Поле скидка (сделка)
     * @return string
     */
    public static function getDiscountDealField()
    {
        return self::getCodeField('DISCOUNT_DEAL_FIELD');
        //return 'UF_CRM_1546603207';
    }

    /**
     * Поле тип тура (сделка)
     * @return string
     */
    public static function getTourTypeDealField()
    {
        return self::getCodeField('TOUR_TYPE_DEAL_FIELD');
        //return 'UF_CRM_1546607537';
    }

    /**
     * Поле источник рекламы (сделка)
     * @return string
     */
    public static function getAdvertisingSourceDealField()
    {
        return self::getCodeField('ADVERTISING_SOURCE_DEAL_FIELD');
        //return 'UF_CRM_1546607622';
    }

    /**
     * Поле личный номер (контакт)
     * @return string
     */
    public static function getPersonalNumberContactField()
    {
        return self::getCodeField('PERSONAL_NUMBER_CONTACT_FIELD');
        //return 'UF_CRM_1546612462';
    }

    /**
     * Поле город (контакт)
     * @return string
     */
    public static function getCityContactField()
    {
        return self::getCodeField('CITY_CONTACT_FIELD');
        //return 'UF_CRM_5C0A8184D0F92';
    }

    /**
     * Поле пол (контакт)
     * @return string
     */
    public static function getSexContactField()
    {
        return self::getCodeField('SEX_CONTACT_FIELD');
        //return 'UF_CRM_1546612742';
    }

    /**
     * Поле адрес (контакт)
     * @return string
     */
    public static function getAddressContactField()
    {
        return self::getCodeField('ADDRESS_CONTACT_FIELD');
        //return 'UF_CRM_1546613848';
    }
}
