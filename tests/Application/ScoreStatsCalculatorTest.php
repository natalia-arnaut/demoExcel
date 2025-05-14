<?php
namespace test\Application;

use Application\ScoreStatsCalculator;
use Model\StudentStats;
use PHPUnit\Framework\TestCase;

class ScoreStatsCalculatorTest extends TestCase
{
    private ScoreStatsCalculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new ScoreStatsCalculator();
    }

    /**
     * @dataProvider inputDataProvider
     *
     */
    public function testCalculate(
//        $data, AllStats $expectedStats
    ) {
//        $stats = $this->calculator->calculate($data[0], $data[1], $data[2]);

        $student1 = new StudentStats("student", 1.2);
        $student2 = new StudentStats("student 2", 1.2);
        $this->assertEquals($student1, $student2);
    }

    protected function inputDataProvider(): array
    {
        return [
            [
            ],
            [],
        ];
    }
}
