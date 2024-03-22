<?php
header("Content-Type: text/html;charset=utf-8");
include('modelos/clasedb.php');
extract($_REQUEST);// PARA CAPTURAR LA VAriable operacion.
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> FESNASOL SISTEMA WEB</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
	
	<!-- DATA TABLES -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
	<link rel="stylesheet" type="text/css" href="css/datatables.css">
	<script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>

	<script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
	<script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
</head>
<body>

	<div class="container">
		<!--aside section start-->
		<aside>

			<div class="top">
				<div class="logo">
					<h2> FES <span class="danger">NASOL</span></h2>
				</div>
				<div class="close" id="close_btn">
					<span class="material-symbols-sharp">
						close
					</span>
				</div>
			</div>
			<!--end top-->

			<div class="sidebar">
				<a href="vistas/festivales.php">
					<span class="material-symbols-sharp">celebration</span>
					<h3>Festivales</h3>
				</a>
				<a href="vistas/grupos.php" >
					<span class="material-symbols-sharp">groups</span>
					<h3>Grupos</h3>
				</a>
				<a href="vistas/participantes.php">
					<span class="material-symbols-sharp">group</span>
					<h3>Participantes</h3>
				</a>

				<a href="vistas/control_viaje.php">
					<span class="material-symbols-sharp">airplane_ticket</span>
					<h3>Control de viaje</h3>
				</a>
				<!--a href="#">
					<span class="material-symbols-sharp">mail_outline</span>
					<h3>Messages</h3>
					<span class="msg_count">14</span>
				</a-->
				<a href="vistas/ajustes.php">
					<span class="material-symbols-sharp">database</span>
					<h3>Importar / Exportar BD</h3>
				</a>
				<a href="vistas/ajustes.php">
					<span class="material-symbols-sharp">Device_Reset</span>
					<h3>Restaurar BD</h3>
				</a>
				<!--a href="#">
					<span class="material-symbols-sharp">settings</span>
					<h3>setting</h3>
				</a>
				<a href="#">
					<span class="material-symbols-sharp">add</span>
					<h3>Add product</h3>
				</a-->
				<a href="#">
					<span class="material-symbols-sharp">logout</span>
					<h3>Logout</h3>
				</a>

			</div>

		</aside>
		<!--aside section end-->

		<!--main section start-->
		<main>
			<h1>Panel De Control</h1>

			<div class="date">
				<?php
                $fechaActual = new DateTime();
                echo $fechaActual->format('d-m-Y');
                ?>
			</div>

			<!-- start insights -->
			<div class="insights">
				
				<!-- start selling -->
				<div class="sales">

					<span class="material-symbols-sharp">celebration</span>
					<div class="middle">
						<div class="left">
							<h3> Festivales</h3>
							<h1>2</h1>
						</div>
					</div>
					<small>Cantidad total de festivales</small>

					<div class="add" class="btn" onclick="openPopup()">
						<span class="material-symbols-sharp">add</span>
						<small>Registrar Festival</small>
					</div>
					
				</div>
				<!-- end selling -->



				<!-- start expenses -->
				<div class="expenses">
					<span class="material-symbols-sharp">groups</span>
					<div class="middle">
						<div class="left">
							<h3> Grupos</h3>
							<h1> 350 </h1>
						</div>
					</div>
					<small>Cantidad total de grupos</small>


					<div class="add" class="btn" onclick="openPopup2()">
						<span class="material-symbols-sharp">group_add</span>
						<small>Registrar Grupo</small>
					</div>
				</div>
				<!-- end expenses -->


				<!-- start Income -->
				<div class="income">
					<span class="material-symbols-sharp">group</span>
					<div class="middle">
						<div class="left">
							<h3> Participantes</h3>
							<h1>253</h1>
						</div>
					</div>
					<small>Cantidad total de participantes</small>


					<div class="add" class="btn" onclick="openPopup3()">
						<span class="material-symbols-sharp">person_add</span>
						<small>Registrar Participante</small>
					</div>
				</div>
				<!-- end Income -->

			</div>
			<!-- end insights -->


			<!-- start recent order -->
			<div class="recent_order">
				<!-- <h1>Participación total</h1> -->

                <!--NAV TABS-->
                    <input type="radio" checked name="slider" id="home">
                    <input type="radio" name="slider" id="blog">
                    <input type="radio" name="slider" id="code">
                    <input type="radio" name="slider" id="help">
                   <!--  <input type="radio" name="slider" id="about"> -->
        

                    <nav class="nav-tabs">
                        <label for="home" class="home"> Participantes </label>
                        <label for="blog" class="blog"> Grupos   </label>
                        <label for="code" class="code"> Staff </label>
                        <label for="help" class="help"> festivales </label>
                        <!-- <label for="about" class="about"> About </label> -->

                        <div class="slider"></div>


                    </nav>
                    <section class="nav-tab-container">
                        <div class="content content-1">
                            <div class="title">Personas que participan en un festival</div>
                            <table id="example" class="table table-striped" style="width:100%">
                    <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008-11-28</td>
                <td>$162,700</td>
            </tr>
           
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011-03-21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009-02-27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010-07-14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008-11-13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011-06-27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011-01-25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
                        </div>

                        <div class="content content-2">
                            <div class="title">Grupos participantes en un festival</div>
                            <table class="table table-striped" style="width: 100%" id="example2">

                    <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011-03-21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009-02-27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010-07-14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008-11-13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011-06-27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011-01-25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>

                </table> 
                        </div>

                        <div class="content content-3">
                            <div class="title">Staff equipo de trabajo y de grupos</div>
                            <table class="table table-striped" style="width: 100%" id="example3">

                    <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011-03-21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009-02-27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010-07-14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008-11-13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011-06-27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011-01-25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>

                </table> 
                        </div>

                        <div class="content content-4">
                            <div class="title">Festivales</div>
                             <table class="table table-striped" style="width: 100%" id="example4">

                    <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011-03-21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009-02-27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010-07-14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008-11-13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011-06-27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011-01-25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>

                </table> 
                        </div>

                        <div class="content content-5">
                            <div class="title">Home</div>
                            <p>THIS IS HOME 5</p>
                        </div>
                    </section>
                <!--//NAV TABS-->
				
			</div>
			<!-- end recent order -->


			<!-- MODAL -->
			<div id="container_popup" class="container_popup">
				<div class="popup" id="popup">
					<span class="material-symbols-sharp">celebration</span>
					<h3> Registra un festival</h3>
					<form method="post" autocomplete="off" action="controladores/controlador_registro.php">
						<div class="form-group">
							<div class="form-content">
								<label for="pais"> Pais </label>
									<select name="pais" id="pais">
										<option value="Afganistán">Afganistán</option>
										<option value="Albania">Albania</option>
										<option value="Alemania">Alemania</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Antigua y Barbuda">Antigua y Barbuda</option>
										<option value="Arabia Saudita">Arabia Saudita</option>
										<option value="Argelia">Argelia</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaiyán">Azerbaiyán</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bangladés">Bangladés</option>
										<option value="Barbados">Barbados</option>
										<option value="Baréin">Baréin</option>
										<option value="Bélgica">Bélgica</option>
										<option value="Belice">Belice</option>
										<option value="Benín">Benín</option>
										<option value="Bielorrusia">Bielorrusia</option>
										<option value="Birmania/Myanmar">Birmania/Myanmar</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
										<option value="Botsuana">Botsuana</option>
										<option value="Brasil">Brasil</option>
										<option value="Brunéi">Brunéi</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Bután">Bután</option>
										<option value="Cabo Verde">Cabo Verde</option>
										<option value="Camboya">Camboya</option>
										<option value="Camerún">Camerún</option>
										<option value="Canadá">Canadá</option>
										<option value="Catar">Catar</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Chipre">Chipre</option>
										<option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoras">Comoras</option>
										<option value="Corea del Norte">Corea del Norte</option>
										<option value="Corea del Sur">Corea del Sur</option>
										<option value="Costa de Marfil">Costa de Marfil</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Croacia">Croacia</option>
										<option value="Cuba">Cuba</option>
										<option value="Dinamarca">Dinamarca</option>
										<option value="Dominica">Dominica</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egipto">Egipto</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Eslovaquia">Eslovaquia</option>
										<option value="Eslovenia">Eslovenia</option>
										<option value="España">España</option>
										<option value="Estados Unidos">Estados Unidos</option>
										<option value="Estonia">Estonia</option>
										<option value="Etiopía">Etiopía</option>
										<option value="Filipinas">Filipinas</option>
										<option value="Finlandia">Finlandia</option>
										<option value="Fiyi">Fiyi</option>
										<option value="Francia">Francia</option>
										<option value="Gabón">Gabón</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Ghana">Ghana</option>
										<option value="Granada">Granada</option>
										<option value="Grecia">Grecia</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guyana">Guyana</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea ecuatorial">Guinea ecuatorial</option>
										<option value="Guinea-Bisáu">Guinea-Bisáu</option>
										<option value="Haití">Haití</option>
										<option value="Honduras">Honduras</option>
										<option value="Hungría">Hungría</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Irak">Irak</option>
										<option value="Irán">Irán</option>
										<option value="Irlanda">Irlanda</option>
										<option value="Islandia">Islandia</option>
										<option value="Islas Marshall">Islas Marshall</option>
										<option value="Islas Salomón">Islas Salomón</option>
										<option value="Israel">Israel</option>
										<option value="Italia">Italia</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japón">Japón</option>
										<option value="Jordania">Jordania</option>
										<option value="Kazajistán">Kazajistán</option>
										<option value="Kenia">Kenia</option>
										<option value="Kirguistán">Kirguistán</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Laos">Laos</option>
										<option value="Lesoto">Lesoto</option>
										<option value="Letonia">Letonia</option>
										<option value="Líbano">Líbano</option>
										<option value="Liberia">Liberia</option>
										<option value="Libia">Libia</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lituania">Lituania</option>
										<option value="Luxemburgo">Luxemburgo</option>
										<option value="Macedonia del Norte">Macedonia del Norte</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malasia">Malasia</option>
										<option value="Malaui">Malaui</option>
										<option value="Maldivas">Maldivas</option>
										<option value="Malí">Malí</option>
										<option value="Malta">Malta</option>
										<option value="Marruecos">Marruecos</option>
										<option value="Mauricio">Mauricio</option>
										<option value="Mauritania">Mauritania</option>
										<option value="México">México</option>
										<option value="Micronesia">Micronesia</option>
										<option value="Moldavia">Moldavia</option>
										<option value="Mónaco">Mónaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Níger">Níger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Noruega">Noruega</option>
										<option value="Nueva Zelanda">Nueva Zelanda</option>
										<option value="Omán">Omán</option>
										<option value="Países Bajos">Países Bajos</option>
										<option value="Pakistán">Pakistán</option>
										<option value="Palaos">Palaos</option>
										<option value="Panamá">Panamá</option>
										<option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Perú">Perú</option>
										<option value="Polonia">Polonia</option>
										<option value="Portugal">Portugal</option>
										<option value="Reino Unido">Reino Unido</option>
										<option value="República Centroafricana">República Centroafricana</option>
										<option value="República Checa">República Checa</option>
										<option value="República del Congo">República del Congo</option>
										<option value="República Democrática del Congo">República Democrática del Congo</option>
										<option value="República Dominicana">República Dominicana</option>
										<option value="República Sudafricana">República Sudafricana</option>
										<option value="Ruanda">Ruanda</option>
										<option value="Rumanía">Rumanía</option>
										<option value="Rusia">Rusia</option>
										<option value="Samoa">Samoa</option>
										<option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
										<option value="San Marino">San Marino</option>
										<option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
										<option value="Santa Lucía">Santa Lucía</option>
										<option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
										<option value="Senegal">Senegal</option>
										<option value="Serbia">Serbia</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leona">Sierra Leona</option>
										<option value="Singapur">Singapur</option>
										<option value="Siria">Siria</option>
										<option value="Somalia">Somalia</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Suazilandia">Suazilandia</option>
										<option value="Sudán">Sudán</option>
										<option value="Sudán del Sur">Sudán del Sur</option>
										<option value="Suecia">Suecia</option>
										<option value="Suiza">Suiza</option>
										<option value="Surinam">Surinam</option>
										<option value="Tailandia">Tailandia</option>
										<option value="Tanzania">Tanzania</option>
										<option value="Tayikistán">Tayikistán</option>
										<option value="Timor Oriental">Timor Oriental</option>
										<option value="Togo">Togo</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad y Tobago">Trinidad y Tobago</option>
										<option value="Túnez">Túnez</option>
										<option value="Turkmenistán">Turkmenistán</option>
										<option value="Turquía">Turquía</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Ucrania">Ucrania</option>
										<option value="Uganda">Uganda</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistán">Uzbekistán</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Vietnam">Vietnam</option>
										<option value="Yemen">Yemen</option>
										<option value="Yibuti">Yibuti</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabue">Zimbabue</option>
									</select>
							</div>
							<div class="form-content">
								<label for="estado"> Nombre </label>
								<input type="text" name="nombre" id="estado">
							</div>
						</div>
						<div class="form-group">
							<div class="form-content">
								<label for="date_1"> Fecha Inicial </label>
								<input type="date" name="fecha_inicial" id="date_1">
							</div>
					
							<div class="form-content">
								<label for="date_2"> Fecha Final </label>
								<input type="date" name="fecha_final" id="date_2">
							</div>
						</div>

                        <input type="hidden" name="operacion" value="festival">

						<button class="btn_register"> Enviar </button>
					</form>
					<button onclick="closePopup()" type="button">Ok</button>
				</div>
			</div>	
			<!-- MODAL -->


			<!-- MODAL 2 -->
              <?php 

          $db=new clasedb();
          $conex=$db->conectar();
        ////cargando los codigos de control de sms
          $sql="SELECT
  *
