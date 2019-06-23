<?php namespace StarCommand;

class HumanWorker implements WorkerInterface
{

    public function work()
    {
        return 'human working...ish!';

    }

    public function sleep()
    {
        return 'zzzzzzzzzzzzzzzzzzz';
    }

}