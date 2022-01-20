<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;
use App\Libraries\Hash;
use App\Models\CategoryModel;

class Home extends BaseController
{
    
    public function index()
    {
        $model = new PostModel();
        //$data['posts']=$model->findAll();
        $model->select('posts.*, users.name');
        $model->join('users', 'posts.u_id = users.u_id');
        $data['posts'] = $model->findAll();
        //dd($result);
        //dd($data);
        return view('pages/home', $data);
    }
    public function about()
    {
        return view('pages/about');
    }
    public function profile()
    {
        $id = session()->get('loggedUser');
        $model = new UserModel();
      
    //dd($data);
        $data['users'] = $model->find($id);
        $data['validation']= $this->validation;
        // dd($data);
        return view('profile/profile', $data);
    }

    public function savedetails($id)
    {
        //echo "success";
        $id = session()->get('loggedUser');
        $model = new UserModel();
        // $data=array(
        //     'error' => array('validation'=> $this->validation),
        //     'users' => $model->find($id)
        // );  
       $data['users'] = $model->find($id);
        //dd($user);
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];
        $validation = $this->validate($rules);
        //dd($rules);
        if (!$validation) {
            //dd($data['error']);
            $data=array(
                'validation' => $this->validator
            );
            //dd($data['error']);
            return redirect()->back()->withInput($data);
            //return view('profile/profile', ['validation' => $this->validator]);
      //           $data['validation'] = $this->validator;
                 //return redirect()->back()->withInput($data);
        //         return view('profile/profile', $data);
        } else {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $values = [
                'name' => $name,
                'email' => $email,
            ];
            //dd($values);
            //dd($user,$);
            //$model=new UserModel();
            $model->update($data['users'], $values);

            return redirect()->back()->with('success', 'Profile data updated successfully');
        }
      
    }
    
    public function changepassword()
    {

        $data=array('validation'=>$this->validation);
        return view('pages/changepassword',$data);
    }
    public function updatepassword()
    {
        //$data = [];
        // $data['user']=$model->find('u_id');
        //$model->session()->get('loggedUser');
        //$data['user']=session()->get('name');
        //print_r($this->request->getpost());die;
        $id = session()->get('loggedUser');
        $model = new UserModel();
        $user = $model->find($id);
        $rules = [
            'oldpassword' => 'required',
            'newpassword' => 'required|min_length[5]|max_length[12]',
            'confirm_password' => 'required|min_length[5]|max_length[12]|matches[newpassword]',
        ];
        $validation = $this->validate($rules);
        if (!$validation) {
            $data=array(
                'validation' => $this->validator
            );
            return redirect()->back()->withInput($data);
          
        } else {
            $opwd = $this->request->getPost('oldpassword');
            $npwd = $this->request->getPost('newpassword');
            // print_r($data['users']['password']);
            // exit;
            if (password_verify($opwd, $user['password'])) {
                // die(
                //     'if'
                // );
                $values['password'] = Hash::maken($npwd);
                $model->update($id, $values);
                session()->setFlashdata('success', 'password updated successfully');
                return redirect()->back();
                // return redirect()->to('pages/changepassword')->with('success', 'password Updated successfully');               
                //echo "success";
            } else {
                // dd($npwd,$data['users']['password']);
                session()->setFlashdata('fail', 'old password does not match with db password', 3);
                return redirect()->back();
                // die(
                //     'else'
                // );
                //echo "success";
                //return view('pages/changepassword', ['validation' => $this->validator]);

            }
        }
    }

}
