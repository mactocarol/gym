<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer extends MY_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('customer_model');
            if( $this->session->userdata('user_group_id') != 1){
                redirect('user');
            }            
        }
        public function index(){
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            
            $datas=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $datas->error=0;
                    $datas->success=1;
                    $datas->message=$items->message;
                }else{
                    $datas->error=1;
                    $datas->success=0;
                    $datas->message=$items->message;
                }                
            }            
                        
            $customers = $this->customer_model->SelectRecord('customer','*',$udata=array("is_deleted"=>"0"),'id asc');            
            $datas->customers = $customers;            
            $datas->result = $this->customer_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Customer List';
            $datas->field = 'Datatable';
            $datas->page = 'list_customer';            
            $this->load->view('list_customer_view',$datas);            
        }
        
        public function add(){
            
            $datas=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $datas->error=0;
                    $datas->success=1;
                    $datas->message=$items->message;
                }else{
                    $datas->error=1;
                    $datas->success=0;
                    $datas->message=$items->message;
                }
                
            }
            
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;               
               $udata['f_name'] = $this->input->post('f_name');
               $udata['l_name'] = $this->input->post('l_name');
               $udata['gender'] = $this->input->post('gender');
               $udata['dob'] = $this->input->post('dob');
               
               # object oriented
                $from = new DateTime($this->input->post('dob'));
                $to   = new DateTime('today');
                $udata['age']  = $from->diff($to)->y;

               $udata['contact'] = $this->input->post('contact');
               $udata['marital_status'] = $this->input->post('marital_status');
               $udata['email'] = $this->input->post('email');
               $udata['address'] = $this->input->post('address');
               $udata['height'] = $this->input->post('height');
               $udata['weight'] = $this->input->post('weight');
               //print_r($udata); die;
               if($_FILES['image']['name'] != ''){                               
                                
                        $upload_path = './upload/customer/';
                        $config['upload_path'] = $upload_path;
                        
                        $config['allowed_types'] = 'jpg|jpeg|gif|png';                                                                    
                       
                        $config['overwrite'] = false;
                        //print_r($config);
                        $this->load->library ('upload',$config);
                                                
                        if ($this->upload->do_upload('image'))
                        {                                    
                            $uploaddata = $this->upload->data();
                            //print_r($udata); die;
                            $udata['image'] = $uploaddata['file_name'];
                            
                            
                                $conf['image_library'] = 'gd2';
                                $conf['source_image'] = './upload/customer/'.$uploaddata['file_name'];
                                $conf['new_image'] = './upload/customer/thumb/'.$uploaddata['file_name'];
                                $conf['create_thumb'] = False;
                                $conf['maintain_ratio'] = False;
                                $conf['width']         = 600;
                                $conf['height']       = 400;
                                
                                $this->load->library('image_lib', $conf);
                                
                                $this->image_lib->resize();                                                                
                            
                        }
                        else
                        {                                                    
                            $datas->error=1;
                            $datas->success=0;
                            $datas->message=$this->upload->display_errors(); 
                            $this->session->set_flashdata('item', $datas);
                            redirect('customer/add/');	
                        }
               
               }
               //print_r($udata); die;
               if($this->customer_model->InsertRecord('customer',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Customer Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('customer/add');
            }
            
            $udata = array("id"=>$this->session->userdata('user_id'));               
            $datas->result = $this->customer_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Add Customer';
            $datas->field = 'Add';
            $datas->page = 'add_customer';            
            $this->load->view('add_customer_view',$datas);            
        }
        
        public function edit($id){
            
            $datas=new stdClass();
            $id = base64_decode($id);
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $datas->error=0;
                    $datas->success=1;
                    $datas->message=$items->message;
                }else{
                    $datas->error=1;
                    $datas->success=0;
                    $datas->message=$items->message;
                }
                
            }
            
            ///print_r($data); die;
            if(!empty($_POST)){
                $udata['f_name'] = $this->input->post('f_name');
                $udata['l_name'] = $this->input->post('l_name');
                $udata['gender'] = $this->input->post('gender');
                $udata['dob'] = $this->input->post('dob');
                
                # object oriented
                 $from = new DateTime($this->input->post('dob'));
                 $to   = new DateTime('today');
                 $udata['age']  = $from->diff($to)->y;
 
                $udata['contact'] = $this->input->post('contact');
                $udata['marital_status'] = $this->input->post('marital_status');
                $udata['email'] = $this->input->post('email');
                $udata['address'] = $this->input->post('address');
                $udata['height'] = $this->input->post('height');
                $udata['weight'] = $this->input->post('weight');         
               
               if($this->customer_model->UpdateRecord('customer',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Customer Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('customer/edit/'.base64_encode($id));
            }
            
            $datas->customer = $this->customer_model->SelectSingleRecord('customer','*',$udata=array("id"=>$id),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));               
            $datas->result = $this->customer_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Update Customer';
            $datas->field = 'Add';
            $datas->page = 'edit_customer';            
            $this->load->view('edit_customer_view',$datas);                                          
        }                        
        
        public function delete($id){
            $id = base64_decode($id);
            $data=new stdClass();
            if($this->customer_model->UpdateRecord('customer',array("is_deleted"=>"1"),array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Customer Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('customer');
        }
                		        	
}
?>