<?php
namespace test\Application;

use Application\ScoreStatsCalculator;
use Model\AllStats;
use Model\QuestionStats;
use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__DIR__)) . '/src/imports.php';

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
        $data, AllStats $expectedStats
    ) {
        $stats = $this->calculator->calculate($data[0], $data[1], $data[2]);

//        $this->assertSame();
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
