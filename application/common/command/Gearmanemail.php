<?php

namespace app\common\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class Gearmanemail extends Command
{
    protected function configure()
    {
        $this->setName('gearmanemail')->setDescription('Gearman worker send email!');
    }

    protected function execute(Input $input, Output $output)
    {
        gearman_email_work();
		$output->writeln("Gearman worker send email started!");
    }
}