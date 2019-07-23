<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Membership extends MY_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('membership_model');
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
                        
            $memberships = $this->membership_model->SelectRecord('membership','*',$udata=array("is_deleted"=>"0"),'id asc');            
            $datas->memberships = $memberships;            
            $datas->result = $this->membership_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Membership Plans';
            $datas->field = 'Datatable';
            $datas->page = 'list_membership';            
            $this->load->view('list_membership_view',$datas);            
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
               $udata['name'] = $this->input->post('name');
               $udata['price'] = $this->input->post('price');
               $udata['currency'] = $this->input->post('currency');
               $udata['duration'] = $this->input->post('duration');                              
               $udata['details'] = $this->input->post('details');               
                            
               //print_r($udata); die;
               if($this->membership_model->InsertRecord('membership',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Membership Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('membership/add');
            }
            
            $udata = array("id"=>$this->session->userdata('user_id'));               
            $datas->result = $this->membership_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Add Membership Plan';
            $datas->field = 'Add';
            $datas->page = 'add_membership';            
            $this->load->view('add_membership_view',$datas);            
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
               $udata['name'] = $this->input->post('name');
               $udata['price'] = $this->input->post('price');
               $udata['currency'] = $this->input->post('currency');
               $udata['duration'] = $this->input->post('duration');                              
               $udata['details'] = $this->input->post('details');        
               
               if($this->membership_model->UpdateRecord('membership',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Membership Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('membership/edit/'.base64_encode($id));
            }
            
            $datas->membership = $this->membership_model->SelectSingleRecord('membership','*',$udata=array("id"=>$id),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));               
            $datas->result = $this->membership_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Update Membership';
            $datas->field = 'Add';
            $datas->page = 'edit_membership';            
            $this->load->view('edit_membership_view',$datas);                                          
        }                        
        
        public function delete($id){
            $id = base64_decode($id);
            $data=new stdClass();
            if($this->membership_model->UpdateRecord('membership',array("is_deleted"=>"1"),array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Membership Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('membership');
        }
                		        	
}
?>