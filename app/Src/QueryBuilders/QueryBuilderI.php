<?php


namespace App\QueryBuilders;


interface QueryBuilderI
{
  public function __construct(string $search_string);
  public function getQuery() : string;
  public function getBinding():string;
}
