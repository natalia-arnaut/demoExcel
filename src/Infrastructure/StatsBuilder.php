<?php
namespace Infrastructure;

use JetBrains\PhpStorm\NoReturn;
use Model\AllStats;

class StatsBuilder
{
    #[NoReturn]
    public function build(
        AllStats $data
    ): array {
        $studentStats = '';
        foreach ($data->studentStats as $student)
        {
            $studentStats .= sprintf(
                '<tr><td>%s</td><td>%s</td><td class="%s">%s</td></tr>',
                $student->student, $student->grade, $student->isPassed(), $student->isPassed()
            );
        }

        $questionStats = '';
        foreach ($data->questionStats as $question)
        {
            $questionStats .= sprintf(
                '<tr><td>%s</td><td>%s</td><td>%s</td></tr>',
                $question->question, $question->p, $question->rit
            );
        }

        return [$studentStats, $questionStats];
    }
}
