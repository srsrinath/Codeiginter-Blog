<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PostModel;

class PostsController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {

        return view('dashboard/posts/index');
    }
    public function create()
    {
        $catmodel=new CategoryModel();
        $data['categories']=$catmodel->findAll();
        //dd($data);
        return view('dashboard/posts/create',$data);
    }
    public function store()
    {
        $data=[];
        $catmodel=new CategoryModel();
        $data['categories']=$catmodel->findAll();
        $validation = $this->validate([
            'title' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
            'content' => 'required',
        ]);

        if (!$validation) {
            $data['validation']=$this->validator;
            return view('dashboard/posts/create',$data);
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
    public function edit()
    {

        return view('dashboard/posts/edit');
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
