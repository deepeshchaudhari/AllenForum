$(document).ready(function(){
    $("#addmore").click(function(){
        var numrows=$("#numrows").val();
        numrows=parseInt(numrows) + 1;
        $("#dynamicdiv").append(
            '<tr class="remove">' +
                '<td>' +
                    '<div class="form-group"> ' +
                        '<select name="cvQualification'+numrows+'"  id="cvQualification'+numrows+'" class="form-control" >\n' +
                            '<option value="">Qualification</option>\n' +
                            '<option value="B.Tech">B.Tech</option>\n' +
                            '<option value="BBA">BBA</option>\n' +
                            '<option value="BCA">BCA</option>' +
                            '<option value="High School">High School</option>\n' +
                            '<option value="Intermediat">Intermediat</option>\n' +

                        '</select>' +
                    '</div>' +
                '</td> ' +
                '<td>' +
                    '<div class="form-group">\n' +
                         '<input type="text" name="school_college'+numrows+'" id="school_college'+numrows+'" class="form-control" placeholder="School/College "/>\n' +
                    '</div>\n' +
                '</td>' +
            '<td>' +
                '<div class="form-group">' +
                     '<input type="text" name="cvQualificationPer'+numrows+'" id="cvQualificationPer'+numrows+'" class="form-control" placeholder="Percentage " />' +
                '</div>' +
            '</td>' +
            '<td>' +
                '<div class="form-group">' +
                    ' <select name="cvQualificationBoardUni'+numrows+'"  id="cvQualificationBoardUni'+numrows+'" class="form-control"  >\n' +
                        ' <option value="">Board/University</option>\n' +
                        ' <option value="ATKU">AKTU</option>\n' +
                        ' <option value="UP Board">UP Board</option>\n' +
                        ' <option value="UP Board">CBSE Board</option>\n' +
                    ' </select>' +
                '</div>' +
            '</td>' +
            '</tr>');
        $("#numrows").val(numrows);
        $("#lessmore").show();
    });

    $("#lessmore").click(function(){
        var numrows=$("#numrows").val();
        if(numrows==2)
            $("#lessmore").hide();
        numrows=parseInt(numrows) - 1;
        $("#numrows").val(numrows);
        $('#dynamicdiv .remove:last').remove();
    });
});




$(document).ready(function(){
    $("#addmore1").click(function(){
        var numrows=$("#numrows1").val();
        numrows=parseInt(numrows) + 1;
        $("#dynamicdiv1").append(
            ' <tr class="remove1">\n' +
                ' <td width="20%">\n' +
                    ' <div class="form-group">\n' +
                        '<select name="traningTechTitle'+numrows+'"  id="traningTechTitle'+numrows+'" class="form-control" >\n' +
                            '<option value="">Title</option>\n' +
                            '<option value="Languages">Languages</option>\n' +
                            '<option value="Web Technologies">Web Technologies</option>\n' +
                            '<option value="Database">Database</option>\n' +
                            '<option value="Framework">Framework</option>\n' +
                            '<option value="Graphics Tools">Graphics Tools</option>\n' +
                            '<option value="Packages">Packages</option>\n' +
                            '<option value="Operating System">Operating System</option>\n' +
                        ' </select>\n' +
                    ' </div>\n' +
                '</td>\n' +
            '<td>\n' +
                '<div class="form-group">\n' +
                     '<input type="text" name="traningTechSkill'+numrows+'"  id="traningTechSkill'+numrows+'" class="form-control" placeholder="Skill1,Skill2 " />\n' +
                '</div>\n' +
            '</td>\n' +
            ' </tr>');
        $("#numrows1").val(numrows);
        $("#lessmore1").show();
    });

    $("#lessmore1").click(function(){
        var numrows=$("#numrows1").val();
        if(numrows==2)
            $("#lessmore1").hide();
        numrows=parseInt(numrows) - 1;
        $("#numrows1").val(numrows);
        $('#dynamicdiv1 .remove1:last').remove();
    });
});



$(document).ready(function(){
    $("#addmore2").click(function(){
        var numrows=$("#numrows2").val();
        numrows=parseInt(numrows) + 1;
        $("#dynamicdiv2").append(' <tr class="remove2">\n' +
            '<td>\n' +
                ' <div class="form-group">\n' +
                      '<input type="text" name="extraCarricular'+numrows+'" id="extraCarricular'+numrows+'" class="form-control" placeholder="Extra Carricular Activities " />\n' +
                '</div>\n' +
            '</td>\n' +
            '</tr>');
        $("#numrows2").val(numrows);
        $("#lessmore2").show();
    });

    $("#lessmore2").click(function(){
        var numrows=$("#numrows2").val();
        if(numrows==2)
            $("#lessmore2").hide();
        numrows=parseInt(numrows) - 1;
        $("#numrows2").val(numrows);
        $('#dynamicdiv2 .remove2:last').remove();
    });
});


$(document).ready(function(){
    $("#addmore3").click(function(){
        var numrows=$("#numrows3").val();
        numrows=parseInt(numrows) + 1;
        $("#dynamicdiv3").append(
            '<tr class="remove3">\n' +
                ' <td>\n' +
                     '<input type="text" name="academicProj'+numrows+'" id="academicProj'+numrows+'" class="form-control" placeholder="Project Titlte" />\n' +
                '</td>\n' +
            '<td>\n' +
            '   <div class="form-group">\n' +
            '    <textarea name="academicProjDes'+numrows+'" id="academicProjDes'+numrows+'" class="form-control" placeholder="Project Description "></textarea>\n' +
            '   </div>\n' +
            '</td>\n' +
            '  </tr>');
        $("#numrows3").val(numrows);
        $("#lessmore3").show();
    });

    $("#lessmore3").click(function(){
        var numrows=$("#numrows3").val();
        if(numrows==2)
            $("#lessmore3").hide();
        numrows=parseInt(numrows) - 1;
        $("#numrows3").val(numrows);
        $('#dynamicdiv3 .remove3:last').remove();
    });
});