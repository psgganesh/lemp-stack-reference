<?php


interface SalesOutputInterface {
    public function output();
}


class PDFOutput implements SalesOutputInterface {

    public function output()
    {
        echo(PHP_EOL."PDF output".PHP_EOL.PHP_EOL);
    }

}

class HTMLOutput implements SalesOutputInterface {

    public function output()
    {
        echo(PHP_EOL."HTML output".PHP_EOL.PHP_EOL);
    }

}

class SalesReporter {

    public function generate(SalesOutputInterface $formatter)
    {
        $formatter->output();
    }

}

$salesReporterObject = new SalesReporter();
$salesReporterObject->generate(new PDFOutput);