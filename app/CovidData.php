<?php

namespace app;

use League\Csv\Reader;

class CovidData
{
    private Reader $data;
    private array $header;
    private iterable $records;

    public function __construct()
    {
        $this->data = Reader::createFromPath("app/covid.csv");
        $this->data->setDelimiter(";");
        $this->data->setHeaderOffset('0');
        $this->header = $this->data->getHeader();
        $this->records = $this->data->getRecords();
    }

    public function getData(): Reader
    {
        return $this->data;
    }
    public function getHeader(): array
    {
        return $this->header;
    }

    public function getRecords(): iterable
    {
        return $this->records;
    }
}