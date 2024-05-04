<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TableModel extends Model
{

    use HasFactory;

    public function __construct()
    {
        $config = [
            'driver' => 'pgsql',
            "host" => '127.0.0.1',
            "database" => Session::get('db_name'),
            "username" => 'postgres',
            "password" => 'root',
        ];

        config()->set('database.connections.pgsql', $config);

        DB::purge('pgsql');
    }

    public function getPrimaryKey($table_name)
    {
        return DB::select("
    SELECT a.attname
    FROM   pg_index i
    JOIN   pg_attribute a ON a.attrelid = i.indrelid
    AND a.attnum = ANY(i.indkey)
    WHERE  i.indrelid = '$table_name'::regclass
    AND i.indisprimary LIMIT 1;");
    }
    public function updateColumnName($table_name, $column_name, $updated_column_name)
    {
        return DB::select("ALTER TABLE $table_name
        RENAME COLUMN $column_name TO $updated_column_name;");
    }
    public function updateDataType($table_name, $column_name, $updated_data_type, $updated_column_name)
    {
        return DB::select("ALTER TABLE $table_name
    ALTER COLUMN $column_name SET DATA TYPE $updated_data_type using $column_name::$updated_data_type;");
    }
    public function dropPrimaryKey($table_name, $table_pk)
    {
        return DB::select("ALTER TABLE $table_name DROP CONSTRAINT $table_pk;");
    }
    public function addPrimaryKey($table_name, $column_name)
    {
        return DB::select("ALTER TABLE $table_name ADD PRIMARY KEY ($column_name);");
    }
    public function updateIsNullable($table_name, $column_name, $is_null)
    {
        return DB::select("ALTER TABLE $table_name ALTER COLUMN $column_name $is_null;");
    }

    public function getForeignKeys($table_name = 'table_name')
    {
        return DB::select(
            "select kcu.table_schema || '.' || kcu.$table_name as foreign_table, '>-' as rel, rel_kcu.table_schema || '.' || rel_kcu.$table_name as primary_table, kcu.ordinal_position as no, kcu.column_name as fk_column, '=' as join, rel_kcu.column_name as pk_column, kcu.constraint_name

    from information_schema.table_constraints tco join information_schema.key_column_usage kcu on tco.constraint_schema = kcu.constraint_schema and tco.constraint_name = kcu.constraint_name join information_schema.referential_constraints rco on tco.constraint_schema = rco.constraint_schema and tco.constraint_name = rco.constraint_name join information_schema.key_column_usage rel_kcu on rco.unique_constraint_schema = rel_kcu.constraint_schema and rco.unique_constraint_name = rel_kcu.constraint_name
                                                    and kcu.ordinal_position = rel_kcu.ordinal_position
                                            where tco.constraint_type = 'FOREIGN KEY'
                                            order by kcu.table_schema,
                                          kcu.$table_name,
                                          kcu.ordinal_position;"
        );
    }


    public function colPropForErd($table_name)
    {
        return DB::select("select COLUMN_NAME, DATA_TYPE,
                (
                    SELECT a.attname
                    FROM   pg_index i
                    JOIN   pg_attribute a ON a.attrelid = i.indrelid
                                        AND a.attnum = ANY(i.indkey)
                    WHERE  i.indrelid = '$table_name'::regclass
                    AND i.indisprimary
                ) as primary_key
                from INFORMATION_SCHEMA.COLUMNS
                where TABLE_NAME='$table_name'");
    }


    public function getForeignKeysOfTable($table_name)
    {
        return DB::Select("
                SELECT
                    kcu.column_name
                FROM
                    information_schema.table_constraints AS tc
                    JOIN information_schema.key_column_usage AS kcu
                    ON tc.constraint_name = kcu.constraint_name
                    AND tc.table_schema = kcu.table_schema
                    JOIN information_schema.constraint_column_usage AS ccu
                    ON ccu.constraint_name = tc.constraint_name
                    AND ccu.table_schema = tc.table_schema
                WHERE tc.constraint_type = 'FOREIGN KEY' AND tc.table_name='$table_name'
            ");
    }

    # Task 3: Add getTableNamesOfDb() function below
    
    
    # Task 4: Add createTable() function below
    

    # Task 5: Add showTableStructure() function below


    # Task 6: Add dropTable() function below


    # Task 7: Add addNewTableCol() function below


    # Task 8: Add deleteTableColumn() function below


    # Task 9: Add getColumnDetails() function below
    

    # Task 11: Add getColumnsOfTable() function below


    # Task 12: Add addForeignKey() function below


}
