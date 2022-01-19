<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;
use App\Libraries\Hash;
use App\Models\CategoryModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

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
        $data['users'] = $model->find($id);
        // dd($data);
        return view('profile/profile', $data);
    }

    public function savedetails($id)
    {
        //echo "success";
        $id = session()->get('loggedUser');
        $model = new UserModel();
        $data['users'] = $model->find($id);
        //dd($user);
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];
        $validation = $this->validate($rules);
        if (!$validation) {
            //return view('profile/profile', ['validation' => $this->validator]);
                 $data['validation'] = $this->validator;
                 return view('profile/profile', $data);
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
    public function viewpost()
    {

        $model = new PostModel();
        $model->select('posts.*, categories.name');
        $model->join('categories', 'posts.c_id = categories.c_id');
        $data['posts'] = $model->findAll();
        return view('profile/viewpost', $data);
    }
    public function changepassword()
    {


        return view('pages/changepassword');
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
            return view('pages/changepassword', ['validation' => $this->validator]);
            //     $data['validation'] = $this->validator;
            //     return view('dashboard/users/edit', $data);
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

    public function edit($id)
    {
        $model = new PostModel();
        $data['posts'] = $model->find($id);
        //dd($data);
        $catmodel = new CategoryModel();
        $data['category'] = $catmodel->findAll();
        //dd($data);
        return view('pages/edit', $data);
    }
    public function update($id)
    {
        //echo "success";
        $data = [];
        $model = new PostModel();
        $data['posts'] = $model->find($id);
        $catmodel = new CategoryModel();
        $data['category'] = $catmodel->findAll();
        $rules = [
            'title' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
            'content' => 'required',
        ];
        $validation = $this->validate($rules);
        if (!$validation) {
            //return view('pages/edit', ['validation' => $this->validator]);
            $data['validation'] = $this->validator;
            return view('pages/edit', $data);
        } else {
            $slug = '';
            $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($this->request->getPost('title'))));
            //echo "success";
            $old = $data['posts']['image'];
            //dd($old);
            $file = $this->request->getFile('image');
            //dd($file);
            if ($file->isValid()) {
                //echo "success";
                if (file_exists(FCPATH . 'uploads/posts/' . $old)) {
                    //echo"success";
                    unlink(FCPATH . 'uploads/posts/' . $old);
                    $imageName = $file->getRandomName();
                    //dd($imageName);
                    if ($file->move(FCPATH . 'uploads/posts/', $imageName)) {
                        //dd($file);
                        //echo"went";
                        $data = [
                            'title' => $this->request->getPost('title'),
                            'content' => $this->request->getPost('content'),
                            'image' => $imageName,
                            'slug' => $slug,
                            'u_id' => session()->get('loggedUser'),
                            'c_id' => $this->request->getPost('c_id'),
                        ];
                        //dd($data);
                        $model = new PostModel();
                        $model->update($id, $data);
                        //dd($data);
                        return redirect()->to('/viewpost')->with('success', 'post updated successfully');
                    } else {
                        echo $file->getErrorString() . " " . $file->getError();
                    }
                } else {
                    //echo"fail";
                    $data['validation'] = $this->validator;
                    return view('pages/edit', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('pages/edit', $data);
            }
        }
    }
    public function delete($id)
    {
        $model = new PostModel();
        $data['posts'] = $model->find($id);
        $oldi = $data['posts']['image'];
        if (file_exists(FCPATH . 'uploads/posts/' . $oldi)) {
            unlink('uploads/posts/' . $oldi);
        }
        $model->delete($id);
        return redirect()->to('/viewpost')->with('success', 'post Deleted Successfully');
    }
}
