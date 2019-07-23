<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subscription extends MY_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('subscription_model');
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
                        
            $subscriptions = $this->subscription_model->SelectRecord('subscription','*',array("is_deleted"=>"0",'user_id'=>$this->session->userdata('user_id')),'id asc');            
            $datas->subscriptions = $subscriptions;
            $udata = array("id"=>$this->session->userdata('user_id'));             
            $datas->result = $this->subscription_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $datas->currency = '$';            
            $datas->title = 'Subscription';
            $datas->field = 'Datatable';
            $datas->page = 'list_subscription';            
            $this->load->view('list_subscription_view',$datas);            
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
               $udata['user_id'] = $this->session->userdata('user_id');
               $udata['customer_id'] = $this->input->post('customer_id');
               $udata['membership_id'] = $this->input->post('membership_id');
               $udata['amount'] = $this->input->post('amount');
               $udata['discount'] = $this->input->post('discount');                              
               $udata['register_date'] = $this->input->post('register_date');
               $udata['start_date'] = $this->input->post('start_date');               
               $udata['remarks'] = $this->input->post('remarks');
               
               $membership = $this->subscription_model->SelectSingleRecord('membership','*',array("id"=>$this->input->post('membership_id')),$orderby=array());
               $udata['expire_date'] = (strtotime($this->input->post('start_date')) + $membership->days * (3600*24));
               //print_r($udata); die;
               if($this->subscription_model->InsertRecord('subscription',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Subscription Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('subscription/add');
            }
            
            $udata = array("id"=>$this->session->userdata('user_id'));               
            $datas->result = $this->subscription_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $datas->customers = $this->subscription_model->SelectRecord('customer','*',$udata=array("is_deleted"=>"0"),'id asc');
            $datas->memberships = $this->subscription_model->SelectRecord('membership','*',$udata=array("is_deleted"=>"0"),'id asc');
            $datas->currency = '$';
            $datas->title = 'Add Subscription';
            $datas->field = 'Add';
            $datas->page = 'add_subscription';            
            $this->load->view('add_subscription_view',$datas);            
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
               $udata['user_id'] = $this->session->userdata('user_id');
               $udata['customer_id'] = $this->input->post('customer_id');
               $udata['membership_id'] = $this->input->post('membership_id');
               $udata['amount'] = $this->input->post('amount');
               $udata['discount'] = $this->input->post('discount');                              
               $udata['register_date'] = $this->input->post('register_date');
               $udata['start_date'] = $this->input->post('start_date');               
               $udata['remarks'] = $this->input->post('remarks');
               
               $membership = $this->subscription_model->SelectSingleRecord('membership','*',array("id"=>$this->input->post('membership_id')),$orderby=array());
               $udata['expire_date'] = (strtotime($this->input->post('start_date')) + $membership->days * (3600*24));      
               
               if($this->subscription_model->UpdateRecord('subscription',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Subscription Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('subscription/edit/'.base64_encode($id));
            }
            
            $datas->subscription = $this->subscription_model->SelectSingleRecord('subscription','*',$udata=array("id"=>$id),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));               
            $datas->result = $this->subscription_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $datas->customers = $this->subscription_model->SelectRecord('customer','*',$udata=array("is_deleted"=>"0"),'id asc');
            $datas->memberships = $this->subscription_model->SelectRecord('membership','*',$udata=array("is_deleted"=>"0"),'id asc');
            $datas->currency = '$';
            $datas->membership = $this->subscription_model->SelectSingleRecord('membership','*',array("id"=>$datas->subscription->membership_id),$orderby=array());
            //print_r($datas->membership); die;
            $datas->title = 'Update Subscription';
            $datas->field = 'Add';
            $datas->page = 'edit_subscription';            
            $this->load->view('edit_subscription_view',$datas);                                          
        }                        
        
        public function delete($id){
            $id = base64_decode($id);
            $data=new stdClass();
            if($this->subscription_model->UpdateRecord('subscription',array("is_deleted"=>"1"),array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Subscription Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('subscription');
        }
        
        public function getMembership(){
            $id = $_POST['id'];            
            $membership = $this->subscription_model->SelectSingleRecord('membership','*',$udata=array("id"=>$id),array());            
            echo json_encode($membership);         
        }
                		        	
}
?>