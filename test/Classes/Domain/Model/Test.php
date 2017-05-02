<?php
namespace Test\Test\Domain\Model;

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

/**
 * Test
 */
class Test extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * descrption
     *
     * @var string
     */
    protected $descrption = '';

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the descrption
     *
     * @return string $descrption
     */
    public function getDescrption()
    {
        return $this->descrption;
    }

    /**
     * Sets the descrption
     *
     * @param string $descrption
     * @return void
     */
    public function setDescrption($descrption)
    {
        $this->descrption = $descrption;
    }
}
