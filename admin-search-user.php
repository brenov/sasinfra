<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App Favicon -->
        <link rel="icon" href="assets/images/icon.png">
        <!-- App title -->
        <title>Buscar usuário - SaSINFRA</title>
        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <?php include 'partials/admin-topbar.php'; ?>
            <?php include 'partials/admin-leftbar.php'; ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <!-- Start container -->
                    <div class="container">
                        <!-- Start row -->
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Buscar usuário</h4>
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            SaSINFRA
                                        </li>
                                        <li>
                                            Usuários
                                        </li>
                                        <li>
                                            Buscar usuário
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">

                            <div class="form-inline search-user">
                                <form role="form">
                                    <input type="radio" id="f_by_name" name="f_parameter" value="name" class="radio" checked> <label>Por nome</label>
                                    <input type="radio" id="f_by_username" name="f_parameter" value="username" class="radio"> <label>Por username</label>
                                    <input type="radio" id="f_by_cpf" name="f_parameter" value="cpf" class="radio"> <label>Por CPF</label>
                                    <input type="text" class="form-control input-text" id="f_searchuser" placeholder="" maxlength="100">
                                    <input type="button" class="btn sinfra-btn send m-t-20" value="Buscar" id="search-user-btn" onclick="searchUser()" >
                                </form>
                            </div>

                            <div class="card-box">
                                <h4 class="header-title m-t-0">Resultados</h4>

                                <table class="table table-bordered table-striped m-b-0" id="table-users">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap" scope="row">Nome</td>
                                            <td class="text-nowrap" scope="row">Usuário</td>
                                            <td class="text-nowrap" scope="row">CPF</td>
                                            <td> <a href="#">Remover</a> </td>
                                            <td> <a href="#">Atualizar dados</a> </td>
                                        </tr>
                                        <!--
                                        <tr>
                                            <th class="text-nowrap" scope="row">User name</th>
                                            <td colspan="1"> <a href="#">Remover</a> </td>
                                            <td colspan="1"> <a href="#">Atualizar dados</a> </td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap" scope="row">User name</th>
                                            <td colspan="1"> <a href="#">Remover</a> </td>
                                            <td colspan="1"> <a href="#">Atualizar dados</a> </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- content -->
            </div>
            <!-- End content-page -->

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <footer class="footer text-right">
               2017 © SaSINFRA.
            </footer>
        </div>
        <!-- END wrapper -->
        
        <script src="assets/js/jquery.min.js"></script>
       
        <script type="text/javascript">
            
            //get the users at a external json file
            var json = (function () {
                var json = null;
                $.ajax({
                    'async': false,
                    'global': false,
                    'url': "./database/users.json",
                    'dataType': "json",
                    'success': function (data) {
                        json = data;
                    }
                });
                return json;
            })();
            
            
            function searchUser() {
                //document.write("TESTEEE");
                var table_content = "";
                var quantity_collumns = 5;
                var i = 0;
                
                // head of the table.
                table_content = "<tr> <td> Nome </td>  <td> Usuário </td> <td> CPF</td><td> Remover </td> <td> Atualizar dados </td> </tr>";
                
                var text_content = document.getElementById("f_searchuser").value;
                
                // get the .json values.
                var object = json;
                
                // search for a specific user.
                if (text_content.length > 0) {                   
                    //document.write(text_content);
                    // Check the kind of search, i.e., if it's by name, username...
                    var searchOption = "";
                    if(document.getElementById("f_by_name").checked) {
                        searchOption = "name";
                    } else if (document.getElementById("f_by_username").checked) {
                        searchOption = "username";
                    } 
                    else {
                        searchOption = "cpf";
                    }
                    
                    //alert(searchOption);
                
                    i = 0;
                    
                    //alert(object.users[0].name);
                    
                    if(searchOption == "name") {
                        table_content += "<tr> ";
                        while (i < object.users.length) {
                            if(object.users[i].name == text_content) {
                                
                                table_content += "<td>"+ object.users[i].name +"</td> ";
                                table_content += "<td>"+ object.users[i].username +"</td> ";
                                table_content += "<td>"+ object.users[i].cpf +"</td> ";
                                table_content += "<td> <a href=\"#\">Remover</a> </td>";
                                table_content += "<td> <a href=\"#\">Atualizar dados</a> </td>";
                                        
                                break;
                            } 
                            
                            i++;
                        }
                
                        table_content += " </tr>";
                        
                    } else if(searchOption == "username") {
                        table_content += "<tr> ";
                        while (i < object.users.length) {
                            if(object.users[i].username == text_content) {
                                
                                table_content += "<td>"+ object.users[i].name +"</td> ";
                                table_content += "<td>"+ object.users[i].username +"</td> ";
                                table_content += "<td>"+ object.users[i].cpf +"</td> ";
                                table_content += "<td> <a href=\"#\">Remover</a> </td>";
                                table_content += "<td> <a href=\"#\">Atualizar dados</a> </td>";
                                        
                                break;
                            } 
                            
                            i++;
                        }
                
                        table_content += " </tr>";
                    } else {
                        table_content += "<tr> ";
                        while (i < object.users.length) {
                            if(object.users[i].cpf == text_content) {
                                
                                table_content += "<td>"+ object.users[i].name +"</td> ";
                                table_content += "<td>"+ object.users[i].username +"</td> ";
                                table_content += "<td>"+ object.users[i].cpf +"</td> ";
                                table_content += "<td> <a href=\"#\">Remover</a> </td>";
                                table_content += "<td> <a href=\"#\">Atualizar dados</a> </td>";
                                        
                                break;
                            } 
                            
                            i++;
                        }
                
                        table_content += " </tr>";
                        
                    }
                    
                    document.getElementById("table-users").innerHTML = table_content;
                    
                } else {
                    // show all users.
                    //console.log(object.users[0].name);
                    //alert(object.users.length);
                    
                    var table_content = "";
                    var quantity_collumns = 5;
                    var i =0;
                    
                    // head of the table.
                    table_content = "<tr> <td> Nome </td>  <td> Usuário </td> <td> CPF</td><td> Remover </td> <td> Atualizar dados </td> </tr>";
                    document.getElementById("table-users").innerHTML = table_content;
                    
                    // Quantity of users in the .json file.
                    while (i < object.users.length) {
                        table_content += "<tr> ";
                        
                        table_content += "<td>"+ object.users[i].name +"</td> ";
                        table_content += "<td>"+ object.users[i].username +"</td> ";
                        table_content += "<td>"+ object.users[i].cpf +"</td> ";
                        table_content += "<td> <a href=\"#\">Remover</a> </td>";
                        table_content += "<td> <a href=\"#\">Atualizar dados</a> </td>";
                        
                        table_content += " </tr>";
                        i++;
                    }
                    
                    document.getElementById("table-users").innerHTML = table_content;
                    
                }
            }
        </script>
    
        
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>

        <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Counter Up  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>
