<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/20/22
 * Time: 3:53 AM
 */


namespace App\Models;


use App\QueryBuilders\DepartmentsQueryBuilder;
use App\QueryBuilders\EmailQueryBuilder;
use App\QueryBuilders\FullNameQueryBuilder;
use App\QueryBuilders\RegionsQueryBuilder;
use App\QueryBuilders\UsernameQueryBuilder;


final class SearchModel extends Model
{
    public function search(string $search_value = ''):string/*json*/
    {
        $full_name_query_builder = new FullNameQueryBuilder($search_value);
        $user_name_query_builder = new UsernameQueryBuilder($search_value);
        $email_query_builder = new EmailQueryBuilder($search_value);

        $query = $full_name_query_builder->getQuery(); //1 priority: fullname filter
        $query .= " UNION ";
        $query .= $email_query_builder->getQuery(); //2 priority: email filter
        $query .= " UNION ";
        $query .= $user_name_query_builder->getQuery(); //2 priority: username filter
        $query .= " LIMIT 50";
        $st = $this->db->prepare($query);

        /* it is the same pattern,created in the parent (abstract) QueryBuilder */
        $full_name_param = $full_name_query_builder->getBinding();
        $st->bindParam(":PATTERN", $full_name_param, \PDO::PARAM_STR);
        $st->execute();
        $users = $st->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($users);
    }
    public function additional_search(string $search_value = '', string $filter = 'departments'): string{
       $builder = $filter === 'regions' ?
           new RegionsQueryBuilder($search_value) :
           new DepartmentsQueryBuilder($search_value);
        $query = $builder->getQuery();
        $st = $this->db->prepare($query);
        $param = $builder->getBinding();
        $st->bindParam(":PATTERN", $param, \PDO::PARAM_STR);
        $st->execute();
        $users = $st->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($users);
    }
}
