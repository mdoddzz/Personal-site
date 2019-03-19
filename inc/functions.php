<?

function strtotimeuk($date)
{
	$date = explode(' ', $date);
	
	$day = $date[0];
	$time = $date[1];
	
	$dateArray = explode("/",$day);
	return strtotime($dateArray[2]."-".$dateArray[1]."-".$dateArray[0].' '.$time);
}

function getDirFiles($dirPath, $searchString=0, $excludeExt=0)
{
	$filesArr = array();
	if ($handle = opendir($dirPath)) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..")
			{
				if ($searchString)
				{
					if ($excludeExt)
						$filename = before_last(".", $file);
					else
						$filename = $file;
						
					if(stristr($filename, $searchString)) $filesArr[] = trim($file);
				} 
				else $filesArr[] = trim($file);
			}
		} // end while
		closedir($handle);
	}  // end handle
	return $filesArr;    
}

// Find in string functions
function after($thisVar, $inthat)
{
   if (!is_bool(strpos($inthat, $thisVar)))
   return substr($inthat, strpos($inthat,$thisVar)+strlen($thisVar));
}

function afterLast($thisVar, $inthat)
{
   if (!is_bool(strrevpos($inthat, $thisVar)))
   return substr($inthat, strrevpos($inthat, $thisVar)+strlen($thisVar));
}

function before($find, $inthat)
{
   return substr($inthat, 0, strpos($inthat, $find));
}

function beforeLast($thisVar, $inthat)
{
   return substr($inthat, 0, strrevpos($inthat, $thisVar));
}

function between($thisVar, $that, $inthat)
{
	return before($that, after($thisVar, $inthat));
}

function betweenLast($thisVar, $that, $inthat)
{
	return afterLast($thisVar, beforeLast($that, $inthat));
}

function strrevpos($instr, $needle)
{
   $rev_pos = strpos (strrev($instr), strrev($needle));
   if ($rev_pos===false) return false;
   else return strlen($instr) - $rev_pos - strlen($needle);
}

function implodeWithKeys($glue, $keyValGlue, $array) {
	$output = array();
	foreach( $array as $key => $item )
			$output[] = $key . $keyValGlue . $item;

	return implode($glue, $output);
} 

function explodeWithKeys($seperator, $keyValSeperator, $string, $trim=0)
{
	$output=array();
	$array=explode($seperator, $string);
	foreach ($array as $value)
			{
			$row=explode($keyValSeperator,$value);
			if ($trim)
			{
				$output[trim($row[0])]=trim($row[1]);
			}
			else
			{
				$output[$row[0]]=$row[1];
			}
	}
	return $output;
}

function base64Upload($base64, $filename, $uploadDirectory, $quality=80)
{
	$data = explode(',', $base64);
	$img = base64_decode($data[1]);
	
	$tmpPath = uploadRoot.'/tmp/image.png';

	if (!file_put_contents($tmpPath, $img))
	{
		die('Cannot write to temporary folder: '.$tmpPath);
	}
	
	$image = imagecreatefrompng($tmpPath);
	$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
	imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
	imagealphablending($bg, TRUE);
	imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
	imagedestroy($image);
	imagejpeg($bg, siteRoot.'/'.$uploadDirectory.$filename, $quality);
	imagedestroy($bg);
	
}

function base64UploadCrop($base64, $filename, $uploadDirectory, $imgWidth, $imgHeight, $quality=80)
{
	$data = explode(',', $base64);
	$img = base64_decode($data[1]);
	
	$tmpPath = uploadRoot.'/tmp/image.png';

	if (!file_put_contents($tmpPath, $img))
		die('Cannot write to temporary folder: '.$tmpPath);
	
	$image = imagecreatefrompng($tmpPath);
	$bg = imagecreatetruecolor($imgWidth,$imgHeight);
	imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
	imagedestroy($image);
	imagejpeg($bg, siteRoot.'/'.$uploadDirectory.$filename, $quality);
	imagedestroy($bg);
	
}

function urlClean($str)
{
 	return urlencode( strtolower( str_replace(array("?","="," ","(",")","#","&","@","%", "/", "'","\""),array("","-","-","-","-","-","-","-","-","-", "", ""), ($str)) ) );
}

function createDir($dir, $mode=755)
{
	mkdir($dir);
	chmod($dir, $mode);
}

function moveDir($old, $new)
{
	rename($old, $new);
}

function deleteDir($dir)
{
	if (is_dir($dir))
	{ 
		$objects = scandir($dir); 
		foreach ($objects as $object)
		{ 
			if ($object != "." && $object != "..")
			{ 
				if (is_dir($dir."/".$object))
					deleteDir($dir."/".$object);
				else
					unlink($dir."/".$object); 
			}
		}
		rmdir($dir); 
	}
}

