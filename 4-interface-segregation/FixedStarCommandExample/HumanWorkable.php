<?php namespace StarCommandFixed;

class HumanWorkable implements WorkableInterface, SleepableInterface, ManageableInterface
{

    public function work()
    {
        return 'human working...ish!';

    }

    public function sleep()
    {
        return 'zzzzzzzzzzzzzzzzzzz';
    }

    public function beManaged()
    {
        $this->work();
        $this->sleep();
    }


}