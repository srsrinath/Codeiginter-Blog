<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        //dd($data['employee']);
        return view('dashboard/categories/index');
        //echo json_encode($output);

    }
    public function getData()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        $output = view('dashboard/categories/tbody', $data);
        //     $table_data='';
        //  foreach ($categories as $key => $pic) {

        //     $table_data .= '
        //     <tr>
        //     <td> ' . $pic['c_id'] .' </td>
        //     <td> ' . $pic['name'] .' </td>
        //     <td>
        //         <button type="button" class="btn btn-sm btn-success edit-btn" data-toggle="modal" 
        //         data-target="#editModal" data-id="'. $pic['c_id'].'">Edit</button>
        //         <button type="button" class="btn btn-sm btn-danger btn-delete">Delete</button>
        //     </td>
        // </tr>';
        //  }
        //echo json_encode($table_data);
        echo json_encode($output);
    }
    public function create()
    {
        $model = new CategoryModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'created_at' => date('Y-m-d'),
        ];
        // print_r($data);
        // exit;
        $result = $model->insert($data);
        // print_r($test);
        // exit;
        $data = [];
        if ($result) {
            $data['status'] = 'success';
            $data['message'] = 'Data Inserted Successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Inserting data failed';
        }
        echo json_encode($data);
    }
    public function edit($id)
    {
        $model = new CategoryModel();
        //$id = $this->request->getVar('c_id');
        //$data['categories'] = ;
        // print_r($data);
        // exit;
        //dd($data);
        echo json_encode($model->find($id));
    }
    public function update()
    {
        $model = new CategoryModel();
        $id = $this->request->getPost('c_id');
        $data = [
            'name'  => $this->request->getPost('name'),
        ];
        //dd($data);
        //print_r($data);
        //exit;
        $result = $model->update($id, $data);
         //print_r($result);
         //exit;
        $data = [];
        if ($result) {
            $data['status'] = 'success';
            $data['message'] = 'Data Updated Successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'updating data failed';
        }
        //  print_r($id);
        //  exit;
        echo json_encode($data);
    }
    public function delete()
    {
        $model = new CategoryModel();
        $id = $this->request->getPost('id');
        $result = $model->delete($id);
        $data = array();

        if ($result) {
            $data['status'] = 'success';
            $data['message'] = 'category Deleted Successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'updating data failed';
        }

        echo json_encode($data);
    }
}
