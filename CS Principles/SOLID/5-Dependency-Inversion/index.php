<?php


interface SalesOutputInterface {
    public function output();
}

interface DownloadableInterface {
    public function setCapability();
    public function getCapability();
}

interface DataInterface {
    public function load();
}

class ArrayDataConnection implements DataInterface {
    public function load()
    {
        $random_number_array = range(0, 100);
        shuffle($random_number_array );
        $random_number_array = array_slice($random_number_array ,0,10);
        return $random_number_array;
    }
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

    public function printVerboseData($data)
    {
        print_r($data);
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

    protected $data;

    public function __construct(DataInterface $dataSet)
    {
        $this->data = $dataSet->load();
    }

    public function generate(SalesOutputInterface $reporter)
    {
        $reporter->output();
        $reporter->printVerboseData($this->data);
    }

}

$salesReporterObject = new SalesReporter(new ArrayDataConnection);
$salesReporterObject->generate(new PDFOutput);