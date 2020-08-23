<?php
/*
 * File Name : Career.php
 * Class File
 */
class Career
{
    /* get all departments */
    function getAllDepartment($connection){
        $department = $connection->query("SELECT * FROM forum_departments");
        if ($department){
            return $department;
        }
    }

    /* save company information */
    function saveCompanyInformation($connection,$company_name,$company_website,$company_category,$company_description,$worktype,$logoName,$userId,$companyEditId){
        if ($worktype == "add"){
            $query = "INSERT INTO forum_company SET company_name='$company_name',company_website='$company_website',company_logo='$logoName',company_branch='$company_category',company_description='$company_description',added_by='$userId'  ";
        } else if ($worktype == "edit"){
            if ($companyEditId) {
                $query = "UPDATE forum_company SET company_name='$company_name',company_website='$company_website',company_logo='$logoName',company_branch='$company_category',company_description='$company_description',added_by='$userId' WHERE id='$companyEditId' ";
            }

        }
        $result = $connection->query($query);
        return $result;
    }

    /*
     * List the companies
     */
    function getAllCompanies($connection){
        $query = "SELECT * FROM forum_company WHERE status='1'";
        $result = $connection->query($query);
        return $result;
    }
    function getCompanyDetailsById($connection,$companyID){
        $query = "SELECT * FROM forum_company WHERE id = '$companyID' AND status = '1' ";
        $result = $connection->query($query);
        return $result;
    }
    function deleteCompany($connection,$companyId){
        $query = "UPDATE forum_company SET status=0 WHERE id = '$companyId' ";
        $result = $connection->query($query);
        return $result;
    }
}