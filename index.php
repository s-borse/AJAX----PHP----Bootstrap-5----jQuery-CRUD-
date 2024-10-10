<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>CRUD Operations</title>
</head>

<body>

    <div class="container mt-5">
        <h1 class="alert-info text-center mb-5 p-3"> AJAX -- PHP -- Bootstrap 5 -- jQuery (CRUD) </h1>
        <div class="row">
            <form class="col-sm-5" id="myform">
                <h3>Add/Update Student</h3>
                <input type="hidden" name="name" id="name" >
                <div>
                    <div>
                        <label for="nameid" class="form-label">Name</label>
                        <input type="text" name="" class="form-control" id="nameid" >
                    </div>
                    <div>
                        <label for="emailid" class="form-label">Email</label>
                        <input type="email" name="" class="form-control" id="emailid" >
                    </div>
                    <label for="passwordid" class="form-label">Password</label>
                    <input type="password" name="" class="form-control" id="passwordid" >
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary update" id="btnadd" >Save</button>
                </div>
                <div id="msg"></div>
            </form>

            <div class="col-sm-7 text-center">
                <h3 class="alert-warning p-2">Show Student Information</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>



        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Ajax Request for Insert Data
        $(document).ready(function () {

            function showdata() {
                $.ajax({
                    url: "retriewe.php",
                    method: "GET",
                    success: function (data) {
                        let student = JSON.parse(data);
                        let rows = '';
                        student.forEach((student) => {

                            rows += `<tr>
                        
                                <td>${student.id}</td>
                                <td>${student.name}</td>
                                <td>${student.email}</td>
                                <td>${student.password}</td>
                                <td>
                                    <button class="btn btn-success btn-sm edit" data-id="${student.id}">Edit</button>
                                    <button class="btn btn-danger btn-sm delete" data-id="${student.id}">Delete</button>
                                </td>
                            </tr>`;

                        });
                        $('tbody').html(rows);

                    },
                });
            }
            showdata();

            $('#btnadd').click(function (e) {
                e.preventDefault();
                console.log("Save Button Clicked");

                let nm = $("#nameid").val();
                let id = $("#name").val();
                let em = $("#emailid").val();
                let pw = $("#passwordid").val();
               
               if (!id) {
                
                   $.ajax({
                       url: "insert.php",
                       method: "POST",
                       data: { name: nm, email: em, password: pw },
                       success: function (Alldata) {
                           // console.log(data);
                           $("#msg").html(`<div class="alert alert-success">${Alldata}</div>`);
                           $("#myform")[0].reset();
                           showdata();
                       },
                   })
               }else{
                $.ajax({
                       url: "update.php",
                       method: "POST",
                       data: {id: id, name: nm, email: em, password: pw },
                       success: function (Alldata) {
                           // console.log(data);
                           $("#msg").html(`<div class="alert alert-success">${Alldata}</div>`);
                           $("#myform")[0].reset();
                           showdata();
                       },
                   })
               }
            });

            $('#tbody').on('click', '.delete', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: { id: id },
                    success: function (data) {
                        $("#msg").html(`<div class="alert alert-success">${data}</div>`);
                        showdata();
                    }
                })
            })

            $('#tbody').on('click', '.edit', function () {
                // console.log("asdf");

                let id = $(this).data('id');
                console.log(id);

                $.ajax({
                    url: "edit.php",
                    method: "GET",
                    data: { id: id },
                    success: function (data) {
                        let student = JSON.parse(data);
                        console.log(student[0].id);

                        $("#name").val(student[0].id);
                        $("#nameid").val(student[0].name);
                        $("#emailid").val(student[0].email);
                        $("#passwordid").val(student[0].password);

                    }
                });
            });

           

        });

    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    
</body>

</html>