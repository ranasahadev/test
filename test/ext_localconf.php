<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Test.Test',
            'Test',
            [
                'Test' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Test' => 'create, update, delete'
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					test {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_test.svg
						title = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_domain_model_test
						description = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_domain_model_test.description
						tt_content_defValues {
							CType = list
							list_type = test_test
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher');
$signalSlotDispatcher->connect(
	'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Backend',
	'beforeGettingObjectData',
	'Test\\Test\\Service\\ExtbaseForceLanguage',
	'forceLanguageForQueries'
);