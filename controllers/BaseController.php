<?php
class BaseController
{
    public function __construct(){}

    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO,$resp){
        echo("<script>location.href='index.php?controller=$controlador&action=$accion&resp=$resp';</script>");
    }

    //obtener por id
#-------------------------------------
    public function getById($id,$table)
    {
        $get = (new BaseModel)->getById($id,$table);
        return $get;
    }

    #Obtener Nombre select
#-------------------------------------
    public function getSelectByName($id,$table)
    {
        $getId = (new BaseModel)->getById($id,$table);
        $model = (new BaseModel)->getAll($table);
        foreach($model as $row){
            if($getId['id'] == $row['id'])
            {
                $selected = 'selected';
            }else
            {
                $selected = '';
            }
            echo "<option value='".$row[0]."' $selected>".$row[1]."</option>";
        }
    }

    public function CountvisitsController()
    {
        $get = (new BaseModel)->CountvisitsModel('visits');
        return $get;
    }


}//clase
 ?>