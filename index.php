<?PHP
$api = file_get_contents("https://omnicha.in/api/?method=getinfo");
$act = json_decode($api, TRUE);
$currentBlock = $act["response"]["block_count"];
$countdown = 150000 - $currentBlock;
if($countdown <= 0)
{
	$countdown = 0;
}

$im = imagecreatefrompng(dirname(__FILE__)."/background.png");
$gray = imagecolorallocate($im, 70, 70, 70);
$font = dirname(__FILE__).'/DroidSansMono.ttf';

$width = (70 * strlen($countdown)) / 2;
$temp = 230 - $width;

imagettftext($im, 90, 0, $temp, 150, $gray, $font, $countdown);
imagepng($im,dirname(__FILE__)."/countdown.png");
imagedestroy($im);
?>