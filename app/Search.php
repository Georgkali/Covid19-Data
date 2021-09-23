<?php

namespace App;

class Search
{
    private CovidData $data;
    private iterable $records;

    public function __construct()
    {
        $this->data = new CovidData();
        $this->records = $this->data->getData()->getRecords();
    }

    public function selections(string $param): array
    {
        $arr = [];
        foreach ($this->records as $record) {

            $arr[] = $record["$param"];

        }
        sort($arr);
        return array_unique($arr);
    }

    public function filter(string $param): array
    {
        $searchResult = [];
        foreach ($this->records as $record) {
            if (in_array($param, $record)) {
                $searchResult[] = $record;
            }
        }
        return $searchResult;
    }
}