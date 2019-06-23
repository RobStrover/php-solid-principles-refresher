<?php namespace StarCommand;

class AndroidWorker implements WorkerInterface
{

    public function work()
    {
        return 'android working away!';
    }

    public function sleep()
    {
        // UHOHHHH android do not sleep - we are forcing this class to implement a function it does not use.
        // Android do not sleep but we are forcing the implementation of a sleep function.
        return null;
    }

}