<?php
namespace Infrastructure;

use Application\ScoreStatsCalculator;
use JetBrains\PhpStorm\NoReturn;

readonly class Controller
{
    public function __construct(
        private StatsBuilder         $csvBuilder,
        private XlsReader            $reader,
        private ScoreStatsCalculator $calculator,
    ) {}

    #[NoReturn]
    public function getTestOverview(string $template)
    {
        $data = $this->reader->read(dirname(__DIR__) . '/assignment.xlsx');
        $questionNames = array_shift($data);
        $maxScores = array_shift($data);

        $statsStrings = $this->csvBuilder->build(
            $this->calculator->calculate($data, $maxScores, $questionNames),
        );

        ob_start();
        require_once $template;
        $templateString = ob_get_clean();

        $templateString = str_replace('{{{studentStats}}}', $statsStrings[0], $templateString);
        echo str_replace('{{{questionStats}}}', $statsStrings[1], $templateString);
    }
}
