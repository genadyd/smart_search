<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/21/22
 * Time: 4:51 AM
 */


namespace App\QueryBuilders;


class RegionsQueryBuilder extends AbstractQueryBuilder implements QueryBuilderI
{
    public function __construct(protected string $search_string)
    {
        parent::__construct($search_string);
    }

    protected function buildQuery(): string
    {
        return "SELECT u.id, username, CONCAT(u.firstname,' ',u.lastname) AS fullname, r.region_name
                            FROM smart_search.users u 
                            INNER JOIN smart_search.users_regions ur ON u.id = ur.user_id
                            INNER JOIN smart_search.regions r ON ur.region_id = r.id
                            WHERE LCASE(r.region_name) REGEXP :PATTERN  ";
    }
}