FROM
  fesnasol.festivales
"; 
        $res=mysqli_query($conex,$sql);
        $campos_fa=mysqli_num_fields($res);
        $filas_fa=mysqli_num_rows($res);
        $facturas[]=array();
        $i=0; 

      while ($disponible=mysqli_fetch_array($res)) {
            for ($j=0; $j < $campos_fa; $j++) { 
            $facturas[$i][$j]=$disponible[$j];
          }
          $i++;
  
        }

        ////fin de la carga

                       ?>
			<div id="container_popup2" class="container_popup">
				<div class="popup" id="popup2">
					<span class="material-symbols-sharp">groups</span>
					<h2> Registrar grupo </h2>
					
					<form method="post" autocomplete="off" action="controladores/controlador_registro.php">

                        <div class="form-group">
                            <div class="form-content">
                                <label for="nombre"> Nombre</label>
                                <input type="text" name="nombre" id="nombre">
                            </div>
                        </div>

						<div class="form-group">
							<div class="form-content">
								<label for="pais"> Pais </label>
									<select name="pais" id="pais">
										<option value="Afganistán">Afganistán</option>
										<option value="Albania">Albania</option>
										<option value="Alemania">Alemania</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Antigua y Barbuda">Antigua y Barbuda</option>
										<option value="Arabia Saudita">Arabia Saudita</option>
										<option value="Argelia">Argelia</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaiyán">Azerbaiyán</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bangladés">Bangladés</option>
										<option value="Barbados">Barbados</option>
										<option value="Baréin">Baréin</option>
										<option value="Bélgica">Bélgica</option>
										<option value="Belice">Belice</option>
										<option value="Benín">Benín</option>
										<option value="Bielorrusia">Bielorrusia</option>
										<option value="Birmania/Myanmar">Birmania/Myanmar</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
										<option value="Botsuana">Botsuana</option>
										<option value="Brasil">Brasil</option>
										<option value="Brunéi">Brunéi</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Bután">Bután</option>
										<option value="Cabo Verde">Cabo Verde</option>
										<option value="Camboya">Camboya</option>
										<option value="Camerún">Camerún</option>
										<option value="Canadá">Canadá</option>
										<option value="Catar">Catar</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Chipre">Chipre</option>
										<option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoras">Comoras</option>
										<option value="Corea del Norte">Corea del Norte</option>
										<option value="Corea del Sur">Corea del Sur</option>
										<option value="Costa de Marfil">Costa de Marfil</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Croacia">Croacia</option>
										<option value="Cuba">Cuba</option>
										<option value="Dinamarca">Dinamarca</option>
										<option value="Dominica">Dominica</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egipto">Egipto</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Eslovaquia">Eslovaquia</option>
										<option value="Eslovenia">Eslovenia</option>
										<option value="España">España</option>
										<option value="Estados Unidos">Estados Unidos</option>
										<option value="Estonia">Estonia</option>
										<option value="Etiopía">Etiopía</option>
										<option value="Filipinas">Filipinas</option>
										<option value="Finlandia">Finlandia</option>
										<option value="Fiyi">Fiyi</option>
										<option value="Francia">Francia</option>
										<option value="Gabón">Gabón</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Ghana">Ghana</option>
										<option value="Granada">Granada</option>
										<option value="Grecia">Grecia</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guyana">Guyana</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea ecuatorial">Guinea ecuatorial</option>
										<option value="Guinea-Bisáu">Guinea-Bisáu</option>
										<option value="Haití">Haití</option>
										<option value="Honduras">Honduras</option>
										<option value="Hungría">Hungría</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Irak">Irak</option>
										<option value="Irán">Irán</option>
										<option value="Irlanda">Irlanda</option>
										<option value="Islandia">Islandia</option>
										<option value="Islas Marshall">Islas Marshall</option>
										<option value="Islas Salomón">Islas Salomón</option>
										<option value="Israel">Israel</option>
										<option value="Italia">Italia</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japón">Japón</option>
										<option value="Jordania">Jordania</option>
										<option value="Kazajistán">Kazajistán</option>
										<option value="Kenia">Kenia</option>
										<option value="Kirguistán">Kirguistán</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Laos">Laos</option>
										<option value="Lesoto">Lesoto</option>
										<option value="Letonia">Letonia</option>
										<option value="Líbano">Líbano</option>
										<option value="Liberia">Liberia</option>
										<option value="Libia">Libia</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lituania">Lituania</option>
										<option value="Luxemburgo">Luxemburgo</option>
										<option value="Macedonia del Norte">Macedonia del Norte</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malasia">Malasia</option>
										<option value="Malaui">Malaui</option>
										<option value="Maldivas">Maldivas</option>
										<option value="Malí">Malí</option>
										<option value="Malta">Malta</option>
										<option value="Marruecos">Marruecos</option>
										<option value="Mauricio">Mauricio</option>
										<option value="Mauritania">Mauritania</option>
										<option value="México">México</option>
										<option value="Micronesia">Micronesia</option>
										<option value="Moldavia">Moldavia</option>
										<option value="Mónaco">Mónaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Níger">Níger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Noruega">Noruega</option>
										<option value="Nueva Zelanda">Nueva Zelanda</option>
										<option value="Omán">Omán</option>
										<option value="Países Bajos">Países Bajos</option>
										<option value="Pakistán">Pakistán</option>
										<option value="Palaos">Palaos</option>
										<option value="Panamá">Panamá</option>
										<option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Perú">Perú</option>
										<option value="Polonia">Polonia</option>
										<option value="Portugal">Portugal</option>
										<option value="Reino Unido">Reino Unido</option>
										<option value="República Centroafricana">República Centroafricana</option>
										<option value="República Checa">República Checa</option>
										<option value="República del Congo">República del Congo</option>
										<option value="República Democrática del Congo">República Democrática del Congo</option>
										<option value="República Dominicana">República Dominicana</option>
										<option value="República Sudafricana">República Sudafricana</option>
										<option value="Ruanda">Ruanda</option>
										<option value="Rumanía">Rumanía</option>
										<option value="Rusia">Rusia</option>
										<option value="Samoa">Samoa</option>
										<option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
										<option value="San Marino">San Marino</option>
										<option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
										<option value="Santa Lucía">Santa Lucía</option>
										<option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
										<option value="Senegal">Senegal</option>
										<option value="Serbia">Serbia</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leona">Sierra Leona</option>
										<option value="Singapur">Singapur</option>
										<option value="Siria">Siria</option>
										<option value="Somalia">Somalia</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Suazilandia">Suazilandia</option>
										<option value="Sudán">Sudán</option>
										<option value="Sudán del Sur">Sudán del Sur</option>
										<option value="Suecia">Suecia</option>
										<option value="Suiza">Suiza</option>
										<option value="Surinam">Surinam</option>
										<option value="Tailandia">Tailandia</option>
										<option value="Tanzania">Tanzania</option>
										<option value="Tayikistán">Tayikistán</option>
										<option value="Timor Oriental">Timor Oriental</option>
										<option value="Togo">Togo</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad y Tobago">Trinidad y Tobago</option>
										<option value="Túnez">Túnez</option>
										<option value="Turkmenistán">Turkmenistán</option>
										<option value="Turquía">Turquía</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Ucrania">Ucrania</option>
										<option value="Uganda">Uganda</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistán">Uzbekistán</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Vietnam">Vietnam</option>
										<option value="Yemen">Yemen</option>
										<option value="Yibuti">Yibuti</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabue">Zimbabue</option>
									</select>
							</div>
							<div class="form-content">
								<label for="estado"> Estado </label>
								<input type="text" name="estado" id="estado">
							</div>
						</div>
						<div class="form-group">
							<div class="form-content">
								<label for="tel"> Telefono </label>
								<input type="tel" name="telefono" id="tel">
							</div>

							<div class="form-content">
								<label for="mail"> Correo </label>
								<input type="email" name="mail" id="mail">
							</div>
						</div>

						<div class="form-group">
							<div class="form-content">
								<label for="name_dir"> Nombre de Director </label>
								<input type="text" name="name_dir" id="name_dir">
							</div>
						</div>

                        <div class="form-group">

                            <div class="form-content">
                                <label> Festivales </label>
                      
                      <select name="id_festivales" class="form-control">

                         <?php 

                         for ($i=0; $i < $filas_fa; $i++) { 

                      if ($facturas[$i][1]== true) {
                      ?>
                <option  placeholder="Seleccionar" value="<?=$facturas[$i][0]?>"  >
                    <?=$facturas[$i][1]?>
                      
                    </option>
                    <?php
              }else{
                       ?>
                        <label> No hay festivales disponibles</label>

                      <?php
              }
                 
                }

                         ?>


                       </select>
                            </div>

                    </div>

                    <input type="hidden" name="operacion" value="grupo">

						<button class="btn_register"> Enviar </button>
					</form>

					<button onclick="closePopup2()" type="button">Ok</button>
				</div>
			</div>	
			<!-- MODAL 2 -->





			<!-- MODAL 3 -->

            <?php 

        ////cargando los codigos de control de sms
          $sql1="SELECT
  *
