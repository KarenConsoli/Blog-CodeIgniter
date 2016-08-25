<?php


class Mailer_Model extends CI_Model {
    //put your code here
    /*
     */
    public function sendEmail($data,$email_template) {
          $this->load->library('email');

            $subject = $data['to_address'];
            $message = $this->load->view('mailscript/'.$email_template,$data,true);
       /* $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'],$data['admin_full_name']);
        $this->email->to($data['to_address']);  
        $this->email->subject($data['subject']);*/
        
          $result = $this->email
                ->from('karen.consoli.mailer@gmail.com')
                ->to($data['to_address'])
                ->subject($subject)
                ->message($message)
                ->send();
       echo $this->email->print_debugger();
        $this->email->send();
        $this->email->clear();
       // exit;
    }
}
?>