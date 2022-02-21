<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/20/22
 * Time: 3:20 PM
 */


namespace App\QueryBuilders;


abstract class AbstractQueryBuilder implements QueryBuilderI
{
    protected string $query_string;
    protected string $bind_pattern;
    protected string $base_query;

    public function __construct(private string $search_string)
    {
        $this->base_query = "SELECT id, username, CONCAT(firstname,' ',lastname) AS fullname, email FROM smart_search.users";
        $this->query_string = $this->buildQuery();
        $this->bind_pattern = $this->paramBinding();
    }

    /**
     * return MYSQL Query
     */
    public function getQuery(): string
    {
        return $this->query_string;
    }

    /**
     * return REGEXP for params binding
     */
    public function getBinding(): string
    {
        return '^' . $this->bind_pattern;
    }
    /**
     * build REGEXP pattern
     */
    protected function paramBinding(): string
    {
        if (str_contains($this->search_string, ' ')) {
            $this->search_string = str_replace('.', '\.', $this->search_string);
            return str_replace(" ", "|^", $this->search_string);
        }
        return $this->search_string;
    }
    /**
     * build MYSQL query
    */
    abstract protected function buildQuery(): string;
}
