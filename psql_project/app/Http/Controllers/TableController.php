<?php

namespace App\Http\Controllers;

use App\Models\TableModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class TableController extends Controller
{
    # ERD diagram links function
    public function erdDiagramLinks($fk_infos)
    {
        $linkDataArray = array();
        $j = 0;
        foreach ($fk_infos as $fk_info) {
            $linkDataArray[$j]['from'] = substr($fk_info->primary_table, 7);
            $linkDataArray[$j]['to'] = substr($fk_info->foreign_table, 7);
            $linkDataArray[$j]['text'] = '1';
            $linkDataArray[$j]['toText'] = '1...N';
            $j++;
        }
        return $linkDataArray;
    }

    # Set color function
    public function setColor($pk, $columnName, $fks)
    {
        $color = 'blue';
        if ($pk == $columnName) {
            $color = 'red';
        }

        foreach ($fks as $fk) {
            if ($fk->column_name == $columnName) {
                $color = 'purple';
            }
        }
        return $color;
    }

    # Task 3: Add  showTables() function below


    # Task 4: Add createTable() function below
    

    # Task 5: Add the showTableStructure() function below


    # Task 6: Add the dropTable() function below


    # Task 7: Add the addNewTableCol() function below


    # Task 8: Add the deleteTableColumn() function below


    # Task 9: Add the getTableColValues() function below


    # Task 10: Add the updateTableColumn() function below


    # Task 10: Add the updatePrimaryKey() function below


    # Task 11: Add the getColumnsOfTable() function below


    # Task 12: Add the addForeignKey() function below


    # Task 13: Add the showErdDiagram() function below


}
