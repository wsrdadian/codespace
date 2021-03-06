<?php

namespace Wispiring\CodeSpace\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Wispiring\CodeSpace\Scanner;
use Wispiring\CodeSpace\Exporter\AtomProjectsCsonExporter;
use RuntimeException;

class AtomUpdateCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('atom:update')
            ->setDescription('Updates your ~/.atom/projects.cson file')
            ->addOption(
                'path',
                null,
                InputOption::VALUE_OPTIONAL,
                'The path to scan'
            )
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $spaces = $this->scanPath($input);

        $o = $this->getStyler($input, $output);
        $o->title('CodeSpace: Generating ~/.atom/projects.cson');
        $o->section("\xF0\x9F\x93\x81 : [<info>".$this->scanPath."</>]");

        $exporter = new AtomProjectsCsonExporter($spaces);
        $exporter->exportToFile($this->getHomeDirectory().'/.atom/projects.cson');

        $o->success("\xF0\x9F\x93\xA3  ".count($spaces)." Atom projects added. \xF0\x9F\x8E\x89");
    }
}
