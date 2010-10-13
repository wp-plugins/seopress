<?php 
/**
 * SeoPress
 *
 * @package SeoPress
 * @author Sven Lehnert
 * @copyright Copyright (C) Sven Lehnert
 **/

/*
============================================================================================================
This software is provided "as is" and any express or implied warranties, including, but not limited to, the
implied warranties of merchantibility and fitness for a particular purpose are disclaimed. In no event shall
the copyright owner or contributors be liable for any direct, indirect, incidental, special, exemplary, or
consequential damages (including, but not limited to, procurement of substitute goods or services; loss of
use, data, or profits; or business interruption) however caused and on any theory of liability, whether in
contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of
this software, even if advised of the possibility of such damage.

For full license details see license.txt
============================================================================================================ */


  /**
   * Text Counter
   *
   * @param $lable (label)
   * @param $meta_length (meta length)	 
   * @return javascript template
   */

	function text_counter($lable, $meta_length){
		$tmp  .= '<script type="text/javascript">';
		$tmp  .= ' $(document).ready(function()';
		$tmp  .= '{';
		$tmp  .= '$("#'.$lable.'").keyup(function()';
		$tmp  .= '{';
		$tmp  .= 'var box=$(this).val();';
		$tmp  .= 'var main = box.length *100;';
		$tmp  .= 'var value= (main / '.$meta_length.');';
		$tmp  .= 'var count= '.$meta_length.' - box.length;';
		
		$tmp  .= 'if(box.length <= '.$meta_length.')';
		$tmp  .= '{';
		$tmp  .= '$("#count'.$lable.'").html(count);';
		$tmp  .= '$("#bar'.$lable.'").animate(';
		$tmp  .= '{';
		$tmp  .= '"width": value+"%",';
		$tmp  .= '}, 1);';
		$tmp  .= '}';
		$tmp  .= 'else';
		$tmp  .= '{';
		$tmp  .= 'alert("Full");';
		$tmp  .= '}';
		$tmp  .= 'return false;';
		$tmp  .= '});';
		$tmp  .= '});';
		$tmp  .= '</script>';
		return $tmp;
	}

  /**
   * Text Counter
   *
   * @param $text (Text to filter keywords from)
   * @return keywords
   */

	function get_keywords_from_content($text) {
		$woerter = explode(" ",$text);
		for ($i = 0; $i < count($woerter); $i ++){   
		   $substantiv_filter = "/^[A-Z]/";
		   if(preg_match($substantiv_filter, $woerter[$i]))
		    {
		      $satzzeichen_filter = array(".", ",", ";", ":", "-", "(", ")", "\"");
		      $substantive[$i] = str_replace($satzzeichen_filter, "", $woerter[$i]);
		     }
		    if(substr($woerter[$i], strlen($woerter[$i])-1) == ".") 
		    {
		      $i++;    
		    }
		}  
		if(!is_array($substantive)){
			return;
		}
		
		$substantive = array_count_values($substantive);
		arsort($substantive); 
		$keys = array_keys($substantive);
		$a = 8; 
		if(get_option('bp_seo_keywords_quantity')){
			$a = get_option('bp_seo_keywords_quantity');
		}
		
		//Substantive der Array Keys in neues auslesbares Array umwandeln, Ausgabe der häufigsten Substantive
		$keys_count = count($keys);
		$keys_count = $keys_count -1; 
		for($i = 0; $i < $a; $i++) {
			if($keys_count >= $i){
				if($keys_count == $i){
					$key_words .= $keys[$i];
				} else {
					$key_words .= $keys[$i].", ";
				}
			}
		
		} 
		return $key_words;
	}
?>