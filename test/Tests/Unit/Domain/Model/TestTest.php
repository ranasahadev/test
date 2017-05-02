<?php
namespace Test\Test\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class TestTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Test\Test\Domain\Model\Test
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Test\Test\Domain\Model\Test();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDescrptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescrption()
        );

    }

    /**
     * @test
     */
    public function setDescrptionForStringSetsDescrption()
    {
        $this->subject->setDescrption('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'descrption',
            $this->subject
        );

    }
}
