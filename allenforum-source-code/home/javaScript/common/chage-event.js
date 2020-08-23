/*
File Name : change-events.js
 */
function getDepartmentByCourse(course_detail,purpose) {
    //salert(course_detail);
   var data = course_detail.split('^');
   var course_id = data[0];
  $.ajax({
      url : 'scripts/common/get-course-department-script.php',
      method : 'POST',
      data : {course_id: course_id,purpose:purpose},
      success : function (response) {
         $("#department_branch").html(response);
      }
  });


}



