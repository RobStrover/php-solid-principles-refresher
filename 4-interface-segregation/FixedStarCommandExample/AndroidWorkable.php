<?php namespace StarCommandFixed;

class AndroidWorkable implements WorkableInterface, ManageableInterface
{

    public function work()
    {
        return 'android working away!';
    }

    public function beManaged()
    {
        $this->work();
    }


//    Now that our interfaces are segregated, we can safely remove the sleep method from our androids
//    public function sleep()
//    {
//        return null;
//    }

}