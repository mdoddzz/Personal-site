<?
// Emulate register_globals on

//Fix headers
ob_start("ob_gzhandler");

if (!ini_get('register_globals')) {
    $superglobals = array($_SERVER, $_ENV,
         $_COOKIE, $_POST, $_GET);
    if (isset($_SESSION)) {
        array_unshift($superglobals, $_SESSION);
    }


    foreach ($superglobals as $superglobal) {
		foreach ($superglobal as $varGlobal=>$valGlobal){
			if (is_array($valGlobal)) {
				$$varGlobal = magicquotes_array($valGlobal);
			} else {
				$$varGlobal = addslashes($valGlobal);
			}
		}
    }
    ini_set('register_globals', true);
	
	// $_FILES need to be done seperately due to the fact that it just splits it out as tmp_name
	// FILES
	if(isset($_FILES)){
		foreach ($_FILES as $globalFileFieldName => $globalFileVarsArray)
		{
			if ($globalFileVarsArray['tmp_name'])
			{
				$$globalFileFieldName = $globalFileVarsArray['tmp_name'];
			
				$globalFileFieldType = $globalFileFieldName."_type";
				$$globalFileFieldType = $globalFileVarsArray['type'];
				
				$globalFileFieldSize = $globalFileFieldName."_size";		
				$$globalFileFieldSize = $globalFileVarsArray['size'];
				
				$globalFileFieldRealName = $globalFileFieldName."_name";						
				$$globalFileFieldRealName = $globalFileVarsArray['name'];
			
			}
			else
			{
				unset($$globalFileFieldName);
				unset($$globalFileFieldType);
			}
			
		}
		
	}
	
} 

function magicquotes_array($valArray) {
	$ret = array();
	foreach ($valArray as $key=>$val) {
		if (is_array($val)) {
			$ret[$key] = magicquotes_array($val);
		} else {
			$ret[$key] = addslashes($val);
		}
	}
	return $ret;
}


define ("versionNumber", "1.3");

define ("siteName", "Michael Dodd");
define ("siteAddress", "https://michaeldodd.co.uk");
define ("siteRoot", "/var/www/html/mdmain");
define ("uploadRoot", "/var/www/html/mdmain/uploaded_files");
define ("uploadLocation", "/uploaded_files");

define ("dbHost" , "localhost");
define ("dbDatabase" , "");
define ("dbUser", "");
define ("dbPassword", "");

$dateFormats['uk'] = array('php' => 'd/m/Y', 'js' => 'dd/mm/yy');
$dateFormats['us'] = array('php' => 'm/d/Y', 'js' => 'mm/dd/yy');
$dateFormats['unix'] = array('php' => 'Y-m-d', 'js' => 'yy/mm/dd');

$currency['GBP'] = array('name' => 'British Pound', 'symbol' => '&pound;');
$currency['USD'] = array('name' => 'US Dollar', 'symbol' => '&#36;');
$currency['EUR'] = array('name' => 'Euro', 'symbol' => '&euro;');

$bgColourArray = array("pinkBG", "blueBG", "greenBG");

?>