<?php
if (!$USER->isAdmin())
    return;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$mid = "travelsoft.bx24customizer";

global $APPLICATION;

function renderOptions($arOptions, $mid)
{
    $options = '';
    foreach ($arOptions as $name => $arValues) {

        $cur_opt_val = htmlspecialcharsbx(Bitrix\Main\Config\Option::get($mid, $name));
        $name = htmlspecialcharsbx($name);

        $options .= '<tr>';
        $options .= '<td width="40%">';
        $options .= '<label for="' . $name . '">' . $arValues['DESC'] . ':</label>';
        $options .= '</td>';
        $options .= '<td width="60%">';
        if ($arValues['TYPE'] == 'select') {

            $options .= '<select id="' . $name . '" name="' . $name . '">';
            $options .= '<option>-</option>';
            foreach ($arValues['VALUES'] as $key => $value) {
                $options .= '<option ' . ($cur_opt_val == $key ? 'selected' : '') . ' value="' . $key . '">' . $value . '</option>';
            }
            $options .= '</select>';
        } elseif ($arValues['TYPE'] == 'text') {

            $options .= '<input type="text" name="' . $name . '" value="' . $cur_opt_val . '">';
        }
        $options .= '</td>';
        $options .= '</tr>';
    }
    echo $options;
}

$arIBlocks = array();
$db_iblock = CIBlock::GetList(["SORT" => "ASC"]);
while ($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[" . $arRes["ID"] . "] " . $arRes["NAME"];

$type_options = [
    'TOTAL' => [
        'MASTERTOUR_API_URL' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'MASTERTOUR_SECRET_API_KEY' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'MASTERTOUR_INFO_LEAD_CODE_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'MASTERTOUR_INFO_DEAL_CODE_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'MASTERTOUR_ID_CODE_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'TOUR_DATE_DEAL_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'COUNTRY_DEAL_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'RESORT_DEAL_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'DURATION_DEAL_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'FOOD_DEAL_FIELD' => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'DISCOUNT_DEAL_FIELD'  => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'TOUR_TYPE_DEAL_FIELD'  => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'ADVERTISING_SOURCE_DEAL_FIELD'  => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'PERSONAL_NUMBER_CONTACT_FIELD'  => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'CITY_CONTACT_FIELD'  => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'SEX_CONTACT_FIELD'  => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'ADDRESS_CONTACT_FIELD'  => [
            'DESC' => '',
            'TYPE' => 'text',
        ],
        'COUNTRY_STORE_ID' => [
            'DESC' => '',
            'TYPE' => 'select',
            'VALUES' => $arIBlocks
        ],
        'FOOD_STORE_ID' => [
            'DESC' => '',
            'TYPE' => 'select',
            'VALUES' => $arIBlocks
        ],
        'RESORT_STORE_ID' => [
            'DESC' => '',
            'TYPE' => 'select',
            'VALUES' => $arIBlocks
        ],
        'TOUR_TYPE_STORE_ID'  => [
            'DESC' => '',
            'TYPE' => 'select',
            'VALUES' => $arIBlocks
        ],
        'ADVERTISING_SOURCES_STORE_ID'  => [
            'DESC' => '',
            'TYPE' => 'select',
            'VALUES' => $arIBlocks
        ],
    ]
];

$module_options = \Bitrix\Main\Config\Option::getForModule($mid);
if (!empty($module_options)) {
    foreach (\array_keys($module_options) as $name) {
        $main_options["TOTAL"][$name] = $type_options["TOTAL"][$name];
        $main_options["TOTAL"][$name]['DESC'] = Loc::getMessage("TRAVELSOFT_BX24CUSTOMIZER_OPTION_" . $name);
    }
}

$tabs = [
    [
        "DIV" => "edit1",
        "TAB" => Loc::getMessage("TRAVELSOFT_BX24CUSTOMIZER_OPTIONS_TAB"),
        "ICON" => "",
        "TITLE" => Loc::getMessage("TRAVELSOFT_BX24CUSTOMIZER_OPTIONS_TAB_TITLE"),
    ]
];

$o_tab = new CAdminTabControl("TravelsoftTabControl", $tabs);
if ($REQUEST_METHOD == "POST" && strlen($save . $reset) > 0 && check_bitrix_sessid()) {

    if (strlen($reset) > 0) {
        foreach ($main_options as $arBlockOption) {

            foreach (\array_keys($arBlockOption) as $name) {
                \Bitrix\Main\Config\Option::delete($mid, array('name' => $name));
            }
        }
    } else {
        foreach ($main_options as $arBlockOption) {

            foreach ($arBlockOption as $name => $arValues) {
                if (isset($_REQUEST[$name])) {
                    \Bitrix\Main\Config\Option::set($mid, $name, $_REQUEST[$name]);
                }
            }
        }
    }

    LocalRedirect($APPLICATION->GetCurPage() . "?mid=" . urlencode($mid) . "&lang=" . urlencode(LANGUAGE_ID) . "&" . $o_tab->ActiveTabParam());
}
$o_tab->Begin();
?>

<form method="post"
      action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($mid) ?>&amp;lang=<? echo LANGUAGE_ID ?>">
    <?
    foreach ($main_options as $arOption) {
        $o_tab->BeginNextTab();
        renderOptions($arOption, $mid);
    }
    $o_tab->Buttons();
    ?>
    <input type="submit" name="save" value="Сохранить" title="Сохранить" class="adm-btn-save">
    <input type="submit" name="reset" title="Сбросить" OnClick="return confirm('Сбросить')" value="Сбросить">
    <?= bitrix_sessid_post(); ?>
    <? $o_tab->End(); ?>
</form>
