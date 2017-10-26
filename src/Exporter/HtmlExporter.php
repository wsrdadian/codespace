<?php

namespace Wispiring\CodeSpace\Exporter;

class HtmlExporter
{
    protected $repositories;
    public function __construct($repositories)
    {
        $this->repositories = $repositories;
    }

    public function export()
    {
        $del = '</td><td>';
        $ln = '<br>';
        $html = '<table cellpadding="6"><tr><td>Short name'.$del.'Name'.$del.'Group'.$del.'Path</td></tr>';
        foreach ($this->repositories as $r) {
            $html .= '<tr><td>'.$r->getShortName().$del.$r->getName().$del.$r->getGroup().$del.
            '<a href="'.$r->getPath().'">'.$r->getPath().'</a></td></tr>';
        }
        return '<html><body>'.$html.'</table></body></html>';
    }

    public function exportToFile($path)
    {
        return file_put_contents($path, $this->export());
    }
}
