<?php
require __DIR__.'/../../autoload.php';

/*
Never force a client to implement an interface it doesn't use
*/
interface ManagableInterface{
    public function beManaged();
}
interface SleepableInterface{
    public function sleep();
}
interface WorkerInterface{
    public function work();
}

class HumanWorker implements WorkerInterface, SleepableInterface, ManagableInterface{
    public function work(){
        echo 'human work';
    }

    public function sleep(){
        echo 'human sleep';
    }

    public function beManaged(){
        $this->work();
        $this->sleep();
    }
}

class AndroidWorker implements WorkerInterface, ManagableInterface{
    public function work(){
        echo 'android work';
    }

    public function beManaged(){
        $this->work();
    }
}

class Captain{
    public function manage(WorkerInterface $worker){
        return $worker->beManaged();
    }
}

echo (new Captain)->manage(new AndroidWorker);
echo (new Captain)->manage(new HumanWorker);