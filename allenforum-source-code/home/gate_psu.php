<?php include "../config/session_header.php"; ?>
<?php
      $pageTitle = "About PSU's | Allenhouse Group of Colleges";
      include('header.php');?>


  <?php
  $activeTabDash = "active";
  $activeLinkDash = "active";
  $branch=$_GET['branch'];
  $color=$_GET['color'];
  include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content (body)-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          GATE PSU's
        <?php echo strtoupper($branch); ?>  <a href="gate_dashboard.php?branch=<?php echo"$branch"?>&color=<?php echo"$color"?>"><i class="fa  fa-backward"></i> <small><b>BACK</b></a> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <div style="padding-left: 10px;padding-right: 10px;">
          <img src="ownImages/other/line.png"  width="100%" height="1"/>
      </div>
   <!-- here table will be included according to branch -->

       <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
           <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bank"></i>

              <h3 class="box-title">LINKS AND DATES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <p><strong>PSU Recruitment Through GATE 2016 are as follows:</strong></p>

<table align="center" border="3">
  <thead>
    <tr>
      <th scope="col" valign="top">
      <p><strong>S.No</strong></p>
      </th>
      <th scope="col" valign="top">
      <p><strong>Name of PSU</strong></p>
      </th>
      <th scope="col" valign="top">
      <p><strong>Application Dates</strong></p>
      </th>
      <th scope="col" valign="top">
      <p><strong>Number of vacancies</strong></p>
      </th>
      <th scope="col" valign="top">
      <p><strong>Disciplines&nbsp;</strong></p>
      </th>
      <th scope="col" valign="top">
      <p><strong>Detailed Information</strong></p>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td valign="top">
      <p><strong>New</strong></p>
      </td>
      <td valign="top">
      <p>IRCON</p>

      <p>Available Now</p>
      </td>
      <td valign="top">
      <p>July 2 to 16, 2016</p>
      </td>
      <td valign="top">
      <p>40</p>
      </td>
      <td valign="top">
      <p>Civil/ Electrical</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/ircon-announces-recruitment-of-executive-trainees-through-gate-2015-gate-2016-181394" target="_blank">Click here to read</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p><strong>New</strong></p>
      </td>
      <td valign="top">
      <p>DMRC</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>May 26 to June 27, 2016</p>
      </td>
      <td valign="top">
      <p>42</p>
      </td>
      <td valign="top">
      <p>Electrical / Electronics</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/delhi-metro-rail-corporation-announces-recruitment-through-gate-2015-2016-176695" target="_blank">Click here to apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p><strong>New</strong></p>
      </td>
      <td valign="top">
      <p>BSPCL</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>April 11 to May 30, 2016</p>
      </td>
      <td valign="top">
      <p><strong>&nbsp;</strong>267</p>
      </td>
      <td valign="top">
      <p>Electrical/ Electrical &amp; Electronics/Mechanical / Production/ Industrial Engineering/ Production &amp; Industrial Engineering/ Thermal/ Mechanical &amp; Automation/ PowerEngineering/ Civil Engineering/ Electronics &amp; Instrumentation/ Instrumentation &amp; Control Electronics/ Electronics &amp; Tele-communication/ Electronics &amp; Power/ Power Electronics / Electronics &amp; Communication/ CSE/ IT</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/bspcl-announces-recruitment-of-asst-engineers-through-gate-2015-gate-2016-169962" target="_blank">Click here to apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>1.</p>
      </td>
      <td valign="top">
      <p>DRDO<br />
      &nbsp;</p>
      </td>
      <td valign="top">
      <p>March 20 to April 10, 2016 Extended to August 10</p>
      </td>
      <td valign="top">&nbsp;</td>
      <td valign="top">
      <p>Electronics &amp; Communication Engg/ Electronics&nbsp;Engg/ Electronics &amp; Computer Engg/ Electronics &amp; Control Engg/ Electronics &amp; Communication/ System&nbsp;&nbsp;Engg/ Electronics &amp; Instrumentation Engg/Electronics &amp; Tele&acirc;&euro;Communication&nbsp;&nbsp;Engg/ Electronics &amp; Telematics&nbsp;&nbsp;Engg/ Industrial Electronics&nbsp;&nbsp;Engg/ Tele Communication&nbsp;&nbsp;Engg/ Telecommunication &amp; Information Tech/ Applied Electronics &amp; Instrumentation Engg/ &nbsp;Electronics &amp; Electrical Communication Engg/ Mechanical&nbsp;&nbsp;Engg/ Mechtronics Engg/ Mechanical &amp; Automation Engg/ Mechanical &amp; Production Engg/ Computer Science &amp; Engineering/ Computer Science App Engg.Tech/ Computer Science/Engg. &amp; InfoTech /Computer Science &amp; System Engg/ Computer Software&nbsp;&nbsp;Engg/ Computer Science &amp; Automation Engg/ Computer Technology/ Computer Technology &amp; Informatics Engg/ Computer Technology &amp; Information Engg/ Information Science /&nbsp;&nbsp;Technology&nbsp;Engg /Information Technology Engg/ Mathematics/ Applied Mathematics/ Electrical Engg/ Electrical Power System&nbsp;&nbsp;Engg/ Electrical &amp; Electronics&nbsp;&nbsp;Engg/&nbsp; Electrical &amp; Renewable Energy Engg/ Power Engg/ Power Electronics Engg/ Electronics &amp; Electrical Communication Engg/ Electrical with Communication Engg/ Physics/ Applied Physics/ Physics (Electronics)/ Solid State Physics/ Aeronautical Engg/ Aerospace Engg/ Avionics Engg/ Chemical Engg/ Chemical Engg / Chemical Tech/ Chemical Plant Engg/ App. Chemical and Polymer Tech/ Polymer Science &amp; Chemical Technology/ Chemistry/ Organic Chemistry/ Inorganic Chemistry/ Analytical Chemistry/ Physical Chemistry/ Civil&nbsp;&nbsp;Engg/ Civil &amp; Structural&nbsp;&nbsp;&nbsp;Engg/ Metallurgy &amp; Material Tech/ Metallurgy/Metallurgical Engg/ Materials Engg</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/drdo-announces-recruitment-of-scientist-engineer-through-gate-2015-or-gate-2016-143176" target="_blank">Click here to apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>2.</p>
      </td>
      <td valign="top">
      <p>RITES<br />
      Date Over</p>
      </td>
      <td valign="top">
      <p>April 12 to May 1, 2016</p>
      </td>
      <td valign="top">
      <p>30</p>
      </td>
      <td valign="top">
      <p>Civil Engineering and Mechanical Engineering</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/rites-announces-recruitment-of-graduate-engineer-trainees-through-gate-2016-168759" target="_blank">Click here to apply</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>3.</p>
      </td>
      <td valign="top">
      <p>ONGC Ltd. Announced</p>
      </td>
      <td valign="top">
      <p>June 2016</p>
      </td>
      <td valign="top">&nbsp;</td>
      <td valign="top">
      <p>Mechanical/ Petroleum/ Civil/ ELectrical/ Electronics/ Telecom/ E&amp;T/ PG in Physics with Electronics/ Instrumentation/ Chemcical/ Applied Petroleum/ PG in Geo-Physics/ PG in Mathematics/ PG in Petroleum Technology/PG in Chemistry/ PG in Geology/ PG in Petroleum Geo-Science/ PG in Geological Technology/ Auto Engineering/ Computer Engineering/ Information Technology/ MCA/ &quot;B&#39;Level Diploma as per Dept of Electronics, GOI</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/ongc-announces-recruitment-of-graduate-trainees-through-gate-2016-121146" target="_blank">Click here to apply&nbsp;</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>4.</p>
      </td>
      <td valign="top">
      <p>NFL</p>

      <p>Announced</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Chemical/ Mechanical/ Electrical/ Instrumentation</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/nfl-announces-recruitment-of-management-trainees-through-gate-2016-121288" target="_blank">Click here to&nbsp; apply&nbsp;</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>5.</p>
      </td>
      <td valign="top">
      <p>Cabinet Secretariat, Govt of India<br />
      Date Over</p>
      </td>
      <td valign="top">
      <p>April 23, 2016 till June 6, 2016</p>
      </td>
      <td valign="top">
      <p>22</p>
      </td>
      <td valign="top">
      <p>Computer Science/ Electronics and Communications or Electronics/Physics or Chemistry/Telecommunication or Electronics</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/cabinet-secretariat-of-india-announces-recruitment-of-sr-research-sr-field-officers-through-gate-121506" target="_blank">Click here to apply</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>6.</p>
      </td>
      <td valign="top">
      <p>IPR</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>May 16 to 27, 2016</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>&nbsp;Physics/Applied Physics/ Engineering Physics/ Mechanical Engineering/ Electrical Engineering/ Electrical &amp; Electronics Engineering</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/ipr-announces-recruitment-of-technical-trainees-through-gate-2016-126075" target="_blank">Click here to apply</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>7.</p>
      </td>
      <td valign="top">
      <p>PSPCL</p>

      <p>Announced</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Electrical Engineering, Electrical &amp; Electronics Engineering</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/pspcl-announces-recruitment-of-ae-and-ot-electrical-through-gate-2016-121432" target="_blank">Click here to apply&nbsp;</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>8.</p>
      </td>
      <td valign="top">
      <p>PSTCL</p>

      <p>Announced</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Electrical/ Electrical &amp; Electronics/ Mechanical/ Electronics &amp; Communication/ Instrumentation &amp; Control/ Civil/ Computer Science/ IT</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/pstcl-announces-recruitment-of-ae-ot-and-am-it-through-gate-2016-121636" target="_blank">Click here to apply</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>9</p>
      </td>
      <td valign="top">
      <p>MDL</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>December 18, 2015 to February 1, 2016</p>
      </td>
      <td valign="top">
      <p>35</p>
      </td>
      <td valign="top">
      <p>Mechanical/ Mechanical &amp; Industrial Engineering/ Mechanical &amp; Production Engineering/ Production Engineering/ Production Engineering &amp; Management/ Production &amp; Industrial Engineering/Electrical/ Electrical &amp; Electronics/</p>

      <p>Electrical &amp; Instrumentation</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/mdl-announces-recruitment-of-executive-trainees-through-gate-2016-120994" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>10</p>
      </td>
      <td valign="top">
      <p>BPCL Limited&nbsp;</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>December 29, 2015 till February 14, 2016</p>
      </td>
      <td valign="top">&nbsp;</td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/mechanical-engineering" target="_blank">Mechanical Engineering/</a><a href="https://engineering.careers360.com/chemical-engineering" target="_blank">Chemical Engineering</a>&nbsp;/ Chemical Technology/ Instrumentation Engineering / Instrumentation and Control Engineering / Instrumentation and Electronics Engineering / Electronics and Instrumentation Engineering</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/bpcl-announces-recruitment-of-management-trainees-through-gate-2016-121006" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>11</p>
      </td>
      <td valign="top">
      <p>GAIL</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>December 29, 2015 to January 29, 2016</p>
      </td>
      <td valign="top">
      <p>67</p>
      </td>
      <td valign="top">
      <p>Chemical/ Petrochemical/ Chemical Technology/ Petrochemical Technology/ Mechanical/ Production/ Production &amp; Industrial/ Manufacturing/ Mechanical &amp; Automobile/ Electrical/ Electrical &amp; Electronics/ Instrumentation/ Instrumentation &amp; Control/ Electronics &amp; Instrumentation/ Electrical &amp; Instrumentation/ Electronics/ Electrical &amp; Electronics/ Computer<br />
      Science/ Information Technology/ Electronics/ Electronics &amp; Communication/ Electronics &amp; Telecommunication/ Telecommunication/ Electrical &amp;<br />
      Electronics/ Electrical &amp; Telecommunication</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/gail-announces-recruitment-of-executive-trainees-through-gate-2016-121130" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>12</p>
      </td>
      <td valign="top">
      <p>NLC Ltd</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>December 23, 2015 to January 22, 2016</p>
      </td>
      <td valign="top">
      <p>100</p>
      </td>
      <td valign="top">
      <p>Mechanical/Electrical &amp; Electronics Engineering/ Electrical/ Electronics &amp; Communicationg Engineering/Civil/Instrumentation / Electronics &amp; Instrumentation / Instrumentation &amp; Control /Computer Science Engineering / Computer Engineering / Information Technology/Mining</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/nlc-announces-recruitment-of-graduate-executive-trainees-through-gate-2016-121441" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>13</p>
      </td>
      <td valign="top">
      <p>CEL<br />
      Date Over<br />
      &nbsp;</p>
      </td>
      <td valign="top">
      <p>December 30, 2015 to February 20, 2016</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/electronics-and-communication-engineering" target="_blank">Electronics &amp; Communication Engineering</a>/ Mechanical Engineering/ Electrical Engineering/ Material Science/ Ceramics</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/cel-announces-recruitment-of-graduate-engineers-on-contractual-basis-through-gate-2016-121634" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>14</p>
      </td>
      <td valign="top">
      <p>IndianOil Date Over</p>
      </td>
      <td valign="top">
      <p>January 1, 2016 to February 14, 2015</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Chemical, Civil,&nbsp;<a href="https://engineering.careers360.com/computer-science-engineering" target="_blank">Computer Science &amp; IT,</a>&nbsp;Electrical, Electronics &amp; Communications, Instrumentation, Mechanical, Metallurgy, Petroleum, Polymer</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/iocl-announces-recruitment-of-engineers-through-gate-2016-121129" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>15</p>
      </td>
      <td valign="top">
      <p>HPCL</p>

      <p><br />
      Date Over</p>
      </td>
      <td valign="top">
      <p>December 31, 2015 to February 2, 2016</p>
      </td>
      <td valign="top">
      <p>To be notified &nbsp;</p>
      </td>
      <td valign="top">
      <p>Mechanical/ Mechanical &amp; Production/ Civil/ Electrical/ Electrical &amp; Electronics/Electronics/ Electronics &amp; Communication/ Electronics &amp;<br />
      Telecommunication/ Applied Electronics/ Instrumentation/ Instrumentation &amp; Control/ Electronics &amp; Instrumentation/ Instrumentation &amp; Electronics/ Instrumentation &amp; Process Control/ Chemical/ Petrochemical/ Petroleum Refining &amp; Petrochemical/ Petroleum Refining</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/hpcl-announces-recruitment-of-engineers-through-gate-2016-121287" target="_blank">Click here to read more and Apply Online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>16</p>
      </td>
      <td valign="top">
      <p>NBCC Ltd<br />
      Date Over</p>
      </td>
      <td valign="top">
      <p>December 31, 2015 to January 30, 2016</p>
      </td>
      <td valign="top">
      <p>32</p>
      </td>
      <td valign="top">
      <p>Civil Engineering</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/nbcc-announces-recruitment-of-management-trainees-civil-through-gate-2016-121415" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>17</p>
      </td>
      <td valign="top">
      <p>NHPC</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>January 1 to February 1, 2016</p>
      </td>
      <td valign="top">
      <p>99</p>
      </td>
      <td valign="top">
      <p>Electrical/Electrical &amp; Electronics/Power Systems &amp; High Voltage/Power Engineering/ Civil Engineering/ Mechanical/ Production/ thermal/ Mechanical &amp; Automation Engineering/ Geology/Applied Geology</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/nhpc-announces-recruitment-of-trainee-engineers-officers-through-gate-2016-121635" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>18</p>
      </td>
      <td valign="top">
      <p>BHEL&nbsp;<br />
      Date Over</p>
      </td>
      <td valign="top">
      <p>January 4 to February 1, 2016</p>
      </td>
      <td valign="top">
      <p>200</p>
      </td>
      <td valign="top">
      <p>Industrial and Production Engineering/Industrial Engineering/ Mechanical Production and Tool Engineering/ Production Technology Manufacturing&nbsp; Engineering (NIFFT Ranchi)/ Mechatronics/ Manufacturing Process and Automation/ Power Plant Engineering/ Production Engineering/ Production and Industrial Engineering/ Thermal Engineering/ Manufacturing Technology/ Power Engineering/ Electrical &amp; Electronics/Electrical, Instrumentation &amp; Control/ High Voltage Engg./ Power Systems &amp; High Voltage Engg/ Electrical Machine/&nbsp; Electronics &amp; Power/ Power Electronics/ Power Plant Engineering/ Energy Engineering/ Power Engineering / Electronics &amp; Telecommunication/ Instrumentation/ Electronics &amp; Instrumentation/ Electronics &amp; Power/ Electronics Design &amp; Technology/ Electronics &amp; Biomedical/ Applied Electronics/ Power Electronics/ Electronics &amp; Communication/ Electrical &amp; Electronics/ Industrial Electronics/ Mechatronics/ Electronics &amp; Control/ Control &amp; Instrumentation /&nbsp; Metallurgical Engineering/ Metallurgical &amp; Materials Engineering/ Materials Engineering/ Extractive Metallurgy/ Foundry Technology/ Process Metallurgy<br />
      *Special Recruitment for PwD candidates (ME &amp; EE) through GATE 2016 - Application starts from October 26 to November 20, 2015</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/bhel-announces-recruitment-of-engineer-trainees-through-gate-2016-121119" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>19</p>
      </td>
      <td valign="top">
      <p>NTPC Limited</p>

      <p>Date Over<br />
      &nbsp;</p>
      </td>
      <td valign="top">
      <p>January 5, 2016 to January 29, 2016</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Electrical / Electrical &amp; Electronics / Electrical, Instrumentation &amp; Control / Power Systems &amp; High Voltage / Power Electronics / Power Engineering/ Mechanical / Production / Industrial Engg./ Production &amp; Industrial Engg./ Thermal / Mechanical &amp; Automation / Power Engineering/ Civil / Construction/ Electronics &amp; Instrumentation / Instrumentation &amp; Control/ Electronics / Electronics &amp; Telecommunication / Electronics &amp; Power/ Power Electronics/ Electronics &amp; Communication/ Electrical &amp; Electronics/ Computer Science Engg. / Information Technology</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/ntpc-announces-recruitment-of-graduate-engineers-through-gate-2016-121421" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>20</p>
      </td>
      <td valign="top">
      <p>WBSEDCL</p>

      <p>Date Over</p>

      <p>&nbsp;</p>
      </td>
      <td valign="top">
      <p>&nbsp;February 10 to March 10, 2016</p>
      </td>
      <td valign="top">
      <p>60</p>
      </td>
      <td valign="top">
      <p>Electrical /Power Engineering/ Mechanical</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/wbsedcl-announces-recruitment-of-assistant-engineer-electrical-through-gate-2016-121289" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>21</p>
      </td>
      <td valign="top">
      <p>Oil India</p>

      <p>Date Over</p>
      </td>
      <td valign="top">
      <p>January 15 to February 14, 2016</p>
      </td>
      <td valign="top">
      <p>to be notified</p>
      </td>
      <td valign="top">
      <p>Mechanical Engineering / PG in GeoPhysics/Geology</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/oil-india-announces-recruitment-of-executive-trainees-through-gate-2016-121442" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>22</p>
      </td>
      <td valign="top">
      <p>POWERGRID</p>

      <p><br />
      Date Over</p>
      </td>
      <td valign="top">
      <p>January 15 to March 9, 2016</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Electrical/ Electrical (Power)/ Electrical and Electronics/Power Systems<br />
      Engineering/Power Engineering (Electrical)/Electronics / Electronics and<br />
      Communication/Electronics and Telecommunication/ Civil Engineering/ Computer Science/ Computer Engg./ Information Technology</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/powergrid-announces-recruitment-of-executive-trainees-through-gate-2016-121380" target="_blank">Click here to read more and Apply Online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>23.</p>
      </td>
      <td valign="top">
      <p>MECL</p>

      <p><br />
      Date Over</p>
      </td>
      <td valign="top">
      <p>January 18 to February 5, 2016</p>
      </td>
      <td valign="top">
      <p>&nbsp;29</p>
      </td>
      <td valign="top">
      <p>Mechanical Engineering/ Petroleum Engineering/ Geophysics/ Geology</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/mecl-announces-recruitment-of-executive-trainees-through-gate-2016-142953" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>24</p>
      </td>
      <td valign="top">
      <p>BAARC: OCES/ DGFS 2016</p>

      <p>Date Over<br />
      &nbsp;</p>
      </td>
      <td valign="top">
      <p>January 19 to February 9, 2016<br />
      Final Submission allowed till February 12, 2016 for payments made on February 9, 2016</p>
      </td>
      <td valign="top">
      <p>NA</p>
      </td>
      <td valign="top">
      <p>Mechanical Engineering. Civil Engineering, Electrical Engineering. Electronics &amp; Communication engineering/ computer Science/ Metallurgical Engineering/ Chemical Engineering/Instrumentation Engineering</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/barc-announces-ocesdgfs-2016-through-gate-2015-or-gate-2016-143175" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>25</p>
      </td>
      <td valign="top">
      <p>THDC India Ltd</p>
      </td>
      <td valign="top">
      <p>to be announced</p>

      <p>To be notified</p>
      </td>
      <td valign="top">&nbsp;</td>
      <td valign="top">
      <p>Mechanical, Electrical and Civil Engineering<br />
      &nbsp;</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>26</p>
      </td>
      <td valign="top">
      <p>OPGC Ltd</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Mechanical, Electrical, Civil , C &amp; I</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>27</p>
      </td>
      <td valign="top">
      <p>BBNL</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be Notified</p>
      </td>
      <td valign="top">
      <p>Electronics &amp; Communication / Computer Science / Information Technology / Electrical / Electrical &amp; Electronics</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>28</p>
      </td>
      <td valign="top">
      <p>IRCON International Ltd</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Civil/ Mechanical/ Electrical/ Electronics/ Electronics &amp; Communication Engineering/ Electrical &amp; Electronics Engineering/ Electronics &amp; Instrumentation Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>29</p>
      </td>
      <td valign="top">
      <p>GSECL</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Electrical, Mechanical, C &amp; I, Metallurgy and Environment Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>30</p>
      </td>
      <td valign="top">
      <p>NHAI</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Civil Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>31</p>
      </td>
      <td valign="top">
      <p>KRIBHCO</p>
      </td>
      <td valign="top">
      <p>June 2016</p>
      </td>
      <td valign="top">
      <p>to be notified</p>
      </td>
      <td valign="top">
      <p>Chemical, Mechanical, Electrical, Civil, Computer, Electronics &amp; Communication and Instrumentation Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>32</p>
      </td>
      <td valign="top">
      <p>Mumbai Railway Vikas Corporation Ltd (MRVC Ltd)</p>
      </td>
      <td valign="top">
      <p>November 1 to 30, 2016</p>

      <p>&nbsp;</p>
      </td>
      <td valign="top">
      <p>34</p>
      </td>
      <td valign="top">
      <p>Civil/Electrical</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/mrvc-announces-recruitment-of-34-project-engineers-through-gate-2016-218078" target="_blank">Click here to read more and Apply Online</a></p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>33</p>
      </td>
      <td valign="top">
      <p>National Textile Corporation</p>
      </td>
      <td valign="top">
      <p>July 2016</p>
      </td>
      <td valign="top">
      <p>to be notified</p>
      </td>
      <td valign="top">
      <p>Textile Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>34</p>
      </td>
      <td valign="top">
      <p>Rail Vikas Nigam Ltd</p>
      </td>
      <td valign="top">
      <p>July 2016</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Civil, EE and ECE</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>35</p>
      </td>
      <td valign="top">
      <p>Coal India Ltd</p>
      </td>
      <td valign="top">
      <p>to be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Mechanical, Electrical, Mining and Geology</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>36</p>
      </td>
      <td valign="top">
      <p>BNPM</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Mechanical/ Electrical/ Electronics &amp; Communication and Chemical Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>37</p>
      </td>
      <td valign="top">
      <p>AAI</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>To be notified</p>
      </td>
      <td valign="top">
      <p>Electronics/ Telecommunication/ Electrical Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>38</p>
      </td>
      <td valign="top">
      <p>EdCIL India</p>
      </td>
      <td valign="top">
      <p>To be Notified</p>
      </td>
      <td valign="top">
      <p>To Be Notified</p>
      </td>
      <td valign="top">
      <p>Civil/ Electronics &amp; Communication Engineering</p>
      </td>
      <td valign="top">
      <p>Link will be provided soon</p>
      </td>
    </tr>
    <tr>
      <td valign="top">
      <p>39</p>
      </td>
      <td valign="top">
      <p>NALCO</p>
      </td>
      <td valign="top">
      <p>November 4 to December 3, 2016</p>
      </td>
      <td valign="top">
      <p>55</p>
      </td>
      <td valign="top">
      <p>Mechanical/Electrical/Chemical/Civil</p>
      </td>
      <td valign="top">
      <p><a href="https://engineering.careers360.com/news/nalco-recruit-55-graduate-engineer-trainees-through-gate-2016-218428" target="_blank">Click here to read more and apply online</a></p>
      </td>
    </tr>
  </tbody>
</table>

            </div>
         </div>
       </div>
    </div>
 </div>
</div>





    <!-- here table will be ended -->

   

 





  <?php include('footer.php');?>
  </div>