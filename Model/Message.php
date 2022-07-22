<?php 
class Message{
    private $_Id_contact;
    private $_Email_sender;
    private $_Email_Receiver;
    private $_Message;
    private $_Attachment_link;
    public function __construct(array $data){
         $this->hydrate($data);
    }
    //verifier et Remplir automatiquement avec les setter -> obj -> array -> data;
    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'Set'.ucfirst($key);
            if(method_exists($this,$method))
                $this->$method($value);
        }
    }
    //Nos Setter;
    public function SetId_contact($id){
        $id = (int) $id;
        if($id > 0){
            $this->_Id_contact = $id;
        }
    }
    public function SetEmail_sender($email_sender){
        if(is_string($email_sender)){
            $this->_Email_sender = $email_sender;
        }
    }

    public function SetEmail_Receiver($email_Receiver){
        if(is_string($email_Receiver)){
            $this->_Email_Receiver = $email_Receiver;
        }
    }
    public function SetMessage($message){
        if(is_string($message)){
            $this->_Message = $message;
        }
    }
    public function SetAttachment_link($link){
        if(is_string($link)){
            $this->_Attachment_link = $link;
        }
    }
    //Nos getter -> recuperation variable privee XD;
    public function Id_contact(){
        return $this->_Id_contact;
    }
    public function Email_sender(){
        return $this->_Email_sender;
    }
    public function Email_Receiver(){
        return $this->_Email_Receiver;
    }
    public function Message(){
        return $this->_Message;
    }
    public function Attachment_link(){
        return $this->_Attachment_link;
    }
}