<?php
/**
 * Created by PhpStorm.
 * User: Porus
 * Date: 11-May-18
 * Time: 4:44 AM
 */

class Getroutes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Getmodel');
    }
    public function index(){
        echo "Welcome in Allenforum Get Api !";
    }
    public function login()
    {
        $user = array();
        $useremail = $this->input->post('useremail');
        $userpass  = $this->input->post('userpass');
        $auth = $this->Getmodel->authenticate($useremail,$userpass);
        if ($auth->num_rows() > 0){
            $user['status'] = "1";
            $loginDetail = $auth->row();
            $userLoginId = $loginDetail->id;
            $userRole = $loginDetail->user_role;
         //   echo $userLoginId; die();
            $userDetail = $this->Getmodel->getLoggedInUserDetails($userLoginId,$userRole);
            $user['data'] = $userDetail->row();
        } else{
            $user['status'] = "0";


        }
        echo json_encode($user);
    }

    /*
     * get student Profile data
     */
    function getProfileData()
    {
        $profile = array();
        $userId = $this->input->post("userId");
        $userLoginId = $this->input->post("userLoginId");
        $userDetail = $this->Getmodel->getProfileData($userId,$userLoginId);
        if ($userDetail->num_rows() > 0)
        {
            $profile['profile'] = $userDetail->row();
        }
        echo json_encode($profile);
    }

    /*
     * get experience List
     */

    function getExpList(){
        $profileExp = array();
        $userId = $this->input->post("userId");
        $getExpListData = $this->Getmodel->getExperienceList($userId);
        if ($getExpListData->num_rows() > 0)
        {
            $profileExp['profileExp'] = $getExpListData->result();
        }
        echo json_encode($profileExp);
    }
}