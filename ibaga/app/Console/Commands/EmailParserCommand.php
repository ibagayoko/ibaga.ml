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
        $subject = $Parser->getHeader('subject');

        // $text = $Parser->getMessageBody('text');

        $html = $Parser->getMessageBody('htmlEmbedded');

        // Pass in a writeable path to save attachments
        $attach_dir = public_path('attachments/'); 	// Be sure to include the trailing slash
        $include_inline = true;  			// Optional argument to include inline attachments (default: true)
        $Parser->saveAttachments($attach_dir, $include_inline);

        // Get an array of Attachment items from $Parser

        $attachments = $Parser->getAttachments([$include_inline]);

        $filesystem = new Filesystem;
        foreach ($attachments as $attachment) {
            $filesystem->put(public_path() . '/uploads/' . $attachment->getFilename(), $attachment->getContent());
        }

        Mail::to($from)->send(new \App\Mail\NewPost);


    }
}
