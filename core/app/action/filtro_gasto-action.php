<?php

    
    $base = new Database();
    $connection = $base->connect1();

    $query_values = $_POST;
    $extra_query = "WHERE Cancelled=0 ";

    if($query_values)
    {
        $extra_query.= " AND ";
        $values = [];
        $queries = [];

        foreach ($query_values as $field_name => $field_value)
        {
            foreach ($field_value as $value)
            {
                $values[$field_name][] = " {$field_name} = '{$value}'";
            }
        }

        foreach ($values as $field_name => $field_values)
        {
            $queries[$field_name] = "(".implode(" OR ", $field_values).")";
        }

        $extra_query.= " ".implode(" AND ", $queries);


    }

    $query = "SELECT * FROM gasto ".$extra_query;
    $users = $connection->query($query);

    $user_list = [];

    while($user = $users->fetch(PDO::FETCH_ASSOC))
    {
        $user_list[$user["id"]] = $user;
    }

    echo json_encode($user_list);