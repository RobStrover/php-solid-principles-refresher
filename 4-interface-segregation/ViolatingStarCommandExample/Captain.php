<?php namespace StarCommand;

class Captain
{

    public function manage(HumanWorker $worker)
    {
        $worker->work();
        $worker->sleep();
    }

}