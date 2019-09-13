<?php
  namespace iberezansky\fb3d;
  use \WP_Query;

  function convert_tax_to_tax_query($tax) {
    $ids = explode(',', $tax);
    $iids = array();
    foreach($ids as $id) {
      array_push($iids, intval($id));
    }
    return array(array(
      'taxonomy'=> POST_ID.'-category',
  		'field'=> 'term_id',
  		'terms'=> $iids
    ));
  }

  function shortcode_handler($atts, $content='') {
    $atts = shortcode_atts(
      array(
        'id'=> '0',
        'mode'=> 'fullscreen',
        'title'=> 'false',
        'template'=> 'default',
        'lightbox'=> 'dark',
        'classes'=> '',
        'urlparam'=> 'fb3d-page',
        'page-n'=>'0',
        'pdf'=> '',
        'tax'=> 'null',
        'thumbnail'=> '',
        'cols'=> '3'
      ),
      $atts
    );

    if($atts['tax']==='null') {
      $is_link = $atts['mode']=='link-lightbox';
      $atts['template'] = 'short-white-book-view';

      register_scripts_and_styles();
      wp_enqueue_style(POST_ID.'-client');

      $id = 'fb3d-'.time();
      if(isset($_GET['vc_editable'])) {
        ob_start();
        ?>
        <style type="text/css">
          .pseudo-thumbnail {
            width: 150px;
            height: 150px;
            display: inline-block;
            background-color: #f8f8f8;
            background-image: url('<?php echo(ASSETS_IMAGES.'pseudo-thumbnail.png')?>');
            position: relative;
          }
          .pseudo-thumbnail::after {
            content: 'Thumbnail';
            position: absolute;
            top: 40%;
            left: 50%;
            font-size: 14px;
            transform: translate(-50%, -50%);
            color: #2c4c7e;
          }
          .pseudo-3d-flip-book {
            background-color: #f8f8f8;
            height: 100%;
            width: 100%;
            background-image: url('<?php echo(ASSETS_IMAGES.'pseudo-3d-flip-book.png')?>');
            background-repeat: round;
            position: relative;
          }
          .pseudo-3d-flip-book::after {
            content: 'Fullscreen';
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 20px;
            transform: translate(-50%, -50%);
            color: #2c4c7e;
          }
        </style>
        <script src="<?php echo(ASSETS_JS.'vc-init-preview.js')?>"></script>
        <script type="text/javascript">
          fb3d.ajaxurl = '<?php echo(admin_url('admin-ajax.php')) ?>'
          fb3d.initVCPreview('<?php echo($id)?>');
        </script>
        <?php
        $init = ob_get_clean();
      }
      else {
        $init = '';
        wp_enqueue_script(POST_ID.'-'.$atts['mode']);
      }

      $classes = str_replace(array(' ', "\t"), '', $atts['classes']);
      $classes = implode(' ', explode(',', $classes));

      $r = sprintf('<%s id="%s" class="full-size %s %s"', $is_link? 'a href="#"': 'div', $id, POST_ID, $classes);
      foreach($atts as $k=> $v) {
        if($k!=='classes') {
          $r .= sprintf(' data-%s="%s"', $k, $v);
        }
      }
      $r.='>';

      $res = $is_link? $r.$content.'</a>'.$init: $r.'</div>'.$init.$content;
    }
    else {
      $params = array('post_type'=> '3d-flip-book', 'posts_per_page'=>-1);
  		if($atts['tax']!=='') {
        if(substr($atts['tax'], 0, 1)==='{') {
          $params['tax_query'] = json_decode(str_replace("'", '"', $atts['tax']), true);
        }
  			else {
          $params['tax_query'] = convert_tax_to_tax_query($atts['tax']);
        }
  		}
  		$q = new WP_Query($params);
  		$params = $atts;
  		$cols = intval($atts['cols']);
  		unset($params['tax']);
      ob_start();
  		echo('<table><tr>');
  		for($i=0; $i<$q->post_count; ++$i) {
  			if($i%$cols===0 && $i) {
  				echo('</tr><tr>');
  			}
  			$params['id'] = $q->posts[$i]->ID;
  			echo('<td>'.shortcode_handler($params).'</td>');
      }
  		echo('</tr></table>');
      $res = ob_get_clean();
    }

    return $res;
  }

  add_shortcode(POST_ID, '\iberezansky\fb3d\shortcode_handler');
?>
