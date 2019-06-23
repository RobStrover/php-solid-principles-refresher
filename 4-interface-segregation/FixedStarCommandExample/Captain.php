<?php namespace StarCommandFixed;

class Captain
{

    public function manage(ManageableInterface $worker)
    {
        $worker->beManaged();
    }

}