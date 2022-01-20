<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;
class AuthController extends BaseController
{
    public function index()
    {
        $data['error']=array('validation' => $this->validation);
        return view('auth/register',$data['error']);
    }
    public function save()
    {
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
            'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'
        ]);
        if ($this->request->getMethod() == 'post') {
            if (!$validation) {
                $data=array(
                    'validation' => $this->validator
                );
                return redirect()->back()->withInput($data);
                //return view('auth/register', ['validation' => $this->validator]);
                //return redirect()->back()->withInput('validation',$this->validator->getErrors());
            } else {
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $values = [
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                ];
                $model = new UserModel();
                $query = $model->save($values);
                if (!$query) {
                    return redirect()->back()->with('fail', 'Something Went wrong');
                } else {
                    return redirect()->to('/login')->with('success', 'Register Successfully');
                }
            }
        }
    }
    public function login()
    {
        $data=array('validation' => $this->validation);
        return view('auth/login',$data);
    }

    public  function check()
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' =>
                [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This is email is not registered in our service'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' =>
                [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have atleast 5 characters in length',
                    'max_length' => 'Password must not have more than 12 characters in length'
                ]
            ]
        ]);
        if ($this->request->getMethod() == 'post') {
            if (!$validation) {
                $data=array(
                    'validation' => $this->validator
                );
                return redirect()->back()->withInput($data);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $model = new UserModel();
                $user_info = $model->where('email', $email)->first();
                $check_password = Hash::check_pass($password, $user_info['password']);

                if (!$check_password) {
                    session()->setFlashdata('fail', 'Incorrect Password');
                    return redirect()->to('/login')->withInput();
                } else {
                 //   $user_id = $user_info['id'];
                    //dd($user_id);
                    session()->set('loggedUser', $user_info['u_id']);
                    session()->set('name', $user_info['name']);
                    session()->set('type', $user_info['type']);
                    session()->set('email', $user_info['email']);

                    return redirect()->to('/dashboard');
                }
            }
        }
    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->destroy();
            return redirect()->to('/');
        }
    }
    
}
