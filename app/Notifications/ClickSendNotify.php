<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\ClickSend\ClickSendMessage;
use NotificationChannels\ClickSend\ClickSendChannel;

class ClickSendNotify extends Notification
{

    public $data;

    /**
     * Create a notification instance.
     *
     * @param string $token
     */
    public function __construct($content)
    {
        $this->data = $content;
    }

    public function via($notifiable)
    {
        return [ClickSendChannel::class];
    }

    public function toClickSend($notifiable)
    {
        // statically create message object:
        
        $message = ClickSendMessage::create("SMS test to user #{$notifiable->id} with token");
        
        // OR instantiate:
        
        $message = new ClickSendMessage("SMS test to user #{$notifiable->id} with token");
        
       	// available methods:
       	
       	$message->content("Hi {$notifiable->f_name},\n I am {$this->data['from_user']->f_name} {$this->data['from_user']->l_name}, {$this->data['message']}");
       	$message->from('+6112345678');
        /* $message->custom('123e4567-e89b-12d3-a456-426655440000'); */ // this can be useful for tracking message responses
       	
       	return $message;
    }
}