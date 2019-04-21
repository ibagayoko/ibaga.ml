<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Filesystem\Filesystem;
use \MimeMailParser\Attachment;
use Illuminate\Support\Facades\Mail;

class EmailParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $Parser = new \PhpMimeMailParser\Parser();
        $rawEmail = file_get_contents("php://stdin", "r");
        $Parser->setText($rawEmail);

        $from = $Parser->getHeader('from');
        $to = $Parser->getHeader('to');
        $subject = $Parser->getHeader('subject');

        $text = $Parser->getMessageBody('text');

        $html = $Parser->getMessageBody('htmlEmbedded');

        // Pass in a writeable path to save attachments
        $attach_dir = public_path('attachments/'); 	// Be sure to include the trailing slash
        $include_inline = true;  			// Optional argument to include inline attachments (default: true)
        $Parser->saveAttachments($attach_dir, $include_inline);

        // Get an array of Attachment items from $Parser

        $attachments = $Parser->getAttachments([$include_inline]);

        $filesystem = new Filesystem;
        $atts =[];
        foreach ($attachments as $attachment) {
            $filesystem->put(public_path() . '/uploads/' . $attachment->getFilename(), $attachment->getContent());
            $atts[] = [
                'name'=>$attachment->getFilename(),
                'path'=>public_path() . '/uploads/' . $attachment->getFilename()
            ];
        }

        $re = '/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/i';
        // $str = 'bagayokoismail@gmail.com';
        
        preg_match_all($re, $from, $matches, PREG_SET_ORDER, 0);
        
        // Print the entire match result
        // var_dump($matches);
        $from_email = $matches[0][0];

        preg_match_all($re, $to, $matches, PREG_SET_ORDER, 0);

        $to_email = $matches[0][0];

        $email = new \App\Models\Email;
        $email->from = $from;
        $email->to = $to;
        $email->from_email = $from_email;
        $email->to_email = $to_email;
        $email->text = $text;
        $email->subject = $subject;
        $email->html = $html;
        $email->attachments = $atts;
        $email->save();

        Mail::to($from_email)->send(new \App\Mail\NewPost);


    }
}
