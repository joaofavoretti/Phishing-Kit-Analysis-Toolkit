<?php
namespace PHPMaker2019\esbc_20181010;
session_start();
include_once "autoload.php";

/**
 * CAPTCHA class
 */
class Captcha
{
	protected $font = 'aftershock';
	protected $background_color = 'FFFFFF'; // Hex string
	protected $text_color = '003359'; // Hex string
	protected $noise_color = '64A0C8'; // Hex string
	protected $width = 200;
	protected $height = 50;
	protected $characters = 6;
	protected $font_size;
	protected $image_type = IMG_PNG;
	public function __construct()
	{
		$this->font_size = $this->height * 0.55;
	}
	protected function generateCode($characters)
	{
		$possible = '23456789BCDFGHJKMNPQRSTVWXYZ'; // Possible characters
		$code = '';
		$i = 0;
		while ($i < $characters) {
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}
	protected function hexToRGB($hexstr)
	{
		$int = hexdec($hexstr);
		return array("R" => 0xFF & ($int >> 0x10),
			"G" => 0xFF & ($int >> 0x8),
			"B" => 0xFF & $int);
	}
	public function show()
	{
		$code = $this->generateCode($this->characters);
		$ocode = $code;
		$code = "";
		$len = strlen($ocode);
		for ($i = 0; $i<$len; $i++) {
			$code .= $ocode[$i];
			if ($i < $len - 1)
				$code .= " ";
		}
		$code = trim($code);
		$image = imagecreate($this->width, $this->height) or die('Cannot initialize new GD image stream');
		$RGB = $this->hexToRGB($this->background_color);
		$background_color = imagecolorallocate($image, $RGB['R'], $RGB['G'], $RGB['B']);
		$RGB = $this->hexToRGB($this->text_color);
		$text_color = imagecolorallocate($image, $RGB['R'], $RGB['G'], $RGB['B']);
		$RGB = $this->hexToRGB($this->noise_color);
		$noise_color = imagecolorallocate($image, $RGB['R'], $RGB['G'], $RGB['B']);

		// Generate random dots in background
		for ($i = 0; $i < ($this->width * $this->height)/3; $i++) {
			imagefilledellipse($image, mt_rand(0,$this->width), mt_rand(0,$this->height), 1, 1, $noise_color);
		}

		// Generate random lines in background
		for ($i = 0; $i < ($this->width * $this->height)/150; $i++) {
			imageline($image, mt_rand(0,$this->width), mt_rand(0,$this->height), mt_rand(0,$this->width), mt_rand(0,$this->height), $noise_color);
		}
		$font_file = $this->font;

		// Always use full path
		if (strrpos($font_file, '.') === FALSE)
			$font_file .= '.ttf';
		$font_file = IncludeTrailingDelimiter($GLOBALS["FONT_PATH"], TRUE) . $font_file;

		// Create textbox and add text
		$textbox = imagettfbbox($this->font_size, 0, $font_file, $code) or die('Error in imagettfbbox function');
		$x = ($this->width - $textbox[4])/2;
		$y = ($this->height - ($textbox[5] - $textbox[3]))/2;
		imagettftext($image, $this->font_size, 0, $x, $y, $text_color, $font_file , $code) or die('Error in imagettftext function');

		// Output captcha image to browser
		switch($this->image_type) {
			case IMG_JPG:
				AddHeader("Content-Type", "image/jpeg");
				imagejpeg($image, null, 90);
				break;
			case IMG_GIF:
				AddHeader("Content-Type", "image/gif");
				imagegif($image);
				break;
			default: // PNG
				AddHeader("Content-Type", "image/png");
				imagepng($image);
				break;
		}
		imagedestroy($image);
		$_SESSION[SESSION_CAPTCHA_CODE] = $ocode;
	}
}
$captcha = new Captcha();
$captcha->show();
?>
