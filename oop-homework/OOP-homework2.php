<?php
abstract class Emailer {
    protected $sender;
    protected $recipiets;
    protected $subject;
    protected $body;

    function __construct($sender)
    {
        $this->sender = $sender;
        $this->recipients = array(); //データ型にするため配列を初期化
    }
    public function addRecipients($recipient)
    {
        array_push($this->recipients, $recipient);//要素を追加する
        return $this;
    }
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }
}
class SendGrid extends Emailer {
    public function sendEmail()
    {
        foreach ($this->recipients as $recipient) {
            $result = mail($recipient, $this->subject, $this->body, "From: {$this->sender}\r\n");
            echo "SendGrid successfully sent to {$recipient}\n";
            echo "Sender: $this->sender\n";
            echo "Subject: $this->subject\n";
            echo "Content: $this->body\n";
        }
    }
}
class MailChimp extends Emailer {
    public function sendEmail()
    {
        foreach ($this->recipients as $recipient) {
            $result = mail($recipient, $this->subject, $this->body, "From: {$this->sender}\r\n");
            echo "MailChimp successfully sent to {$recipient}\n";
            echo "Sender: $this->sender\n";
            echo "Subject: $this->subject\n";
            echo "Content: $this->body\n";
        }
    }
}

// SendGrid
$sgEmailer = new SendGrid("youremail@yourdomain.com");
$sgEmailer->addRecipients("emailID@domain.com")
    ->setSubject("Just a Test")
    ->setBody("Hi Name, How are you?")
    ->sendEmail();
// MailChimp
$mcEmailer = new MailChimp("youremail@yourdomain.com");
$mcEmailer->addRecipients("emailID@domain.com")
    ->setSubject("Just a Test")
    ->setBody("Hi Name, How are you?")
    ->sendEmail();
?>