<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }
    public function index()
    {
        
        return view('dashboard/index');
    }
    public function profile()
    {
        $id = session()->get('loggedUser');
        $model = new UserModel();
        $data['users'] = $model->find($id);
        
        return view('dashboard/profile',$data);
    }
    public function store($id){

        $id = session()->get('loggedUser');
        $model = new UserModel();
        $data['users'] = $model->find($id);
        //dd($data);
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];
        $validation = $this->validate($rules);
        if (!$validation) {
            //return view('profile/profile', ['validation' => $this->validator]);
                 $data['validation'] = $this->validator;
                 return view('dashboard/profile', $data);
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
        
        return view('dashboard/changepassword');
    }

    public function update(){

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
            return view('dashboard/changepassword', ['validation' => $this->validator]);
            //     $data['validation'] = $this->validator;
            //     return view('dashboard/users/edit', $data);
        } else {
            $opwd = $this->request->getPost('oldpassword');
            $npwd = $this->request->getPost('newpassword');
            // print_r($data['users']['password']);
            // exit;
            if (password_verify($opwd, $user['password'])) {
                $values['password'] = Hash::maken($npwd);
                $model->update($id, $values);
                session()->setFlashdata('success', 'Password updated succesfully');
                return redirect()->back();
                // return redirect()->to('pages/changepassword')->with('success', 'password Updated successfully');               
                //echo "success";
            } else {
                // dd($npwd,$data['users']['password']);
                session()->setFlashdata('fail', 'old password does not match with db password', 3);
                return redirect()->back();
                //echo "success";
                //return view('pages/changepassword', ['validation' => $this->validator]);

            }
        }

    }
}
