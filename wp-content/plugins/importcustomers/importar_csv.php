<?php
function importar_csv() {
global $wpdb;

if (isset($_POST['submitFileUpload'])) {
    $file_import =  plugin_dir_path( __FILE__ ).'/import/'.$_FILES['file']['name'];
    if ($_FILES["file"]["type"] == "text/comma-separated-values" || $_FILES["file"]["type"] == "application/vnd.ms-excel") {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_import)) {
            $fp = fopen($file_import, 'r');
            $contador = 0;
            $users_edited = 0;
            $users_added = 0;            
            while (($data = fgetcsv($fp, 9999, ";")) !== FALSE) {
                       
                        $user_data = array(
                        'user_login'        =>  $data[4],
                        'user_pass'         =>  NULL,
                        'user_email'        =>  $data[4],
                        'display_name'      =>  $data[2],
                        'nickname'          =>  $data[2],
                        'first_name'        =>  $data[2],                          
                        'user_registered' =>    date('Y-m-d h:i:s'),
                        'role' => 'customer'
                        //'user_pass'   =>  NULL  // When creating a new user, `user_pass` is expected.
                        );
                            $ID = username_exists($data[4]);
                            
                            if ($ID){                                                                
                            	$user_data['ID'] = $ID;
                                $user_id = wp_update_user($user_data);

                                $users_edited++;
                            }else {
                                $user_id = wp_insert_user( $user_data ) ;
                                $users_added++;
                            }

                        if ( is_wp_error( $user_id ) ) {
 								echo $user_id->get_error_message(). " Verifique la linea N°".$contador;
                                die();
                        } else {
                        	update_user_meta( $user_id, 'billing_company', $data[0] ); 
                        	add_user_meta( $user_id, "nit", $data[1] );
                        }

                        
                    
                    /*else {
                    	/*$wpdb->update(
							                $tablacotizador, //table
							                array('financiera' => $data[1], 'nombre_vehiculo' => $data[2], 'id_postvehiculo' => $data[3], 'modelo' => $data[4], 'cuotas48' => $data[5], 'cuotas36' => $data[6], 'cuotas24' => $data[7], 'cuotas12' => $data[8]), //data
							                array('id' => $id), //where
							                array('%s'), //data format
							                array('%s') //where format
							        );
                        $users_edited++;
                    }*/
              $contador++;
            }
        }
        $message_import = '<p>La importacion se ha realizado con exito!<br/>Se han actualizado '.$users_edited.' registros.<br/>Se han insertado '.$users_added.' usuarios nuevos.</p>';
        //$message_import = '<p>La importacion se ha realizado con exito!<br>Se han insertado '.$users_added.' financiamientos.</p>';
    }
    else {
        $message_import = '<p>El archivo subido no es correcto!</p>';
    }
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/infofinaciamiento/style-admin.css" rel="stylesheet" />
<div class="wrap">
	<h2>Importar financiamientos</h2>
	<?php if (!empty($message_import)) echo $message_import; ?>
	<form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<table class='wp-list-table widefat fixed'>
			<tr>
				<td><label>Selecciona un archivo .csv </label></td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<input type="submit" value="Cargar" name="submitFileUpload">
					</center>
				</td>
			</tr>
		</table>

  </form>
</div>
<!-- <fieldset>

    <legend>Importador de usuarios</legend>
    <?php //if (!empty($message_import)) echo $message_import; ?>
    <form enctype="multipart/form-data" method="POST" action="<?php //echo $_SERVER['REQUEST_URI']; ?>">
        <label>Selecciona un archivo .csv </label>
        <input type="file" name="file">
        <input type="submit" value="Upload" name="submitFileUpload">
    </form>
</fieldset> -->
<?php
}