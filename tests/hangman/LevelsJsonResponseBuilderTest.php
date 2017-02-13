<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 14.34
 */

namespace tests\hangman;

use hangman\Converter;
use hangman\LevelEntity;
use hangman\LevelsDao;
use hangman\LevelsJsonResponseBuilder;

class LevelsJsonResponseBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function test_reads_levels_and_converts_to_json()
    {
        $level1 = new LevelEntity();
        $level1->setData(1, 1, "Level 1");

        $level2 = new LevelEntity();
        $level2->setData(2, 2, "Level 2");

        $levels = array(
            $level1, $level2
        );

        /** @var LevelsDao|\PHPUnit_Framework_MockObject_MockObject $daoMock */
        $daoMock = $this->getMockBuilder(LevelsDao::class)
            ->setMethods(['getLevels'])
            ->getMock();
        $daoMock->expects($this->once())
            ->method('getLevels')
            ->will($this->returnValue($levels));

        /** @var Converter|\PHPUnit_Framework_MockObject_MockObject $converterMock */
        $converterMock = $this->getMockBuilder(Converter::class)
            ->setMethods(['toCollection'])
            ->getMock();
        $converterMock->expects($this->once())
            ->method('toCollection')
            ->with($this->equalTo($levels))
            ->will($this->returnValue('json data'));

        $builder = new LevelsJsonResponseBuilder($converterMock, $daoMock);
        $response = $builder->getResponse();

        $this->assertEquals('json data', $response);
    }
}