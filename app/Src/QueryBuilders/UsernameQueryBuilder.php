<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/20/22
 * Time: 3:12 PM
 */


namespace App\QueryBuilders;


final class UsernameQueryBuilder extends AbstractQueryBuilder implements QueryBuilderI
{

    public function __construct(protected string $search_string)
    {
       parent::__construct($search_string);
    }

    protected function buildQuery(): string
    {
        return $this->base_query." WHERE LCASE(users.username) REGEXP :PATTERN ";
    }

}
