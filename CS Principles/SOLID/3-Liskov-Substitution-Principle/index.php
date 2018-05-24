<?php


interface SalesOutputInterface {
    public function output();
}

class ConsoleOutputFormatter {

    public function respond($data)
    {
        echo(PHP_EOL.$data.PHP_EOL.PHP_EOL);
    }

}

class PDFOutput extends ConsoleOutputFormatter implements SalesOutputInterface {

    public function output()
    {
        $this->respond("PDF output");
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