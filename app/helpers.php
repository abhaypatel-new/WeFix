<?php
 function raw_query($roleid,$type,$condition =null)
 {
     $sql="SELECT
    users.*,shops.name as shop_name,
    GROUP_CONCAT(categories.name SEPARATOR ',') AS `Category`".$condition."
FROM users left join shops on users.id=shops.".$type."
INNER JOIN categories
    ON categories.id IN (
        SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(users.category, ',', n.n), ',', -1) value
        FROM (
            SELECT a.N + b.N * 10 + 1 n
            FROM
            (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a
            ,(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b
            ORDER BY n
        ) n
        WHERE n.n <= 1 + (LENGTH(users.category) - LENGTH(REPLACE(users.category, ',', '')))
        ORDER BY value
    ) where roleid=".$roleid."
GROUP BY
    users.id,
    users.email";
    
    return $sql;
 }


 function raw_querys($roleid)
 {
     $sql="SELECT
    users.*,
    GROUP_CONCAT(categories.name SEPARATOR ',') AS `Category`
FROM users 
INNER JOIN categories
    ON categories.id IN (
        SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(users.category, ',', n.n), ',', -1) value
        FROM (
            SELECT a.N + b.N * 10 + 1 n
            FROM
            (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a
            ,(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b
            ORDER BY n
        ) n
        WHERE n.n <= 1 + (LENGTH(users.category) - LENGTH(REPLACE(users.category, ',', '')))
        ORDER BY value
    ) where roleid=".$roleid."
GROUP BY
    users.id,
    users.email";
    
    return $sql;
 }
 
 
 function get_comma_sepearted_id_names($table1,$table2,$column)
 {
    $query= "SELECT
    ".$table1.".*,
    GROUP_CONCAT(".$table2.".".$column." SEPARATOR ',') AS `Category`
FROM ".$table1." 
INNER JOIN ".$table2."
    ON ".$table2.".id IN (
        SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(".$table1.".".$column.", ',', n.n), ',', -1) value
        FROM (
            SELECT a.N + b.N * 10 + 1 n
            FROM
            (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a
            ,(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b
            ORDER BY n
        ) n
        WHERE n.n <= 1 + (LENGTH(".$table1.".".$column.") - LENGTH(REPLACE(".$table1.".".$column.", ',', '')))
        ORDER BY value
    ) 
GROUP BY
    ".$table1.".id";
    
    
    return $query;
     
 }
 