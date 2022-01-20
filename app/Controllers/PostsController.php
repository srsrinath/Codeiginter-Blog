<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PostModel;

class PostsController extends BaseController
{
    public function index()
    {

        return view('dashboard/posts/index');
    }
    public function create()
    {
        $catmodel=new CategoryModel();
        $data['categories']=$catmodel->findAll();
        $data['validation']=$this->validation;
        //dd($data);
        return view('dashboard/posts/create',$data);
    }
    public function store()
    {
        
        $validation = $this->validate([
            'title' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
            'content' => 'required',
        ]);
        if (!$validation) {
            $data=array('validation'=>$this->validator);
            //dd($this->validator->getErrors());
            return redirect()->back()->withInput($data);
            // $data['validation']=$this->validator;
            // return view('dashboard/posts/create',$data);
        }else {
            //echo "created successfully";
            //return view('dashboard/posts/create', ['validation' => $this->validator]);
            $slug = '';
            $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($this->request->getPost('title'))));
            $model = new PostModel();
            $file = $this->request->getFile('image');
            if ($file->isValid()) {
                $newName = $file->getRandomName();
                if ($file->move(FCPATH . 'uploads/posts/', $newName)) {
                    $data = [
                        'title' => $this->request->getPost('title'),
                        'image' => $newName,
                        'content' => $this->request->getPost('content'),
                        'slug' => $slug,
                        'u_id' => session()->get('loggedUser'),
                        'c_id' => $this->request->getPost('c_id'),

                    ];
                   
                    $model->save($data);
                    //dd($data);
                    return redirect()->to('/viewpost')->with('success', 'post created successfully');
                } else {
                    echo $file->getErrorString() . " " . $file->getError();
                }
            }
        }
                //dd($data);    
    }
    public function view($slug)
    {
        // $model=new PostModel();
        // $data['posts']=$model->find($id);

        // dd($data,$id);
        //dd($slug);
        // $model=new PostModel();
        //$data['posts']=$this->request->getPost();
        //$data['raw']=$model->find($id);
        // $slug=$this->request->getPost('p_id');
        //$model->find($p_id);
        // $model->find($slug);
        //dd($p_id);
        // dd($slug);

        $model = new PostModel();
        $model->where('slug',$slug);
        $model->select('posts.*, users.name');
        $model->join('users', 'posts.u_id = users.u_id');
        $data['post'] = $model->first();
        
        //$data['posts'] = $model->find($id);
         //dd($data);

        return view('dashboard/posts/view',$data);
    }
    public function viewpost()
    {

        $model = new PostModel();
        $model->select('posts.*, categories.name');
        $model->join('categories', 'posts.c_id = categories.c_id');
        $data['posts'] = $model->findAll();
        return view('profile/viewpost', $data);
    }
    public function edit($id)
    {
        $model = new PostModel();
        $data['posts'] = $model->find($id);
        //dd($data);
        $catmodel = new CategoryModel();
        $data['category'] = $catmodel->findAll();
        //dd($data);
        $data['validation']=$this->validation;
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
            $data=array('validation'=>$this->validator);
            return redirect()->back()->withInput($data);
            //return view('pages/edit', ['validation' => $this->validator]);
            // $data['validation'] = $this->validator;
            // return view('pages/edit', $data);
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
                    $data=array('validation'=>$this->validator);
                    return redirect()->back()->withInput($data);          
                    //echo"fail";
                    // $data['validation'] = $this->validator;
                    // return view('pages/edit', $data);
                }
            } else {
                $data=array('validation'=>$this->validator);
                return redirect()->back()->withInput($data);    
                // $data['validation'] = $this->validator;
                // return view('pages/edit', $data);
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
