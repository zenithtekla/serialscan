<?php
    // query to select all entry matching $_SESSION['format'] => the regex WHERE serial_number = $qr;
    // serial_id, assembly_id, customer_id, sale_order_id, serial_number, user_id, time
    // query to insert into the db
    require_once('../model/dbi_con.php');
    require_once('core/is_auth.php');
    require_once('core/date_time.php');

    if(isset($_POST['new_scan']))
{
    $t_new_scan       = $_POST['new_scan'];
    $regex          = "/[0-9]{7}/"; // $regex = $_SESSION['format'];
    if (is_scalar($t_new_scan)){
        if (preg_match($regex, $t_new_scan)){
            $t_serial_table = 'seriscan_serial';

            $t_assembly_id      = $_SESSION['assemblyId'];
            $t_customer_id      = $_SESSION['customerId'];
            $t_sale_order_id    = $_SESSION['sale_order'];
            $t_user_id          = $_SESSION['userId'];
            $t_date_time        = getDateTime2();

            $qr = "SELECT serial_number FROM $t_serial_table WHERE serial_number='$t_new_scan'";
            $result = $mysqli->query($qr) or die($mysqli->error);
            $num_rows = $result->num_rows;
            if ($num_rows)
                echo "ERROR 13 - Duplicated scan!";
            else {
                $qr = sprintf("INSERT INTO $t_serial_table " .
						" (serial_id, assembly_id, customer_id, sale_order_id, serial_number, user_id, time ) " .
						" VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s');",
								$t_assembly_id,
								$t_customer_id,
								$t_sale_order_id,
								$t_new_scan,
								$t_user_id,
								$t_date_time);
		        $result = $mysqli->query($qr) or die($mysqli->error);
                $_SESSION['ss_key']     += 1;
                echo $_SESSION['ss_key'] . ". " . $t_new_scan;
            }
            $mysqli->close();
        }
        else echo "ERROR 20 - regEx not matched";
    }
        // echo json_encode($qr, JSON_FORCE_OBJECT);
        // echo json_encode($qr, JSON_PRETTY_PRINT);

}
// die (json_encode (array ('qr'=>'Your script worked fine')));
?>
