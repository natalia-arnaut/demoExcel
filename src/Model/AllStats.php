<?php
namespace Model;

class AllStats
{
    /**
     * @param StudentStats[] $studentStats
     * @param QuestionStats[] $questionStats
     */
    public function __construct(
            public readonly array $studentStats,
            public readonly array $questionStats,
    ) {
    }

    /**
     * @return StudentStats[]
     */
    public function getStudentStats(): array
    {
        return $this->studentStats;
    }

    /**
     * @return QuestionStats[]
     */
    public function getQuestionStats(): array
    {
        return $this->questionStats;
    }
}
