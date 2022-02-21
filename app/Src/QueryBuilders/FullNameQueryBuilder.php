<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/20/22
 * Time: 1:18 PM
 */


namespace App\QueryBuilders;


final class FullNameQueryBuilder extends AbstractQueryBuilder implements QueryBuilderI
{
    public function __construct(protected string $search_string)
    {
        parent::__construct($search_string);
    }

    protected function buildQuery(): string
    {
        return $this->base_query." WHERE LCASE(users.firstname) REGEXP :PATTERN OR LCASE(users.lastname) REGEXP :PATTERN ";
    }

}
