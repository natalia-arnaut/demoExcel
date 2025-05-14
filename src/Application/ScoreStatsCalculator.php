<?php
namespace Application;

use Model\AllStats;
use Model\QuestionStats;
use Model\StudentStats;

class ScoreStatsCalculator
{
    /**
     * @param array $data
     * @param array $maxScores
     * @param array $questionNames
     *
     * @return AllStats
     */
    public function calculate(
        array $data,
        array $maxScores,
        array $questionNames
    ): AllStats {
        $studentStats = [];
        $questionStats = [];

        array_shift($maxScores);
        $maxScore = array_sum($maxScores);
        $n = count($maxScores);

        $questionStatsAvg = array_fill(0, $n, 0);

        // rit = (n*sum(x*y) - sum(x) * sum(y)) / sqrt( (n*sum(x*x) - sum(x*x)) * (n*sum(y*y) - sum(y*y)) )
        // todo put those in the model object
        $questionStatsRitXY = array_fill(0, $n, 0);
        $questionStatsRitX = array_fill(0, $n, 0);
        $questionStatsRitY = array_fill(0, $n, 0);
        $questionStatsRitXX = array_fill(0, $n, 0);
        $questionStatsRitYY = array_fill(0, $n, 0);

        foreach ($data as $scores) {
            //studentGrades
            $student = array_shift($scores);
            $studentScore = array_sum($scores);
            $studentStat = new StudentStats($student, round($studentScore * 100 / $maxScore, 1));
            $studentStats[] = $studentStat;

            foreach($scores as $key => $score) {
                //prepare for average per question
                $questionStatsAvg[$key] += $score;
                $questionStatsRitXY[$key] += $score * $studentStat->grade;
            }
        }

        foreach($questionStatsAvg as $key => $questionScore) {
            $questionStats[] = new QuestionStats(
                $questionNames[$key],
                $questionScore / $n,
                $questionStatsRitXY[$key]
            );
        }

        return new AllStats($studentStats, $questionStats);
    }
}
