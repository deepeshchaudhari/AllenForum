<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "../../functions/career/Career.php";
$carrer = new Career();
/*
 * File Name : career-ajax-request.php
 * Ajax Request File
 */

/*
 * add Edit Company Information for students
 */
if (isset($_POST['addComapnyInfo']) == "addComapnyInfo"){
   $company_name = $_POST['company_name'];
   $company_website = $_POST['company_website'];
   $company_category = $_POST['company_category'];
   $company_description = $_POST['company_description'];
   $worktype = $_POST['worktype'];

   $company_logoHidden = $_POST['company_logoHidden'];
   $companyEditId = $_POST['companyEditId'];
   $userId = $_SESSION['userId'];

    $logoName = "";
   if ($_FILES['company_logo']['tmp_name']){
       if ($company_logoHidden){
           /* remove the exsting logo */
           unlink("../../uploads/career/companylogo/".$company_logoHidden);
       }
       $logoTmp = $_FILES['company_logo']['tmp_name'];
       $logoName = $_FILES['company_logo']['name'];
       $directory = "../../uploads/career/companylogo/";
       move_uploaded_file($logoTmp,$directory.$logoName);
   } else{
       $logoName = $company_logoHidden;
   }
   $saveInfo = $carrer->saveCompanyInformation($connection,$company_name,$company_website,$company_category,$company_description,$worktype,$logoName,$userId,$companyEditId);
   if ($saveInfo){
       echo 'test^success';
   }

}

/*
 * display the company List
 */
if (isset($_POST['listCompany']) == 'listCompanyDetails')
{
    $company = $carrer->getAllCompanies($connection);
    $data = '';
    if ($company->num_rows > 0)
    {
        while ($companies = $company->fetch_object())
        {
            $data .= '
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tr>
                            <td><img src="ownImages/other/job-icon.png" width="60" height="50"/></td>
                            <td>
                                <p style="vertical-align:text-top">
                                    <span class="lead"><a href="http://'.strtolower($companies->company_website).'  " target="_blank">'.$companies->company_name.'</a> </span><br/>
                                    '.$companies->company_description.'
                                    <span style="display: '.(($_SESSION['userrole']) == "admin"?"block":"none").' ">
                                    <a href="#" onclick="addEditComapanyInfo(\'edit\',\''.$companies->id.'\');">
                                        <i class="glyphicon glyphicon-pencil" style="padding-left: 10px;"></i>
                                    </a>
                                    <a href="" onclick="addEditComapanyInfo(\'delete\',\''.$companies->id.'\');">
                                        <i class="glyphicon glyphicon-remove" style="padding-left: 10px;"></i>
                                    </a>
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <img src="ownImages/other/line.png" width="100%" height="1"/>
                </div>
            </div>
            ';
        }
    }
    else{
        $data .= "";
    }
    echo $data;
}


/*
 * Edit The company Details
 */
if (isset($_POST['getCompanyDetail']) == "getCompanyDetailById"){
    $companyId = $_POST['companyId'];
    $getCompany = $carrer->getCompanyDetailsById($connection,$companyId);
    if ($getCompany->num_rows > 0){
        $companyDetails = $getCompany->fetch_object();
        echo 'test^'.$companyDetails->company_name.'^'.$companyDetails->company_website.'^'.$companyDetails->company_branch.'^'.$companyDetails->company_description.'^'.$companyDetails->company_logo;
    }
}

/*
 * delete the company
 */
if (isset($_POST['deleteCompany']) == 'deleteCompanyDetailById'){
    $companyId = $_POST['companyId'];
    $delete = $carrer->deleteCompany($connection,$companyId);
    if ($delete){
        echo 'test^deleted';
    }

}