<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/21/22
 * Time: 4:36 AM
 */


namespace App\QueryBuilders;


class DepartmentsQueryBuilder extends AbstractQueryBuilder implements QueryBuilderI
{
    public function __construct(protected string $search_string)
    {
        parent::__construct($search_string);
    }

    protected function buildQuery(): string
    {
        return "SELECT u.id, username, CONCAT(u.firstname,' ',u.lastname) AS fullname, d.department_name
                            FROM smart_search.users u 
                            INNER JOIN smart_search.users_departments ud ON u.id = ud.user_id
                            INNER JOIN smart_search.departments d ON ud.department_id = d.id 
                            WHERE LCASE(d.department_name) REGEXP :PATTERN  ";
    }
}
