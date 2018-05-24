<?php


interface SalesOutputInterface {
    public function output($format);
}

class ConsoleOutputFormatter {

    public function respond($data)
    {
        echo(PHP_EOL.$data.PHP_EOL.PHP_EOL);
    }

}

class PDFOutput implements SalesOutputInterface {

    public function output($format)
    {
        $format->respond("PDF output");
    }

}

class HTMLOutput implements SalesOutputInterface {

    public function output($format)
    {
        $format->respond("HTML output");
    }

}

class SalesReporter {

    protected $format;

    public function __construct($format)
    {
        $this->format = $format;
    }

    public function generate(SalesOutputInterface $reporter)
    {
        $reporter->output($this->format);
    }

}

$salesReporterObject = new SalesReporter(new ConsoleOutputFormatter);
$salesReporterObject->generate(new PDFOutput);