<?php
namespace Model;

class StudentStats
{
    public function __construct(
            public readonly string $student,
            public readonly float $grade,
    ) {
    }

    public function isPassed(): string
    {
        if ($this->grade <= 20) {
            return 'failed';
        }

        return 'passed';
    }
}
