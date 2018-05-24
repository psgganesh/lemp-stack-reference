<?php


interface SalesOutputInterface {
    public function output();
}

interface DownloadableInterface {
    public function setCapability();
    public function getCapability();
}

class ConsoleOutputFormatter {

    public function respond($data)
    {
        echo(PHP_EOL.$data.PHP_EOL.PHP_EOL);
    }

}

class PDFOutput extends ConsoleOutputFormatter implements SalesOutputInterface, DownloadableInterface {

    protected $isDownloadable = FALSE;

    public function __construct()
    {
        $this->setCapability();
    }

    public function output()
    {
        $this->respond("PDF output -- downloadable - ".$this->getCapability());
    }

    public function setCapability()
    {
        $this->isDownloadable = TRUE;
    }

    public function getCapability()
    {
        return $this->isDownloadable ? 'TRUE' : 'FALSE';
    }

}

class HTMLOutput extends ConsoleOutputFormatter implements SalesOutputInterface {

    public function output()
    {
        $this->respond("HTML output");
    }

}

class SalesReporter {

    public function generate(SalesOutputInterface $reporter)
    {
        $reporter->output();
    }

}

$salesReporterObject = new SalesReporter();
$salesReporterObject->generate(new PDFOutput);