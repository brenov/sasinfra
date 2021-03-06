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
        <title>Cadastrar tipo de agendamento - SaSINFRA</title>
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
                                    <h4 class="page-title">Cadastrar tipo de agendamento</h4>
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            SaSINFRA
                                        </li>
                                        <li>
                                            Agendamentos
                                        </li>
                                        <li>
                                            Cadastrar tipo de agendamento
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card-box">

                                <div class="form-inline page-box">
                                <!-- LOGIN FORM -->
                                    <form id="cadastro-schedule" action="javascript:registerSchedule()" method="post" autocomplete="off" >
                                    <h5 class="m-t-20 m-b-10 sheading">Dados do Agendamento</h5>
                                    <div class="form-group">
                                        <label class="control-label" for="type">Tipo*</label>
                                        <input type="text" class="form-control input-text" id="type" name="type" placeholder="" maxlength="100" required="required" onKeyUp="typePress()">
                                        <span id="typeValue"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="role">Função*</label>
                                        <input type="text" class="form-control input-text" id="role" name="role" placeholder="" maxlength="100" required="required" onKeyUp="rolePress()">
                                        <span id="roleValue"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="quantity">Quantidade*</label>
                                        <input type="text" class="form-control input-text" id="quantity" name="quantity" placeholder="" maxlength="100" required="required" onKeyUp="quantPress()">
                                        <span id="quantValue"></span>
                                    </div>
                                    <div class="form-button">
                                        <input type="submit" id="submit" class="btn sinfra-btn send m-t-20" value="Cadastrar">
                                        <br/>
                                        <span>Todos os campos marcados com * são obrigatórios!</span>
                                    </div>
                                </form>
                                
                                </div>
                        		</div>
                            </div>
                            <!-- end col -->
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
        <script type="text/javascript" src="assets/js/schedule.sign.js"></script>
        
        <!-- Schedule register -->
        <script type="text/javascript">
            
            // User registration
            function registerSchedule() {
                
                var xhttp = new XMLHttpRequest();
                
                var type     = document.getElementById('type').value;
                var role     = document.getElementById('role').value;
                var quant    = document.getElementById('quantity').value;
                
                xhttp.open('POST', "schedule-registration.php?type=" + type + 
                                    "&role=" + role + 
                                    "&quantity=" + quant, true);
                
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText.match("error:")) {
                            document.getElementById("error").innerHTML = this.responseText.replace("error:","");
                        } else {
                            // Redirect
                            window.location.href = this.responseText;
                        }
                    } else if (this.status == 403 || this.status == 404) {
                        alert("Ocorreu um erro.\nO cadastro não pode ser efetuado.");
                    }
                };
                xhttp.send();
            }
        </script>

    </body>
</html>
