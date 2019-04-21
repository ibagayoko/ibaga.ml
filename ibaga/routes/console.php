<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('mailparse', function ($input, ...$argv)
{
    $Parser = new PhpMimeMailParser\Parser();


// $Parser->setPath($path); 
$Parser->setText(file_get_contents("php://stdin", "r"));


 
// $Parser->setStream(fopen("php://stdin", "r"));


// Once we've indicated where to find the mail, we can parse out the data
// $to = $Parser->getHeader('to');             // "test" <test@example.com>, "test2" <test2@example.com>
// $addressesTo = $Parser->getAddresses('to'); //Return an array : [["display"=>"test", "address"=>"test@example.com", false],["display"=>"test2", "address"=>"test2@example.com", false]]

// $from = $Parser->getHeader('from');             // "test" <test@example.com>
// $addressesFrom = $Parser->getAddresses('from'); //Return an array : [["display"=>"test", "address"=>"test@example.com", "is_group"=>false]]

$subject = $Parser->getHeader('subject');

// $text = $Parser->getMessageBody('text');

$html = $Parser->getMessageBody('htmlEmbedded');
// $htmlEmbedded = $Parser->getMessageBody('htmlEmbedded'); //HTML Body included data


// Pass in a writeable path to save attachments
$attach_dir = public_path('attachments/'); 	// Be sure to include the trailing slash
$include_inline = true;  			// Optional argument to include inline attachments (default: true)
$Parser->saveAttachments($attach_dir, $include_inline);

// Get an array of Attachment items from $Parser
$attachments = $Parser->getAttachments([$include_inline]);

$output ="";
//  Loop through all the Attachments
if (count($attachments) > 0) {
	foreach ($attachments as $attachment) {
		$output = 'Filename : '.$attachment->getFilename().'<br />' // logo.jpg
			.'Filesize : '.filesize($attach_dir.$attachment->getFilename()).'<br />' // 1000
			.'Filetype : '.$attachment->getContentType().'<br />' // image/jpeg
			.'MIME part string : '.$attachment->getMimePartStr().'<br />'; // (the whole MIME part of the attachment)
	}
}

$atts = var_export($output, true);
$inp = var_export($input, true);
$htm = var_export($html, true);
$var_str = var_export($text, true);
$var = "<?php\n\n\$text = $var_str;\n\n\$atts = $atts;\n\n\$html = $htm;\n\n\$inp = $inp;\n\n?>";
file_put_contents(public_path('/attachments/email.php'), $var);
});