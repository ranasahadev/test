<?php
namespace Test\Test\Controller;

/***
 *
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * TestController
 */
class TestController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * testRepository
     *
     * @var \Test\Test\Domain\Repository\TestRepository
     * @inject
     */
    protected $testRepository = null;

    /**
     * @var \Test\Test\Service\ExtbaseForceLanguage
     * @inject
     */
    protected $extbaseForceLanguageService;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $tests = $this->testRepository->findAll();

        $this->extbaseForceLanguageService->setOverrideLanguage(true);
        $this->extbaseForceLanguageService->setLanguageUid(2);
            
        $extbaseRecordWithOverlayDifferentThanFeLanguage = $this->testRepository->findByUid(2);
            
        $this->extbaseForceLanguageService->setOverrideLanguage(false);


        //$tests = $this->testRepository->findByUid(2);
        
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($extbaseRecordWithOverlayDifferentThanFeLanguage);
        $this->view->assign('tests', $tests);
    }

    /**
     * action show
     *
     * @param \Test\Test\Domain\Model\Test $test
     * @return void
     */
    public function showAction(\Test\Test\Domain\Model\Test $test)
    {
        $this->view->assign('test', $test);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Test\Test\Domain\Model\Test $newTest
     * @return void
     */
    public function createAction(\Test\Test\Domain\Model\Test $newTest)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->testRepository->add($newTest);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Test\Test\Domain\Model\Test $test
     * @ignorevalidation $test
     * @return void
     */
    public function editAction(\Test\Test\Domain\Model\Test $test)
    {
        $this->view->assign('test', $test);
    }

    /**
     * action update
     *
     * @param \Test\Test\Domain\Model\Test $test
     * @return void
     */
    public function updateAction(\Test\Test\Domain\Model\Test $test)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->testRepository->update($test);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Test\Test\Domain\Model\Test $test
     * @return void
     */
    public function deleteAction(\Test\Test\Domain\Model\Test $test)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->testRepository->remove($test);
        $this->redirect('list');
    }
}
