<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/20/22
 * Time: 4:42 PM
 */


namespace App\QueryBuilders;


class EmailQueryBuilder extends AbstractQueryBuilder implements QueryBuilderI
{
    public function __construct(protected string $search_string)
    {
        parent::__construct($search_string);
    }

    protected function buildQuery(): string
    {
        return $this->base_query." WHERE LCASE(users.email) REGEXP :PATTERN ";
    }
}
