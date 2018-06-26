<?php

namespace Tools\SendGrid;

class SendgridWrapper{
    protected $email;
    protected $sendgrid;
    protected $apiKey;
    protected $emailBody;
    protected $emailBodyType;
    protected $response;
    protected $responseStatus;
    protected $responseHeaders;
    protected $responseBody;
    protected $errors;
    public $returnJson = false;
    public $to;
    public $from;
    public $subject;
    public $content;
    public function __construct($apiKey){
        $this->apiKey = $apiKey;
        $this->email = new \SendGrid\Mail\Mail(); 
        $this->sendgrid = new \SendGrid($this->apiKey);
    }

    protected function setEmailContent(){
        if($this->content != strip_tags($this->content)) {
            $this->setHtmlContent();
        }else{
            $this->setPlainTextContent();
        }
        return;
    }

    protected function setHtmlContent(){
        $this->emailBodyType = 'html';
        $this->email->addContent("text/html", $this->content);
    }

    protected function setPlainTextContent(){
        $this->emailBodyType = 'plain';
        $this->email->addContent("text/plain", $this->content);
    }

    protected function setFrom(){
        $fromEmail = '';
        $fromName = '';
        if(!is_array($this->from)):
            $fromEmail = $this->from;
        else:
            $fromEmail = $this->from[0];
            $fromName = $this->from[1] ?? '';
        endif;
        $this->email->setFrom($fromEmail, $fromName);
    }

    protected function setTo(){
        $toEmail = '';
        $toName = '';
        if(!is_array($this->to)):
            $toEmail = $this->to;
        else:
            $toEmail = $this->to[0];
            $toName = $this->to[1] ?? '';
        endif;
        $this->email->addTo($toEmail, $toName);
    }

    protected function setSubject(){
        $this->email->setSubject($this->subject);
    }

    public function send(){
        $this->setEmailContent();
        $this->setSubject();
        $this->setFrom();
        $this->setTo();
        try {
            $this->response = $this->sendgrid->send($this->email);
            $this->responseStatus = $this->response->statusCode();
            $this->responseHeaders = $this->response->headers();
            $this->responseBody = json_decode($this->response->body());
            return $this->buildResponse();
        } catch (Exception $e) {
            $this->errors = $e->getMessage();
        }
    }

    protected function buildResponse(){
        $response = [
            'status' => $this->responseStatus,
            'message' => $this->responseMessage()
        ];
        http_response_code($this->responseStatus);
        if($this->returnJson == true) return json_encode($response);
        return $response;
    }

    protected function responseMessage(){
        if($this->responseStatus == 202):
            return 'Email was sent successfully';
        endif;
        if(isset($this->responseBody->errors)):
            if($this->responseStatus == 400):
                return 'Sorry, either the to or from field email address isn\'t valid';
            endif;
            return $this->responseBody->errors[0]->message ?? 'Sorry something went wrong';
        endif;
        return 'Unknown response.';
    }
}