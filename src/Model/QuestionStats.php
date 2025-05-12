<?php
namespace Model;

class QuestionStats
{
    public function __construct(
            public readonly string $question,
            public float $p,
            public float $rit,
    ) {
    }

    public function setP($p)
    {
        $this->p = $p;
    }

    public function setRit($rit)
    {
        $this->rit = $rit;
    }
}
