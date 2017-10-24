<?php

namespace Wispiring\CodeSpace\Exporter;

class AtomProjectsCsonExporter
{
    protected $repositories;

    public function __construct($repositories)
    {
        $this->repositories = $repositories;
    }

    public function export()
    {
        $cson = '';
        foreach ($this->repositories as $r) {
            $cson .= '\''.$r->getName().'\':'.PHP_EOL;
            $cson .= '  \'title\': \''.$r->getShortName().'\''.PHP_EOL;
            $cson .= '  \'icon\': \'icon-repo\''.PHP_EOL;
            $cson .= '  \'group\': \''.$r->getGroup().'\''.PHP_EOL;
            $cson .= '  \'paths\': ['.PHP_EOL;
            $cson .= '     \''.$r->getPath().'\''.PHP_EOL;
            $cson .= '  ]'.PHP_EOL;
            $cson .= PHP_EOL;
        }

        return $cson;
    }

    public function exportToFile($path)
    {
        return file_put_contents($path, $this->export());
    }
}
