<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student List</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.dataTables.css' ?>">
    </head>
    <body>
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <h1 class="page-header">Student Data
                     <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Add Student</a>
                    
                    </div>
                </h1>  
                <div style='margin:10px;'>
                    <label>Choose Class Name:</label>
                    <select class="" id="class_name_select">
                        <option value='ALL'>Select Class Names</option>
                        
                    </select>
                   
               </div>
                
            </div>
            <div class="row">
                <div id="reload">
                    <table class="table table-striped" id="mydata">
                        <thead>
                            <tr>
                                <th>Student name</th>
                                <th>Class Name</th>
                                <th>Section</th>
                                <th>AdmissionNo</th>
                                <th>RollNo</th>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>DOB</th>
                                <th>MobileNo</th>
                                <th style="text-align: right;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Add Student</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Student Name</label>
                                <div class="col-xs-9">
                                    <input name="studentName" id="studentName_add" class="form-control" type="text" placeholder="Student Name" style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Class Name</label>
                                <div class="col-xs-9">
                                    <input name="className" id="className_add" class="form-control" type="text" placeholder="Class Name" style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Section</label>
                                <div class="col-xs-9">
                                    <input name="section" id="section_add" class="form-control" type="text" placeholder="Section" style="width:335px;" required>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Admission No</label>
                                <div class="col-xs-9">
                                    <input name="admissionNo" id="admissionNo_add" class="form-control" type="text" placeholder="Admission No" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Roll No</label>
                                <div class="col-xs-9">
                                    <input name="rollNo" id="rollNo_add" class="form-control" type="text" placeholder="Roll No" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Father's Name</label>
                                <div class="col-xs-9">
                                    <input name="fatherName" id="fatherName_add" class="form-control" type="text" placeholder="Father's Name" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Mother's Name</label>
                                <div class="col-xs-9">
                                    <input name="motherName" id="motherName_add" class="form-control" type="text" placeholder="Mother's Name" style="width:335px;" required>
                                </div>
                            </div>
                            
                            
                             <div class="form-group">
                                <label class="control-label col-xs-3" >DOB</label>
                                <div class="col-xs-9">
                                    <input name="dob" id="dob_add" class="form-control" type="date" placeholder="DOB" style="width:335px;" required>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Mobile No</label>
                                <div class="col-xs-9">
                                    <input name="mobileNo" id="mobileNo_add" class="form-control" type="text" placeholder="Mobile No" style="width:335px;" required>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button class="btn btn-info" id="btn_add">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Student</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Student Id</label>
                                <div class="col-xs-9">
                                    <input name="StudentId" id="StudentId" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Student Name</label>
                                <div class="col-xs-9">
                                    <input name="StudentName" id="StudentName" class="form-control" type="text" placeholder="Nama" style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Class Name</label>
                                <div class="col-xs-9">
                                    <input name="ClassName" id="ClassName" class="form-control" type="text" placeholder="Class Name" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Section</label>
                                <div class="col-xs-9">
                                    <input name="Section" id="Section" class="form-control" type="text" placeholder="Section" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Admission No</label>
                                <div class="col-xs-9">
                                    <input name="AdmissionNo" id="AdmissionNo" class="form-control" type="text" placeholder="Admission" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Roll No</label>
                                <div class="col-xs-9">
                                    <input name="RollNo" id="RollNo" class="form-control" type="text" placeholder="Roll No" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Father's Name</label>
                                <div class="col-xs-9">
                                    <input name="FathersName" id="FathersName" class="form-control" type="text" placeholder="Father name" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Mother's name</label>
                                <div class="col-xs-9">
                                    <input name="MothersName" id="MothersName" class="form-control" type="text" placeholder="Mother Name" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Dob</label>
                                <div class="col-xs-9">
                                    <input name="Dob" id="Dob" class="form-control" type="date" placeholder="DOB" style="width:335px;" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-xs-3" >Mobile No</label>
                                <div class="col-xs-9">
                                    <input name="MobileNo" id="MobileNo" class="form-control" type="text" placeholder="Mobile No" style="width:335px;" required>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button class="btn btn-info" id="btn_update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Student Record</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">

                            <input type="hidden" name="student_id" id="textkode" value="">
                            <div class="alert alert-warning"><p>Are You Sure, You Wants To Delete The Record ?</p></div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button class="btn_hapus btn btn-danger" id="btn_delete">Confirm & Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
        
        <!--MODAL SHOW CLASS DETAILS-->
        <div class="modal fade" id="ModalShowClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Show Class Details</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <table class='table table-striped table-responsive table-bordered'>
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>No Of Students</th>
                                    </tr>
                                </thead>
                                <input type='hidden' id='cls_name' val=''>
                                <tbody id='tblData'>
                                   
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODA-->

        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.js' ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                table_data_student();	//pemanggilan fungsi tampil barang.

                $('#mydata').dataTable();

                //fungsi tampil barang
                function table_data_student() {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>student/student_data',
                        async: true,
                        dataType: 'json',
                        success: function (data) {
                            var html = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<tr>' +
                                        '<td>' + data[i].StudentName + '</td>' +
                                        '<td><a href="javascript:;" class="btn btn-info btn-xs show_class" data="'+data[i].ClassName+'">' + data[i].ClassName + '</a></td>' +
                                        '<td>' + data[i].Section + '</td>' +
                                        '<td>' + data[i].AdmissionNo + '</td>' +
                                        '<td>' + data[i].RollNo + '</td>' +
                                        '<td>' + data[i].FathersName + '</td>' +
                                        '<td>' + data[i].MothersName + '</td>' +
                                        '<td>' + data[i].Dob + '</td>' +
                                        '<td>' + data[i].MobileNo + '</td>' +
                                        '<td style="text-align:right;">' +
                                        '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].StudentId + '">Edit</a>' + ' ' +
                                        '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].StudentId + '">Delete</a>' +
                                        '</td>' +
                                        '</tr>';
                            }
                            $('#show_data').html(html);
                        }

                    });
                    
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>student/get_classes',
                        async: true,
                        dataType: 'json',
                       
                        success: function (data) {
                            var html = '';
                            var i;
                            html = "<option value='ALL'>Select Class Name</option>";
                            for (i = 0; i < data.length; i++) {
                                html += '<option value="'+ data[i].ClassName +'">' + data[i].ClassName + '</option>';
                            }
                            $('#class_name_select').html(html);
                        }

                    });
                    
                    
                }

                //GET UPDATE
                $('#show_data').on('click', '.item_edit', function () {
                    var id = $(this).attr('data');
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('student/get_student') ?>",
                        dataType: "JSON",
                        data: {id: id},
                        success: function (data) {
                            $.each(data, function (StudentId, StudenName, ClassName,Section,AdmissionNo,RollNo,FathersName,MothersName,Dob,MobileNo) {
                                $('#ModalaEdit').modal('show');
                                $('[name="StudentId"]').val(data.StudentId);
                                $('[name="StudentName"]').val(data.StudentName);
                                $('[name="ClassName"]').val(data.ClassName);
                                $('[name="Section"]').val(data.Section);
                                $('[name="AdmissionNo"]').val(data.AdmissionNo);
                                $('[name="RollNo"]').val(data.RollNo);
                                $('[name="FathersName"]').val(data.FathersName);
                                $('[name="MothersName"]').val(data.MothersName);
                                $('[name="Dob"]').val(data.Dob);
                                $('[name="MobileNo"]').val(data.MobileNo);
                         
                            });
                        }
                    });
                    return false;
                });


                //delete popup
                $('#show_data').on('click', '.item_hapus', function () {
                    var id = $(this).attr('data');
                    $('#ModalDelete').modal('show');
                    $('[name="student_id"]').val(id);
                });

                //Add Student
                $('#btn_add').on('click', function () {
                    var StudentName = $('#studentName_add').val();
                    var ClassName = $('#className_add').val();
                    var Section = $('#section_add').val();
                    var AdmissionNo = $('#admissionNo_add').val();
                    var RollNo = $('#rollNo_add').val();
                    var FathersName = $('#fatherName_add').val();
                    var MothersName = $('#motherName_add').val();
                    var Dob = $('#dob_add').val();
                    var MobileNo = $('#mobileNo_add').val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('student/create_student') ?>",
                        dataType: "JSON",
                        data: {StudentName: StudentName, ClassName: ClassName,Section:Section,AdmissionNo:AdmissionNo,RollNo:RollNo,FathersName:FathersName,MothersName:MothersName,Dob:Dob,MobileNo:MobileNo},
                        success: function (data) {
                            $('#StudentName_add').val("");
                            $('#ClassName_add').val("");
                            $('#Section_add').val("");
                            $('#AdmissionNo_add').val("");
                            $('#RollNo_add').val("");
                            $('#FathersName_add').val("");
                            $('#MothersName_add').val("");
                            $('#Dob_add').val("");
                            $('#MobileNo_add').val("");
                            $('#ModalaAdd').modal('hide');
                            table_data_student();
                        }
                    });
                    return false;
                });

                //Update Student
                $('#btn_update').on('click', function () {
                    var StudentId = $('#StudentId').val();
                    var StudentName = $('#StudentName').val();
                    var ClassName = $('#ClassName').val();
                    var Section = $('#Section').val();
                    var AdmissionNo = $('#AdmissionNo').val();
                    var RollNo = $('#RollNo').val();
                    var FathersName = $('#FathersName').val();
                    var MothersName = $('#MothersName').val();
                    var Dob = $('#Dob').val();
                    var MobileNo = $('#MobileNo').val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('student/update_student') ?>",
                        dataType: "JSON",
                        data: {StudentId: StudentId, StudentName: StudentName, ClassName: ClassName,Section:Section,AdmissionNo:AdmissionNo,RollNo:RollNo,FathersName:FathersName,MothersName:MothersName,Dob:Dob,MobileNo:MobileNo},
                        success: function (data) {
                            $('#StudentId').val("");
                            $('#StudentName').val("");
                            $('#ClassName').val("");
                            $('#Section').val("");
                            $('#AdmissionNo').val("");
                            $('#RollNo').val("");
                            $('#FathersName').val("");
                            $('#MothersName').val("");
                            $('#Dob').val("");
                            $('#MobileNo').val("");
                            $('#ModalaEdit').modal('hide');
                            table_data_student();
                        }
                    });
                    return false;
                });

                //Delete Student
                $('#btn_delete').on('click', function () {
                    var student_id = $('#textkode').val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('student/delete_student') ?>",
                        dataType: "JSON",
                        data: {student_id: student_id},
                        success: function (data) {
                            $('#ModalDelete').modal('hide');
                            table_data_student();
                        }
                    });
                    return false;
                });
                
                
                ////show class
                
                $('#show_data').on('click', '.show_class', function () {
                    var classname = $(this).attr('data');
                    $('#ModalShowClass').modal('show');
                    $('#cls_name').val(classname);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('student/show_class') ?>",
                        dataType: "JSON",
                        data: {classname:$('#cls_name').val()},
                        success: function (data) {
                            
                            $('#tblData').html('<tr><td>'+data.ClassName+'</td><td>'+data.total+'</td></tr>');
                        }
                    });
                    return false;
                });
                
                 $('#class_name_select').on('change', function () {
                   $classname = $('#class_name_select').val();
                   
                   $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>student/get_student_data_by_className',
                        async: true,
                        dataType: 'json',
                        data: {classname:$classname},
                        success: function (data) {
                            var html = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<tr>' +
                                        '<td>' + data[i].StudentName + '</td>' +
                                        '<td><a href="javascript:;" class="btn btn-info btn-xs show_class" data="'+data[i].ClassName+'">' + data[i].ClassName + '</a></td>' +
                                        '<td>' + data[i].Section + '</td>' +
                                        '<td>' + data[i].AdmissionNo + '</td>' +
                                        '<td>' + data[i].RollNo + '</td>' +
                                        '<td>' + data[i].FathersName + '</td>' +
                                        '<td>' + data[i].MothersName + '</td>' +
                                        '<td>' + data[i].Dob + '</td>' +
                                        '<td>' + data[i].MobileNo + '</td>' +
                                        '<td style="text-align:right;">' +
                                        '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].StudentId + '">Edit</a>' + ' ' +
                                        '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].StudentId + '">Delete</a>' +
                                        '</td>' +
                                        '</tr>';
                            }
                            $('#show_data').html(html);
                        }

                    });
                    
                });
                    
                    
               

            });

        </script>
    </body>
</html>