function appendNumber($path, $filename){
    if ($pos = strrpos($filename, '.')) {
           $name = substr($filename, 0, $pos);
           $ext = substr($filename, $pos);
    } else {
           $name = $filename;
    }

    $newpath = $path.'/'.$filename;
    $newname = $filename;
    $counter = 0;
    while (file_exists($newpath)) {
           $newname = $name.'('.$counter.')'.$ext;
           $newpath = $path.'/'.$newname;
           $counter++;
    }
	
	return $newname;
}


#newFileLoc is the location where to save the cropped image too needs to be full path
#ImageToCrop is full path for the image to crop, 
#cropAreaWidth/cropAreaHeight is the height and width of the selection/bit you want to crop
#cropX,CropY is the x/y co-ords of the selection, 
#scale is the width that you want the cropped image to be divided by cropAreaWidth
function simpleImageResize($newFileLoc, $imageToCrop, $cropAreaWidth, $cropAreaHeight, $cropX, $cropY, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($imageToCrop);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($cropAreaWidth * $scale);
	$newImageHeight = ceil($cropAreaHeight * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($imageToCrop); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($imageToCrop); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($imageToCrop); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$cropX,$cropY,$newImageWidth,$newImageHeight,$cropAreaWidth,$cropAreaHeight);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$newFileLoc); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$newFileLoc,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$newFileLoc);  
			break;
    }
	chmod($newFileLoc, 0777);
	return $newFileLoc;
}

function resizeImage($file, $string=null, $width=0, $height=0, $proportional=false, $output='file', $deleteOriginal=true, $useLinuxCommands=false, $quality=100, $debug=false)
{     
	if ($height <= 0 && $width <= 0)
	{
		if ($debug)
		{
			echo "RESULT: FALSE, EITHER HEIGHT OR WIDTH NEED TO BE PROVIDED<br/>";
		}
		return false;
	}
	
	if ($file === null && $string === null)
	{
		if ($debug)
		{
			echo "RESULT: FALSE, NO FILE FOUND<br/>";
		}
		return false;
	}

    # Setting defaults and meta
    $info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    
	if ($debug)
	{
		var_dump($info);
	}
	
	$image = '';
    $finalWidth = 0;
    $finalHeight = 0;
    list($widthOld, $heightOld) = $info;
	$cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional)
	{
		if ($width  == 0)
		{
			$factor = $height/$heightOld;
		}
		elseif($height == 0)
		{
			$factor = $width/$widthOld;
		}
		else
		{
			$factor = min($width/$widthOld, $height/$heightOld );
		}
		$finalWidth  = round($widthOld*$factor);
		$finalHeight = round($heightOld*$factor);
    }
    else 
	{
		$finalWidth = ($width <= 0) ? $widthOld:$width;
		$finalHeight = ($height <= 0) ? $heightOld:$height;
		$widthX = $widthOld/$width;
		$heightX = $heightOld/$height;
		
		$x = min($widthX, $heightX);
		$cropWidth = ($widthOld-$width*$x)/2;
		$cropHeight = ($heightOld-$height*$x)/2;
    }

    # Loading image to memory according to type
    switch ($info['mime'])
	{
    	case 'image/jpeg':
	  		$file !== null ? $image = imagecreatefromjpeg($file):$image = imagecreatefromstring($string);
			break;
      	case 'image/gif':
	  		$file !== null ? $image = imagecreatefromgif($file):$image = imagecreatefromstring($string);
			break;
      	case 'image/png':
	  		$file !== null ? $image = imagecreatefrompng($file):$image = imagecreatefromstring($string);
			break;
      	default:
			if ($debug)
			{
				echo "RESULT: FALSE, IMAGE TYPE NOT RECOGNISED<br/>";
			}
			return false;
    }
	
    # This is the resizing/resampling/transparency-preserving magic
    $imageResized = imagecreatetruecolor($finalWidth, $finalHeight);
    if (($info['mime'] == 'image/gif') || ($info['mime'] == 'image/png')) {
		$transparency = imagecolortransparent($image);
		$palletsize = imagecolorstotal($image);
		
		if ($transparency >= 0 && $transparency < $palletsize)
		{
			$transparentColor = imagecolorsforindex($image, $transparency);
			$transparency = imagecolorallocate($imageResized, $transparentColor['red'], $transparentColor['green'], $transparentColor['blue']);
			imagefill($imageResized, 0, 0, $transparency);
			imagecolortransparent($imageResized, $transparency);
		}
		elseif ($info['mime'] == 'image/png')
		{
			imagealphablending($imageResized, false);
			$color = imagecolorallocatealpha($imageResized, 0, 0, 0, 127);
			imagefill($imageResized, 0, 0, $color);
			imagesavealpha($imageResized, true);
		}
    }
    imagecopyresampled($imageResized, $image, 0, 0, $cropWidth, $cropHeight, $finalWidth, $finalHeight, $widthOld-2*$cropWidth, $heightOld-2*$cropHeight);
	
	
    # Taking care of original, if needed
    if ($deleteOriginal)
	{
    	if ($useLinuxCommands)
		{
			exec('rm '.$file);
		}
    	else
		{
			@unlink($file);
		}
    }

    # Preparing a method of providing result
    switch (strtolower($output)) {
		case 'browser':
			$mime = image_type_to_mime_type($info['mime']);
			header("Content-type: $mime");
			$output = NULL;
			break;
		case 'file':
			$output = $file;
			break;
		case 'return':
			return $imageResized;
			break;
		default:
			break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ($info['mime'])
	{
		case 'image/gif':
			imagegif($imageResized, $output);
			break;
		case 'image/jpeg':
			imagejpeg($imageResized, $output, $quality);
			break;
		case 'image/png':
			$quality = 9-(int)((0.9*$quality)/10.0);
			imagepng($imageResized, $output, $quality);
			break;
		default:
			if ($debug)
			{
				echo "RESULT: FALSE, IMAGE CANNOT BE SAVED<br/>";
			}
			return false;
    }
	if ($debug)
	{
		echo "RESULT: TRUE<br/>";
	}
    return true;
}

