<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;

class UsersController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {

        $model = new UserModel();
        $data['users'] = $model->where('type !=', 'admin')->findAll();
        return view('dashboard/users/index', $data);
    }

    public function create()
    {
        return view('dashboard/users/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
            'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'
        ]);
        if ($this->request->getMethod() == 'post') {
            if (!$validation) {
                //return redirect()->back()->withInput(['validation' => $this->validator]);
                return view('dashboard/users/create', ['validation' => $this->validator]);
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
                    return redirect()->to('/users')->with('success', 'Register Successfully');
                }
            }
        }
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        //dd($data);
        return view('dashboard/users/edit', $data);
    }

    public function update($id)
    {
        //dd($id);
        //helper(['form']);
        $data = [];
        $model = new UserModel();
        $data['user'] = $model->find($id);
        $rules=[
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email,u_id,' . $id . ']',
        ];
        if($this->request->getPost('password')){
            $rules['password'] = 'required|min_length[5]|max_length[12]';
            $rules['cpassword']= 'required|min_length[5]|max_length[12]|matches[password]';
        }
        $validation = $this->validate($rules);
        if ($this->request->getMethod() == 'post') {
            if (!$validation) {
                //return view('dashboard/users/edit',$data,[$data['validation'] = $this->validator]);
                $data['validation'] = $this->validator;
                return view('dashboard/users/edit', $data);
                //return redirect()->to('users/edit/'.$id)->withInput(['validation' => $this->validator]);
                //dd($id);
                // print_r($id);
                // exit;
                // die(
                //     'if'
                // );

            } else {
                //echo "success";
                // die(
                //     'else'
                // );
                //return view('dashboard/users/edit/', ['validation' => $this->validator]);
                // print_r($id);
                // exit;
                //echo "success ";
                //$model = new UserModel();
                //$model->find($id);
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                //$password = $this->request->getPost('password');
                $values = [
                    'name' => $name,
                    'email' => $email,
                  //  'password' => Hash::make($password),
                ];
                if($this->request->getPost('password')){
                 $password = $this->request->getPost('password');
                    $values['password']=Hash::make($password);
                }
                $model->update($id, $values);
                return redirect()->to('/users')->with('success', 'Updated successfully');
            }
        }
    }
    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'Deleted successfully');
    }
}
