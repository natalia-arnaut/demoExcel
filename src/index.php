<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Application\ScoreStatsCalculator;
use Infrastructure\Controller;
use Infrastructure\StatsBuilder;
use Infrastructure\XlsReader;

$controller = new Controller(new StatsBuilder(), new XlsReader(), new ScoreStatsCalculator());

$controller->getTestOverview(__DIR__ . '/Frontend/thestats.html');