FROM
  fesnasol.festivales
"; 
        $res1=mysqli_query($conex,$sql1);
        $campos_fa1=mysqli_num_fields($res1);
        $filas_fa1=mysqli_num_rows($res1);
        $facturas1[]=array();
        $i1=0; 

      while ($disponible1=mysqli_fetch_array($res1)) {
            for ($j1=0; $j1 < $campos_fa1; $j1++) { 
            $facturas1[$i1][$j1]=$disponible1[$j1];
          }
          $i1++;
  
        }

        ////fin de la carga


        ////cargando los codigos de control de sms
          $sql2="SELECT
  *
FROM
  fesnasol.grupos
"; 
        $res2=mysqli_query($conex,$sql2);
        $campos_fa2=mysqli_num_fields($res2);
        $filas_fa2=mysqli_num_rows($res2);
        $facturas2[]=array();
        $i2=0; 

      while ($disponible2=mysqli_fetch_array($res2)) {
            for ($j2=0; $j2 < $campos_fa2; $j2++) { 
            $facturas2[$i2][$j2]=$disponible2[$j2];
          }
          $i2++;
  
        }

        ////fin de la carga

                       ?>
			<div id="container_popup3" class="container_popup">
				<div class="popup" id="popup3">
					<span class="material-symbols-sharp">group</span>
					
					<h2> Registrar Participante </h2>
					
					<form method="post" autocomplete="off" enctype="multipart/form-data" action="controladores/controlador_registro.php">
						<div class="form-group">
							<div class="form-content">
								<label for="nombre"> Nombre </label>
								<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
							</div>

							<div class="form-content">
								<label for="apellido"> Apellido </label>
								<input type="text" name="apellido" id="apellido" placeholder="Apellido">
							</div>
						</div>

						<div class="form-group">
							<div class="form-content">
								<label for="cargo"> Cargo </label>
								<select id="cargo" name="cargo">
									<option value="bailarina">Bailarin(a)</option>
									<option value="acompañante">acompañante</option>
									<option value="staff">Staff</option>
								</select>
							</div>
	
							<div class="form-content">
								<label for="dni"> Documento de identidad </label>
								<input type="text" name="dni" id="dni">
							</div>
						</div>

						<div class="form-group">
							<div class="form-content">
								<label for="talla"> Talla de Camisa </label>
								<input type="text" name="talla" id="talla" placeholder="Talla">
							</div>

							<div class="form-content">
								<label for="comida"> Tipo de comida </label>
								<input type="text" name="comida" id="comida" placeholder="Tipo de comida">
							</div>
						</div>

						<div class="form-group">
							<div class="form-content">
								<label for="ig"> Instagram </label>
								<input type="text" name="ig" id="ig" placeholder="Usuario de Instagram">
							</div>

                            <div class="form-content">
                                <label for="foto"> Fotografía </label>
                                <input class="form-control" type="file" name="foto" accept="image/*">
                            </div>
						</div>


                        <div class="form-group">

                            <div class="form-content">
                                <label for="grupo"> Grupo </label>
                                 <select name="id_grupo" class="form-control">

                         <?php 

                         for ($i2=0; $i2 < $filas_fa2; $i2++) { 

                      if ($facturas2[$i2][1]== true) {
                      ?>
                <option  placeholder="Seleccionar" value="<?=$facturas2[$i2][0]?>"  >
                    <?=$facturas2[$i2][1]?>
                      
                    </option>
                    <?php
              }else{
                       ?>
                        <label> No hay grupos disponibles</label>

                      <?php
              }
                 
                }

                         ?>


                       </select>
                            </div>

                            <div class="form-content">
                                <label for="festival"> Festival </label>

                               <select name="id_festivales" class="form-control">

                         <?php 

                         for ($i1=0; $i1 < $filas_fa1; $i1++) { 

                      if ($facturas1[$i1][1]== true) {
                      ?>
                <option  placeholder="Seleccionar" value="<?=$facturas1[$i1][0]?>"  >
                    <?=$facturas1[$i1][1]?>
                      
                    </option>
                    <?php
              }else{
                       ?>
                        <label> No hay festivales disponibles</label>

                      <?php
              }
                 
                }

                         ?>


                       </select>
                            </div>
                        </div>


						<div class="form-group">
							<div class="form-content">
								<label for="pasaporte"> Pasaporte </label>
								<input type="text" name="pasaporte" id="pasaporte">
							</div>
						</div>

						<div class="form-group">
							<div class="form-content">
								<label for="llegada"> Llegada Aeropuerto </label>
								<input type="datetime-local" name="llegada" id="llegada">
							</div>

							<div class="form-content">
								<label for="n_vuelo_1"> N° de Vuelo llegada </label>
								<input type="text" placeholder="N° de vuelo" name="n_vuelo_1" id="n_vuelo_1">
							</div>
						</div>

						<div class="form-group">
							<div class="form-content">
								<label for="salida"> Salida Aeropuerto </label>
								<input type="datetime-local" name="salida" id="salida">
							</div>

							<div class="form-content">
								<label for="n_vuelo_2"> N° de Vuelo salida </label>
								<input type="text" placeholder="N° de vuelo" name="n_vuelo_2" id="n_vuelo_2">
							</div>
						</div>

                         <input type="hidden" name="operacion" value="persona">



						<button class="btn_register"> Enviar </button>
					</form>

					<button onclick="closePopup3()" type="button">Ok</button>
				</div>
			</div>	
			<!-- MODAL 2 -->



		</main>
		<!--main section end-->

		<!--right section start -->
		<div class="right">
			<div class="top">
				<button id="menu_bar">
					<span class="material-symbols-sharp"> menu</span>
				</button>
				<!-- <div class="theme-toggler">
					<span class="material-symbols-sharp active">light_mode</span>
					<span class="material-symbols-sharp"> dark_mode</span>
				</div> -->
				<div class="profile">
					<div class="info">
						<p><b>Babar</b></p>
						<p>Admin</p>
						<small class="text-muted"></small>
					</div>
					<div class="profile-photo">
						<img src="img/profile_photo.jpeg" alt="">
					</div>
				</div>

			</div>
			<!--end top-->

			<!--start recent updates-->
			<!-- <div class="recent_updates">
				<h2>Recent Updates</h2>

			   <div class="updates">

				<div class="update">
					<div class="profile.photo">
						<img src="images/profile-2.jpg" alt="">
					</div>
					<div class="message">
						<p><b>Babar</b> Recived his order</p>
					</div>
				</div>

				<div class="update">
					<div class="profile.photo">
						<img src="images/profile-2.jpg" alt="">
					</div>
					<div class="message">
						<p><b>Babar</b> Recived his order</p>
					</div>
				</div>

				<div class="update">
					<div class="profile.photo">
						<img src="images/profile-2.jpg" alt="">
					</div>
					<div class="message">
						<p><b>Babar</b> Recived his order</p>
					</div>
				</div>
			  </div>	


			</div> -->
			<!--end recent updates-->

			<!--start sales analytic-->
			<!-- <div class="sales_analytics">
				<h2>Sales Analytics </h2>

					<div class="item onlion">
						<div class="icon">
						<span class="material-symbols-sharp">shopping_cart</span>
						</div>
						<div class="right_text">
							<div class="info">
								<h3>onlion orders</h3>
								<small class="text-muted"> Last seen 2 Hours</small>
							</div>
							<h5 class="danger">-17%</h5>
							<h3>3849</h3>
						</div>
					</div>

						<div class="item onlion">
						<div class="icon">
						<span class="material-symbols-sharp">shopping_cart</span>
						</div>
						<div class="right_text">
							<div class="info">
								<h3>onlion orders</h3>
								<small class="text-muted"> Last seen 2 Hours</small>
							</div>
							<h5 class="danger">-17%</h5>
							<h3>3849</h3>
						</div>
					</div>

						<div class="item onlion">
						<div class="icon">
						<span class="material-symbols-sharp">shopping_cart</span>
						</div>
						<div class="right_text">
							<div class="info">
								<h3>onlion orders</h3>
								<small class="text-muted"> Last seen 2 Hours</small>
							</div>
							<h5 class="danger">-17%</h5>
							<h3>3849</h3>
						</div>
					</div>



			</div> -->
			<!--end sales analytic-->
		<!-- <div class="item add_products">
			<div>
				<span class="material-symbols-sharp">add</span>
			</div>
		</div> -->
		</div>

		<!--right section end -->
	</div>

	<script type="text/javascript">
		let popup = document.getElementById("popup");
		let container_popup = document.getElementById("container_popup");

		function openPopup(){
			popup.classList.add("open-popup");
			container_popup.classList.add("open_container");
		}

		function closePopup(){
			popup.classList.remove("open-popup");
			container_popup.classList.remove("open_container");
		}


		/*POPUP 2*/
		let popup2 = document.getElementById("popup2");
		let container_popup2 = document.getElementById("container_popup2");

		function openPopup2(){
			popup2.classList.add("open-popup");
			container_popup2.classList.add("open_container");
		}

		function closePopup2(){
			popup2.classList.remove("open-popup");
			container_popup2.classList.remove("open_container");
		}


		/*POPUP 3*/
		let popup3 = document.getElementById("popup3");
		let container_popup3 = document.getElementById("container_popup3");

		function openPopup3(){
			popup3.classList.add("open-popup");
			container_popup3.classList.add("open_container");
		}

		function closePopup3(){
			popup3.classList.remove("open-popup");
			container_popup3.classList.remove("open_container");
		}

	</script>

	<script defer type="text/javascript" src="js/datatable_1.js"></script>


	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>