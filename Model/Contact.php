<?php 
class Contact extends Model{
    public function sendMessage($email_sender,$email_receiver,$message,$attachment){
        $this->Insert('Supremacy_InfoProject.contact','email_sender,email_receiver,message,attachment_link',"'".$email_sender."','".$email_receiver."','".$message."','".$attachment."'");
    }
    public function ReceiveMessage(){
        return $this->getAll('*','Supremacy_InfoProject.contact','Message',' ',array());
    }
}