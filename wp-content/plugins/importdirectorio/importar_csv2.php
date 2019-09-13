<?php
function importar_csv2() {
global $wpdb;

if (isset($_POST['submitFileUpload'])) {
    $file_import =  plugin_dir_path( __FILE__ ).'/import/'.$_FILES['file']['name'];
    if ($_FILES["file"]["type"] == "text/comma-separated-values" || $_FILES["file"]["type"] == "application/vnd.ms-excel") {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_import)) {
            $fp = fopen($file_import, 'r');
            $contador = 0;
            $direct_edit = 0;
            $direcadded = 0;            
            while (($data = fgetcsv($fp, 9999, ",")) !== FALSE) {

                       
                       if ($contador != 0) :
                     
                        
                        // Initialize the post ID to -1. This indicates no action has been taken.
                            $post_id = -1;
                        // Setup the author, slug, and title for the post
                            $author_id = 1;
                            $title = utf8_encode($data[1]);
                            $insertorupdate = true;
                            $category = get_cat_ID( $data[2] );
                            if ($category != 0){
                                    // If the page doesn't already exist, then create it
                                  $exist = get_page_by_title( $title ,OBJECT,'post' );
                                  $datos =  array(
                                                'comment_status'    =>  'closed',
                                                'ping_status'       =>  'closed',
                                                'post_author'       =>  $author_id,
                                                //'post_name'     =>  $slug,
                                                'post_title'        => $title,
                                                'post_status'       =>  'publish',
                                                'post_type'     =>  'post',
                                                'post_category' => array(10,$category)
                                            );

                                    if( null == $exist) {

                                        // Set the page ID so that we know the page was created successfully
                                        $post_id = wp_insert_post($datos);
                                        if ($post_id == 0){
                                            $insertorupdate = false;
                                        }else {
                                        	$direcadded++;
                                        }


                                    } else {
                                    	$datos["ID"] = $exist->ID;
                                    	$post_id = wp_update_post($datos);
                                    	if ($post_id == 0){
                                            $insertorupdate = false;
                                        }else{
                                        	$direct_edit++;	
                                        } 
                                    }
                            } else {
                                //No se encontro la categoria
                                $insertorupdate = false;
                            }


                            // end if

                            if ($insertorupdate){   
                                update_post_meta( $post_id, 'marcas', utf8_encode($data[3]) );
                                update_post_meta( $post_id, 'web', utf8_encode($data[4]) );                                
                                update_post_meta( $post_id, 'direccion', utf8_encode($data[5]) );                              
                                update_post_meta( $post_id, 'email', utf8_encode($data[6]) );
                                update_post_meta( $post_id, 'telefono', utf8_encode($data[7]) );
                                update_post_meta( $post_id, 'destacada', utf8_encode($data[8]) );
                                global $wpdb;
                                $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title='%s' and post_type='attachment';", $data[1] )); 
                                if (empty($attachment)){
                                	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title='%s' and post_type='attachment';", "defaultlogo" ));
                                	if (!empty($attachment)){                                		
                                		update_post_meta( $post_id, '_thumbnail_id', $attachment[0] );	
                                	}
                                    //echo "NO SE ENCONTRO";
                                }else{  
                                     update_post_meta( $post_id, '_thumbnail_id', $attachment[0] );
                                }
                                
                            }else {
                                //echo "NO INSERTO";
                            }


                        endif;

                        
                    
                   
              $contador++;
            }
        }
        $message_import = '<p>La importacion se ha realizado con exito!<br/>Se han actualizado '.$direct_edit.' registros.<br/>Se han insertado '.$direcadded.' directorios nuevos.</p>';
        //$message_import = '<p>La importacion se ha realizado con exito!<br>Se han insertado '.$direcadded.' financiamientos.</p>';
    }
    else {
        $message_import = '<p>El archivo subido no es correcto!</p>';
    }
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/infofinaciamiento/style-admin.css" rel="stylesheet" />
<div class="wrap">
	<h2>Importar directorio</h2>
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