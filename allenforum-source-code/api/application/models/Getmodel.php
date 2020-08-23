<?php
/**
 * Created by PhpStorm.
 * User: Porus
 * Date: 11-May-18
 * Time: 4:51 AM
 */

class Getmodel extends CI_Model
{
    function authenticate($useremail,$password){
        $password = sha1($password);
        $query = $this->db->get_where('forum_users',array('user_email' => $useremail,'user_pass' => $password));
        return $query;
    }
    function getLoggedInUserDetails($userLoginId,$userRole){
        if($userRole == 'admin'){
            $this->db->select('fa.id as userId,fu.id as userLoginId,fu.user_email as login_email,fa.name AS 
			login_name,fu.user_role as login_role,fa.contact as login_contact,fa.profile as login_profile,
			fa.department as login_department');
            $this->db->from('forum_users fu');
            $this->db->join('forum_admin fa','fu.id=fa.user_id','left');
            $this->db->where(array('fu.id' => $userLoginId));
            $query = $this->db->get();

        }
       else if($userRole == 'student'){
            $this->db->select('fs.id as userId,fu.id as userLoginId,fs.student_roll,fu.user_email as login_email,fs.student_name AS login_name,fu.user_role as login_role,fs.student_contact as login_contact,fc.course_name,fd.department_name as login_department,fd.id as department_id,fs.student_profile as login_profile');
            $this->db->from('forum_users fu');
            $this->db->join('forum_student fs','fu.id=fs.user_id','left');
            $this->db->join('forum_courses fc','fs.student_program=fc.id','left');
            $this->db->join('forum_departments fd','fs.student_department=fd.id','left');
            $this->db->where(array('fu.id' => $userLoginId,'fu.user_role' => $userRole ));
            $query = $this->db->get();
        }
       else if($userRole == 'faculty'){
           $this->db->select('ff.id as userId,fu.id as userLoginId,fu.user_email as login_email,fu.user_role as login_role,ff.name AS login_name,ff.contact as login_contact,fc.course_name,fd.department_name as login_department, ff.profile as login_profile,fd.id as department_id');
           $this->db->from('forum_users fu');
           $this->db->join('forum_faculty ff','fu.id=ff.user_id','left');
           $this->db->join('forum_courses fc','ff.program=fc.id','left');
           $this->db->join('forum_departments fd','ff.department=fd.id','left');
           $this->db->where(array('fu.id' => $userLoginId,'fu.user_role' => $userRole ));
           $query = $this->db->get();
        }

        else if($userRole == 'receptionist'){
           $this->db->select('fr.id as userId,fu.id as userLoginId,fu.user_email as login_email,fr.name AS login_name,fr.contact as login_contact,fr.profile as login_profile,fr.department as login_department');
           $this->db->from('forum_users fu');
           $this->db->join('forum_receptionist fr','fu.id=fr.user_id','left');
           $this->db->where(array('fu.id' => $userLoginId,'fu.user_role' => $userRole ));
           $query = $this->db->get();
        }

        else if($userRole == 'librarian'){
            $this->db->select('fl.id as userId,fu.id as userLoginId,fu.user_email as login_email,fl.name AS login_name,fl.contact as login_contact,fl.profile as login_profile,fl.department as login_department');
            $this->db->from('forum_users fu');
            $this->db->join('forum_librarian fl','fu.id=fl.user_id','left');
            $this->db->where(array('fu.id' => $userLoginId,'fu.user_role' => $userRole ));
            $query = $this->db->get();
        }
        return $query;
    }

    function getProfileData($userId,$userLoginId)
    {
       /* $query = "SELECT fs.id,fs.student_name,fs.student_contact,fs.student_profile,fs.about_me AS about,fs.my_college as college,
        fc.course_name,fd.department_name FROM forum_student fs LEFT JOIN forum_courses fc ON fs.student_program=fc.id
        LEFT JOIN forum_departments fd ON fs.student_department=fd.id WHERE fs.id=6";*/

        $this->db->select('fs.id,fs.student_name,fs.student_contact,fs.student_profile,fs.about_me AS about,fs.my_college as college,fs.student_year,
        fc.course_name,fd.department_name');
        $this->db->from('forum_student fs');
        $this->db->join('forum_courses fc','fs.student_program=fc.id','left');
        $this->db->join('forum_departments fd','fs.student_department=fd.id','left');
        $this->db->where(array('fs.id' => $userId ));
        $query = $this->db->get();
        return $query;

    }

    function getExperienceList($userId)
    {
        //SELECT fsp.user_id,fsp.title,fsp.description,fsp.position FROM forum_student_proexp fsp WHERE fsp.user_id=6
        $this->db->select('fsp.user_id,fsp.title,fsp.description,fsp.position');
        $this->db->from('forum_student_proexp fsp');
        $this->db->where(array('user_id' => $userId));
        $query = $this->db->get();
        return $query;
    }

}