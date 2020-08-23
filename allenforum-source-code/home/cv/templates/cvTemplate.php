<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include "../../functions/common/Common.php";
$common = new CommonFunctions();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="dep/normalize.css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="dep/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body lang="en">
<section id="main">
    <?php
        $cvDetails = $common->getCvDetails($connection,$_SESSION['userId'],$_SESSION['userrole']);
        if ($cvDetails->num_rows >0)
        {
            $user = $cvDetails->fetch_object();
            $cvId = $user->id;
            $name = $user->name;
            $carrierObjective = $user->carrierObj;
            $cvEmail = $user->email;
            $cvContact = $user->contact;
            $hobbies = explode(',',$user->hobbies);
            $strengths = explode(',',$user->strengths);
            $permanentAddress = $user->address;
            $fathersName = $user->fathersName;
            $dob = $user->dob;
            $gender = $user->gender;
            $nationality = $user->nationality;
            $languages = $user->languages;
            $extraCarricular  = rtrim($user->extraCarricular,'/');
            $extraCarricularActivities = explode('/',$extraCarricular);

            /* get education details */
            $education = $common->getCvEducationDetails($connection,$cvId);
            $projects = $common->getCvAcademicProjects($connection,$cvId);
            $traingnSkills = $common->getcvTrainingnSkills($connection,$cvId);

        }
    ?>
    <header id="title">
        <h1><?php echo $name;?></h1>
        <span class="subtitle">Plaintiff, defendant &amp; witness</span>
    </header>
    <section class="main-block">
        <h2>
            <i class="fa fa-suitcase"></i> Objective
        </h2>
        <section class="blocks">
            <div class="date">
            </div>
            <div class="decorator">
            </div>
            <div class="details">
                <?php echo $carrierObjective;?>
            </div>
        </section>
    </section>
    <section class="main-block concise">
        <h2>
            <i class="fa fa-graduation-cap"></i> Education
        </h2>
        <?php
        if ($education->num_rows > 0 ) {
            while ($educationRow = $education->fetch_object()) { ?>
                <section class="blocks">
                    <div class="date">
                        <span>2009</span><span>2014</span>
                    </div>
                    <div class="decorator">
                    </div>
                    <div class="details">
                        <header>
                            <h3><?php echo $educationRow->qualification;?></h3>
                            <span class="place"><?php echo $educationRow->boardUniversity;?></span>
                            <span class="location">Kanpur, India</span>
                        </header>
                        <div>with an aggregate of <?php echo $educationRow->percentage;?>percent</div>
                    </div>
                </section>
           <?php }
        }
        ?>

    </section>
    <section class="main-block">
        <h2>
            <i class="fa fa-folder-open"></i>Extra Carricular Activities
        </h2>
        <?php
        if ( $extraCarricularActivities )  {
            foreach ( $extraCarricularActivities as $extraActivities ) { ?>
                <section class="blocks">
                    <div class="date">
                        <span>2014</span>
                    </div>
                    <div class="decorator">
                    </div>
                    <div class="details">
                        <header>
<!--                            <h3>--><?php //echo $projectsRows->projectTitle;?><!--</h3>-->
                            <!--<span class="place">Lab</span>-->
                        </header>
                        <?php echo $extraActivities;?>
                    </div>
                </section>
            <?php }
        }
        ?>
    </section>
    <section class="main-block">
        <h2>
            <i class="fa fa-folder-open"></i> Academic Projects
        </h2>
        <?php
        if ( $projects->num_rows > 0 )  {
            while ( $projectsRows = $projects->fetch_object() ) { ?>
                <section class="blocks">
                    <div class="date">
                        <span>2014</span>
                    </div>
                    <div class="decorator">
                    </div>
                    <div class="details">
                        <header>
                            <h3><?php echo $projectsRows->projectTitle;?></h3>
                            <!--<span class="place">Lab</span>-->
                        </header>
                        <?php echo $projectsRows->projectDescription;?>
                    </div>
                </section>
            <?php }
        }
        ?>
    </section>

    <section class="main-block">
        <h2>
            <i class="fa fa-folder-open"></i>Technical Skills
        </h2>
        <?php
        if ( $traingnSkills->num_rows > 0 )  {
            while ( $trainingRows = $traingnSkills->fetch_object() ) { ?>
                <section class="blocks">
                    <div class="date">
                        <span>2014</span>
                    </div>
                    <div class="decorator">
                    </div>
                    <div class="details">
                        <header>
                            <h3><?php echo $trainingRows->skillTitle;?></h3>
                            <!--<span class="place">Lab</span>-->
                        </header>
                        <?php echo $trainingRows->skillName;?>
                    </div>
                </section>
            <?php }
        }
        ?>
    </section>
    <section class="main-block">
        <h2>
            <i class="fa fa-folder-open"></i>DECLARATION
        </h2>
            <section class="blocks">
                <div class="date">
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    I hereby declare that the information furnished above is true to the best of my knowledge
                    and I am also confident of my ability to work in a team.
                </div><br/>

            </section>

        <header style="float: right"><br/>
            <h3>Ankit</h3>
        </header>

    </section>
</section>
<aside id="sidebar">
    <div class="side-block" id="contact">
        <h1>
            Contact Info
        </h1>
        <ul>
            <li><i class="fa fa-envelope"></i> <?php echo $cvEmail;?></li>
            <li><i class="fa fa-linkedin"></i> linkedin.com/in/ankit-developer</li>
            <li><i class="fa fa-phone"></i> <?php echo $cvContact;?></li>
        </ul>
    </div>
    <div class="side-block" id="skills">
        <h1>
            Hobbies
        </h1>
        <ul>
            <?php
            foreach ($hobbies as $hobbi){
              echo ' <li>'.$hobbi.'</li>';
            }
            ?>
        </ul>
    </div>
    <div class="side-block" id="skills">
        <h1>
            Strengths
        </h1>
        <ul>
            <?php
            foreach ($strengths as $strength){
                echo ' <li>'.$strength.'</li>';
            }
            ?>
        </ul>
    </div>
    <div class="side-block" id="skills">
        <h1>
            Permanent Address
        </h1>
       <p><?php echo $permanentAddress;?></p>
    </div>
    <div class="side-block" id="skills">
        <h1>
            Personal Data
        </h1>
        <table>
            <tr>
                <td>Fathers' Name</td><td>:</td><td><?php echo $fathersName;?></td>
            </tr>
            <tr>
                <td>Date of Birth</td><td>:</td><td><?php echo $dob;?></td>
            </tr>
            <tr>
                <td>Gender</td><td>:</td><td><?php echo $gender;?></td>
            </tr>
            <tr>
                <td>Nationality</td><td>:</td><td><?php echo $nationality;?></td>
            </tr>
            <tr>
                <td>Languages</td><td>:</td><td><?php echo $languages;?></td>
            </tr>

        </table>
    </div>
</aside>
</body>
</html>
