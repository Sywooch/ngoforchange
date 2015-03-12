<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Medicines;
use app\models\MedicinesMoves;

class ApiController extends Controller
{
    
    /**
        Medicine Functionality
    */
    public function actionMedicines()
    {
        // Medcine List
    	$id = '';
    	if(isset($_GET['id']) && $_GET['id'] != "")
    		$id = $_GET['id'];

    	$medicines = [];

    	if($id == '')
    		$medicines = Medicines::find()->all();
    	else
    		$medicines = Medicines::findAll($id);

    	Yii::$app->response->format = 'json';
    	return self::defaultResponse(200, false, $medicines);
    }

    public function actionMedupdate()
    {
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        foreach($input as $key => $value) {
            if($value->id == null || $value->id == '')
                continue;

            $med = Medicines::findOne($value->id);
            $med->name = $value->name;
            $med->unit_type = $value->unit_type;
            $med->details = $value->details;

            $med->update();
            array_push($response, $med->attributes);
        }

        Yii::$app->response->format = 'json';
        return self::defaultResponse(200, false, $response);
    }

    public function actionMedcreate()
    {
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        foreach($input as $key => $value) {
            $med = new Medicines();
            $med->setAttributes([
                'name' => $value->name,
                'unit_type' => $value->unit_type,
                'details' => $value->details
                ]);

            $med->save();
            array_push($response, $med->attributes);
        }

        Yii::$app->response->format = 'json';
        return self::defaultResponse(200, false, $response);
    }

    public function actionMeddestroy()
    {
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        foreach($input as $key => $value) {
            if($value->id == null || $value->id == '')
                continue;

            $med = Medicines::findOne($value->id);
            $med->name = $value->name;
            $med->unit_type = $value->unit_type;
            $med->details = $value->details;

            if($med->delete() > 0)
                array_push($response, $med->attributes);
        }

        Yii::$app->response->format = 'json';
        return self::defaultResponse(200, false, $response);
    }

    public function actionMedmoves()
    {
        // Medicine Movements list by medicine_id
        $medicine_id = '';
        if(isset($_GET['id']) && $_GET['id'] != "")
            $medicine_id = $_GET['id'];

        $sql = 
            "SELECT mv.*, m.name AS medicine_name, m.unit_type AS medicine_unit_type, m.details AS medicine_details, ".
            "(CASE ". 
                "WHEN p.id IS NOT NULL THEN CONCAT(p.surname, ' ', p.name) ".
                "WHEN f.id IS NOT NULL THEN CONCAT(f.surname, ' ', f.name) ".
                "WHEN o.id IS NOT NULL THEN CONCAT(o.surname, ' ', o.name) ".
                "WHEN v.id IS NOT NULL THEN CONCAT(v.surname, ' ', v.name) ELSE '' END) AS donator ".
            "FROM `medicines_movement` mv ".
            "LEFT JOIN `patients` p ON mv.donator_type = 'patients' AND mv.donator_id = p.id ".
            "LEFT JOIN `friends` f ON mv.donator_type = 'friends' AND mv.donator_id = f.id ".
            "LEFT JOIN `officials` o ON mv.donator_type = 'officials' AND mv.donator_id = o.id ".
            "LEFT JOIN `volunteers` v ON mv.donator_type = 'volunteers' AND mv.donator_id = v.id ".
            "LEFT JOIN `medicines` m ON mv.medicine_id = m.id ";

        if($medicine_id != '')
            $sql .= "WHERE medicine_id = :medicine_id";

        $command = Yii::$app->db->createCommand($sql, [':medicine_id' => $medicine_id]);
        $moves = $command->queryAll();

        /*
            // Medcine List
        $id = '';
        if(isset($_GET['id']) && $_GET['id'] != "")
            $id = $_GET['id'];

        $medicines = [];

        if($id == '')
            $medicines = Medicines::find()->all();
        else
            $medicines = Medicines::findAll($id);

        Yii::$app->response->format = 'json';
        return self::defaultResponse(200, false, $medicines);
        */
        Yii::$app->response->format = 'json';
        return self::defaultResponse(200, false, $moves);
    }

    public function actionMedstock()
    {
        // Medicine Stock
        $sql = 
            "SELECT ".
            "mv.medicine_id, m.name, m.unit_type, m.details, mv.expiration_date, SUM(mv.count) AS count_stock ".
            "FROM `medicines_movement` mv ".
            "LEFT JOIN `medicines` m ON  mv.medicine_id = m.id ".
            "WHERE expiration_date > DATE(NOW()) ".
            "GROUP BY medicine_id, expiration_date ";
        $command = Yii::$app->db->createCommand($sql);
        $stock = $command->queryAll();
        Yii::$app->response->format = 'json';
        return self::defaultResponse(200, false, $stock);
    }

    public function actionMednotifs()
    {
        $alerts = array();
        $warns = array();

        // Expired Items
        $sql =
            "SELECT ".
            "mv.medicine_id, mv.expiration_date, mv.count, m.* ".
            "FROM `medicines_movement` mv ".
            "LEFT JOIN `medicines` m ON  mv.medicine_id = m.id ".
            "WHERE count > 0 AND expiration_date <= DATE(NOW())";
        $alerts = Yii::$app->db->createCommand($sql)->queryAll();

        // Near to Expire
        $sql = 
            "SELECT ".
            "mv.medicine_id, mv.expiration_date, mv.count, m.* ".
            "FROM `medicines_movement` mv ".
            "LEFT JOIN `medicines` m ON  mv.medicine_id = m.id ".
            "WHERE count > 0 AND expiration_date > DATE(NOW()) AND expiration_date <= (DATE(NOW()) + INTERVAL 1 MONTH)";
        $warns = Yii::$app->db->createCommand($sql)->queryAll();

        $response = [
            'alerts' => $alerts,
            'warns' => $warns
        ];
        Yii::$app->response->format = 'json';
        return self::defaultResponse(200, false, $response);
    }

    /**
        Invoices Functionality
    */
    public function actionInvoices()
    {
        $id = '';
        if(isset($_GET['id']) && $_GET['id'] != "")
            $id = $_GET['id'];

        
    }

    public function actionInvin()
    {

    }

    public function actionInvout()
    {

    }

    public function actionInvbalance()
    {

    }

    public function actionInvbalancerep($from, $to)
    {

    }

    /**
        Contacts Functionality
    */
    public function actionContacts()
    {

    }

    public function actionContadd()
    {

    }

    public function actionContdelete()
    {

    }

    public function actionContupdate()
    {
        
    }

}

?>