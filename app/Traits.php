<?php 

namespace App;
// use Mail;
use Illuminate\Support\Facades\Mail;
use DB;
use Pusher;

trait Traits
{
    public function sendMail($filter=array())
    {
    	/*$emailBody = '<p>Dear User, </p> To reset your email password <a href="index.php">click here</a></p>';
        $emailcontent = array(
            'emailBody'  => $emailBody,
            'domainName' => url(''),
        );

        $filter = array(
            'view'              => 'email.email_template',
            'emailcontent'      => $emailcontent,
            'fromName'          => 'technobrigadeinfotech',
            'fromEmail'         => 'noreply@technobrigadeinfotech.com',
            'emailid'           => 'rohit.technobrigadeinfo@gmail.com',
            'mailTitle'         => 'Mail Demo',
            'ccemail'           => 'arjun.technobrigadeinfo@gmail.com',
            'replyToEmail'      => 'noreply@technobrigadeinfotech.com',
        );
        $this->sendMail($filter);*/

        $errors = '';

        Mail::send(['html' => $filter['view']], $filter['emailcontent'], function($message) 
            use ($filter){
            $message->to($filter['emailid'])
            ->from($filter['fromEmail'],$filter['fromName'])
            ->subject($filter['mailTitle']);

            if(isset($filter['ccemail'])){
            	$message->cc($filter['ccemail']);
            }

            if(isset($filter['replyToEmail'])){
            	$message->cc($filter['replyToEmail']);
            }

            if(isset($filter['attach'])){
                $message->attach($filter['attach']);
            }

        });

        if(count(Mail::failures()) > 0){
            $errors = 'Failed to send email, please try again.';
        }

        return $errors;
    }


}