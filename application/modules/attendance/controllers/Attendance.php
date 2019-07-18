<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Attendance extends MY_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('attendance_model');
            $this->load->helper('my_helper');
            if( $this->session->userdata('user_group_id') != 1){
                redirect('user');
            }            
        }
                        
        
        public function index(){
            
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
            if(!empty($_POST)){                
                $gdata['title'] = $this->input->post('title');
                $gdata['owner1'] = $this->input->post('owner1');
                $gdata['owner2'] = $this->input->post('owner2');
                $gdata['contact'] = $this->input->post('contact');                                
 
                $gdata['alternate'] = $this->input->post('alternate');
                $gdata['website'] = $this->input->post('website');
                $gdata['email'] = $this->input->post('email');
                $gdata['address'] = $this->input->post('address');
                
                $attendance = $this->attendance_model->SelectSingleRecord('business','*',$udata=array("user_id"=>$this->session->userdata('user_id')),'id asc');
                
                if($attendance){
                    if($this->attendance_model->UpdateRecord('business',$gdata,array("user_id"=>$this->session->userdata('user_id')))){
                        $data->error=0;
                        $data->success=1;
                        $data->message="Attendance Updated Successfully";
                   }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message="Network Error";
                   }     
                }else{                   
                    $gdata['user_id'] = $this->session->userdata('user_id');
                    if($this->attendance_model->InsertRecord('business',$gdata)){
                        $data->error=0;
                        $data->success=1;
                        $data->message="Attendance Updated Successfully";
                   }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message="Network Error";
                   }
                }
               
               
               $this->session->set_flashdata('item',$data);
               redirect('attendance');
            }
            
            $datas->customers = $this->attendance_model->SelectRecord('customer','*',$udata=array("is_deleted"=>'0'),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));               
            $datas->result = $this->attendance_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Attendance';
            $datas->field = 'Datatable';
            $datas->page = 'attendance';            
            $this->load->view('edit_attendance_view',$datas);                                          
        }                                       
        
        public function mark(){
        if(!empty($_POST)){                                                                
                
                                  
                    $gdata['user_id'] = $this->input->post('customer_id');
                    $gdata['date'] = $this->input->post('date');
                    $gdata['time'] = $this->input->post('time');
                    if($this->attendance_model->InsertRecord('attendance',$gdata)){
                        $data->error=0;
                        $data->success=1;
                        $data->message="Attendance Marked Successfully";
                   }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message="Network Error";
                   }                               
               
               $this->session->set_flashdata('item',$data);
               redirect('attendance');
            }
        }
}
?>