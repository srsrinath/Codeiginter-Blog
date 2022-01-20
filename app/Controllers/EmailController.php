<?php namespace App\Controllers;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    public function index()
    {
        $data=array('validation'=>$this->validation);        
        return view('email/contact',$data);
    }
    public function send(){
     //   helper(['form']);
        $validation=$this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if(!$validation){
            $data=array('validation'=>$this->validator);
            return redirect()->back()->withInput($data);
        }else{
            $email=\Config\Services::email();

            $data=[
                'name' =>$this->request->getPost('name'),
                'phone' =>$this->request->getPost('phone'),
                'email' =>$this->request->getPost('email'),
                'subject' =>$this->request->getPost('subject'),
                'message' =>$this->request->getPost('message'),
            ];
            //dd($data);
            $email->initialize($this->emailconfig());
            $email->setFrom($data['email'])
                 ->setTo('jaggubabu94@gmail.com')
                 ->setSubject($data['subject']);
            $view=\Config\Services::renderer();
            $view->setData(['data' => $this->request->getVar()]);
			$html = $view->render('email/contact_form.php');

			$email->setMessage($html)
                  ->send();
                //  print_r($email);
                //  exit;
        }   
        if($email->send()){
            return redirect()->to('/contact')->with('error','Failed')->withInput();           
        }else{
            //dd($email);
            return redirect()->to('/contact')->with('success','Email Sent Successfully');
        }

        
    }
    private function emailconfig(){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '550550fa12f340',
            'smtp_pass' => 'c754ceb49ac19e',
            'crlf' => "\r\n",
            'newline' => "\r\n"
          );
          return $config;
    }
}