function getBrowser()
{
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
	{
		return 'Internet Explorer';
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE)
	{
		return "Internet Explorer";
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
	{
		return "Mozilla Firefox";
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
	{
		return "Google Chrome";
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
	{
		return "Opera Mini";
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
	{
		return "Opera";
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
	{
		return "Safari";
	}
	else
	{
		return "Unknown Browser";
	}	
}

function hex2rgb($hex, $returnArray=false) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   
   if ($returnArray)
   {
		$rgb = array($r, $g, $b);
		return $rgb; 
   }
   else
   {
	 return $r.",".$g.",".$b;  
   }
}

function getclientip() {
	
	$ipaddress = '';
	
	if(isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	elseif(isset($_SERVER['HTTP_X_FORWARDED']))
	{
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	}
	elseif(isset($_SERVER['HTTP_FORWARDED_FOR']))
	{
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	}
	elseif(isset($_SERVER['HTTP_FORWARDED']))
	{
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	}
	elseif(isset($_SERVER['REMOTE_ADDR']))
	{
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	}
	else
	{
		$ipaddress = 'UNKNOWN';
	}
	
	return $ipaddress;
}

function array_to_xml($array)
{
	foreach($array as $key => $val)
	{
		if(is_array($val))
		{
			$xml .= "<$key>".array_to_xml($val)."</$key>";
		}
		else
		{
			$xml .= "<$key>$val</$key>";
		}
	}
	
	return $xml;
}

function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = strval(round($result, 2))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

function htmlenitiesArray($array) {
	foreach($array as $key => $val)
	{
		if(is_array($val))
		{
			$returnArray[$key] = htmlenitiesArray($val);
		}
		else
		{
			$returnArray[$key] = htmlentities(stripslashes($val));
		}
	}
	
	return $returnArray;
}

function htmlenitiesdecodeArray($array) {
	foreach($array as $key => $val)
	{
		if(is_array($val))
		{
			$returnArray[$key] = htmlenitiesdecodeArray($val);
		}
		else
		{
			$returnArray[$key] = html_entity_decode(stripslashes($val));
		}
	}
	
	return $returnArray;
}
function array2csv($array) {
	
	// Make sure there is an array
   	if (count($array) == 0) {
		return null;
	}
	
	// Open opject to put CSV in
   	ob_start();
   	$df = fopen("php://output", 'w');
	
	// Set keys/ header of CSV
   	fputcsv($df, array_keys(reset($array)));
	
	// Create each row
   	foreach ($array as $row) {
      	fputcsv($df, $row);
   	}
	
	// Close object
   	fclose($df);
	
	// Return raw object
   	return ob_get_clean();
	
}

function download_send_headers($filename) {
	
    // Disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // Force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // Disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
	
}

function gitAPIcall($url, $printRaw = false) {

	$user = 'wilxiteMike';
	$oauthToken = '2c433f69dad66259c7dcbe78a67f7e8019a8b4ef';
	
	$cInit = curl_init();
	curl_setopt($cInit, CURLOPT_URL, $url);
	curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($cInit, CURLOPT_CONNECTTIMEOUT,1);
	curl_setopt($cInit, CURLOPT_USERAGENT, 'Mozilla/5.001 (windows; U; NT4.0; en-US; rv:1.0) Gecko/25250101');
	curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($cInit, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($cInit, CURLOPT_USERPWD, $user . ':' . $oauthToken);
	
	$output = curl_exec($cInit);
	
	curl_close($cInit);

	if($printRaw) echo $output;

	// Convert any html tags to strings but keep quotes
	$output = htmlspecialchars($output, ENT_NOQUOTES);
	
	$result = json_decode($output, true);

	return $result;

}

?>