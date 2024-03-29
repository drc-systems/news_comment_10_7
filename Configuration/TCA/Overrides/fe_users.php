<?php

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
    if (file_exists($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile'])) {
        require_once($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile']);
    }
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_newscomment_fe_users = array();
    $tempColumnstx_newscomment_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = array(
        'exclude' => 1,
        'label'   => 'LLL:EXT:news_comment/Resources/Private/Language/locallang_db.xlf:tx_newscomment.tx_extbase_type',
        'config' => array(
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => array(
                array('Users','Tx_NewsComment_Users')
            ),
            'default' => 'Tx_NewsComment_Users',
            'size' => 1,
            'maxitems' => 1,
        )
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'fe_users',
        $tempColumnstx_newscomment_fe_users,
        1
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    $GLOBALS['TCA']['fe_users']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);
/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
    $GLOBALS['TCA']['fe_users']['types']['Tx_NewsComment_Users']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif (is_array($GLOBALS['TCA']['fe_users']['types'])) {
    // use first entry in types array
    $fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
    $GLOBALS['TCA']['fe_users']['types']['Tx_NewsComment_Users']['showitem'] = $fe_users_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['fe_users']['types']['Tx_NewsComment_Users']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_NewsComment_Users']['showitem'] .= ',--div--;LLL:EXT:news_comment/Resources/Private/Language/locallang_db.xlf:tx_newscomment_domain_model_users,';
$GLOBALS['TCA']['fe_users']['types']['Tx_NewsComment_Users']['showitem'] .= '';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:news_comment/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_NewsComment_Users','Tx_NewsComment_Users');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    '',
    'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);
