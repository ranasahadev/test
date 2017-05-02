<?php
namespace Test\Test\Tests\Unit\Controller;

/**
 * Test case.
 */
class TestControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Test\Test\Controller\TestController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Test\Test\Controller\TestController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTestsFromRepositoryAndAssignsThemToView()
    {

        $allTests = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository = $this->getMockBuilder(\Test\Test\Domain\Repository\TestRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $testRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTests));
        $this->inject($this->subject, 'testRepository', $testRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('tests', $allTests);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTestToView()
    {
        $test = new \Test\Test\Domain\Model\Test();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('test', $test);

        $this->subject->showAction($test);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenTestToTestRepository()
    {
        $test = new \Test\Test\Domain\Model\Test();

        $testRepository = $this->getMockBuilder(\Test\Test\Domain\Repository\TestRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository->expects(self::once())->method('add')->with($test);
        $this->inject($this->subject, 'testRepository', $testRepository);

        $this->subject->createAction($test);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenTestToView()
    {
        $test = new \Test\Test\Domain\Model\Test();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('test', $test);

        $this->subject->editAction($test);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenTestInTestRepository()
    {
        $test = new \Test\Test\Domain\Model\Test();

        $testRepository = $this->getMockBuilder(\Test\Test\Domain\Repository\TestRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository->expects(self::once())->method('update')->with($test);
        $this->inject($this->subject, 'testRepository', $testRepository);

        $this->subject->updateAction($test);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenTestFromTestRepository()
    {
        $test = new \Test\Test\Domain\Model\Test();

        $testRepository = $this->getMockBuilder(\Test\Test\Domain\Repository\TestRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository->expects(self::once())->method('remove')->with($test);
        $this->inject($this->subject, 'testRepository', $testRepository);

        $this->subject->deleteAction($test);
    }
}
