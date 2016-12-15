<?php
/**
 * Created by PhpStorm.
 * User: snemesh
 * Date: 23.11.16
 * Time: 15:21
 */

function myfooter() {
    $messages="Intersog - dashboard Admin panel by";
    $link = "https://intersog.com";
    echo "
            <footer>
                <div class='pull-right'>".$messages. " 
                    <a href=".$link." >Intersog</a>
                </div>
                <div class='clearfix'></div>
            </footer>";

}

function myNavicetion(){
//$username = POST["username"];
$username = "Sergey";
$menu1="Settings";
$menu2="FullScreen";
$menu3="Lock";
$menu4="Logout";

echo "<div class='col-md-3 left_col'>
        <div class='left_col scroll-view'>
            <div class='navbar nav_title' style='border: 0;'>
              <a href='index.php' class='site_title'><i class='fa fa-paw'></i> <span>Dashboard!</span></a>
            </div>
            <div class='clearfix'></div>
            <div class='profil'>
                <div class='profile_pic'>
                    <img src='images/img.jpg' alt='...' class='img-circle profile_img'>
                </div>
                <div class='profile_info'>
                    <span>Welcome,</span>
                    <h2>$username</h2>
                </div>
            </div>
            <div id='sidebar-menu' class='main_menu_side hidden-print main_menu'>
                <div class='menu_section'><h3>General</h3>
                    <ul class='nav side-menu'>
                        <li><a><i class='fa fa-home'></i> Home <span class='fa fa-chevron-down'></span></a>
                            <ul class='nav child_menu'><li><a href='index.php'>Dashboard</a></li></ul>
                        </li>
                        <li><a><i class='fa fa-table'></i> Tables <span class='fa fa-chevron-down'></span></a>
                            <ul class='nav child_menu'>
                                <li><a href='tables.php'>Tables</a></li>
                                <li><a href='tables.php'>Table Dynamic</a></li>
                            </ul>
                        </li>
                        <li><a><i class='fa fa-flask'></i> Test Arrea <span class='fa fa-chevron-down'></span></a>
                            <ul class='nav child_menu'><li><a href='../../../searchData.php'>SearchData</a></li></ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class='sidebar-footer hidden-small'>
                <a data-toggle='tooltip' data-placement='top' title=".$menu1.">
                    <span class='glyphicon glyphicon-cog' aria-hidden='true'></span>
                </a>
                <a data-toggle='tooltip' data-placement='top' title=".$menu2. ">
                    <span class='glyphicon glyphicon-fullscreen' aria-hidden='true'></span>
                </a>
                <a data-toggle='tooltip' data-placement='top' title=".$menu3. ">
                    <span class='glyphicon glyphicon-eye-close' aria-hidden='true'></span>
                </a>
                <a data-toggle='tooltip' data-placement='top' title=".$menu4. " onclick='LogOut()'>
                    <span class='glyphicon glyphicon-off' aria-hidden='true'></span>
                </a>
            </div>
        </div>
     </div>";
}

function topMenu(){
$user="Sergey";
echo "
        <div class='top_nav'>
            <div class='nav_menu'>
                <nav class='' role='navigation'>
                    <div class='nav toggle'>
                            <a id='menu_toggle'><i class='fa fa-bars'></i></a>
                    </div>
                    <ul class='nav navbar-nav navbar-right'>
                        <li class=''>
                              <a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                                   <img src='images/img.jpg' alt=''>" . $user . " <span class=' fa fa-angle-down'></span>
                              </a>
                              <ul class='dropdown-menu dropdown-usermenu pull-right'>
                                   <li><a href='login.php'><i class='fa fa-sign-out pull-right'></i> Log Out</a></li>
                              </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
";
}

function tableReport1()
{
    $colum1="d#";
    $colum2="Project";
    $colum3="Billable";
    $colum4="Assignee";
    $colum5="Estimated";
    $colum6="Spent";
    $colum7="Loged Date";

    echo "
        <div class='right_col' role='main' style='min-height: 859px;'>
            <div class='row tile_count' style='margin-bottom: 0;'>
                <div class='col-md-12 col-sm-12 col-xs-12'>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <h2>List of Project<small>Projects</small></h2>
                                <ul class='nav navbar-right panel_toolbox'>
                                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a></li>
                                    <li class='dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='#'>Settings 1</a></li>
                                                <li><a href='#'>Settings 2</a></li>
                                            </ul>
                                    </li>
                                    <li><a class='close-link'><i class='fa fa-close'></i></a></li>
                                </ul>
                                <div class='clearfix'></div>
                        </div>
                        <div class='x_content'>
                            <p id = 'tempText' class='text-muted font-13 m-b-30' style='text-align: center'>
                                Please wait befor all tha data will be loaded. It will take several minutes
                            </p>
                            <div></div>
                            <table id='datatable-buttons' class='table table-striped table-bordered'>
                                <thead>
                                    <tr>
                                        <th>".$colum1."</th>
                                        <th>".$colum2."</th>
                                        <th>".$colum3."</th>
                                        <th>".$colum4."</th>
                                        <th>".$colum5."</th>
                                        <th>".$colum6."</th>
                                        <th>".$colum7."</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <div id='cirk' class='animation-position'>
                                    <div class='circle'></div>
                                    <div class='circle1'></div>
                                </div>";
                                showDataInTable(); echo
                                "</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
   ";


}

function loadScripts(){
    //jQuery
    echo "<script src='../vendors/jquery/dist/jquery.min.js'></script>";
    // Bootstrap
    echo "<script src='../vendors/bootstrap/dist/js/bootstrap.min.js'></script>";
    //FastClick
    echo "<script src='../vendors/fastclick/lib/fastclick.js'></script>";
    //NProgress
    echo "<script src='../vendors/nprogress/nprogress.js'></script>";

}

function includeJStoTable1()
{
    echo "<script src = '../vendors/datatables.net/js/jquery.dataTables.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-buttons/js/dataTables.buttons.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-buttons/js/buttons.flash.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-buttons/js/buttons.html5.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-buttons/js/buttons.print.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-responsive/js/dataTables.responsive.min.js' ></script >";
    echo "<script src = '../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js' ></script >";
    echo "<script src = '../vendors/datatables.net-scroller/js/dataTables.scroller.min.js' ></script >";
    echo "<script src = '../vendors/jszip/dist/jszip.min.js'></script>";
    echo "<script src = '../vendors/pdfmake/build/pdfmake.min.js'></script>";
    echo "<script src = '../vendors/pdfmake/build/vfs_fonts.js'></script>";
    echo "<script src = '../vendors/Chart.js/dist/Chart.min.js'></script>";

}

function UserTable1()
{
    $colum1="Id# ";
    $colum2="User Name";
    $colum3="Salary, $";
    $colum4="Rate, $";
    $colum5="Group";
    $colum6="Spent, h";
    $colum7="Month";

    echo "  
        <div class='right_col' role='main'>
            <div class='clearfix'></div>  
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                    <div class='x_title'>
                        <h2>User Table <small>Intersog report with salary</small></h2>
                        <ul class='nav navbar-right panel_toolbox'>
                            <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a></li>
                            <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                                    <ul class='dropdown-menu' role='menu'>
                                        <li><a href='#'>Settings 1</a></li>
                                        <li><a href='#'>Settings 2</a></li>
                                    </ul>
                            </li>
                            <li><a class='close-link'><i class='fa fa-close'></i></a></li>
                        </ul>
                        <div class='clearfix'></div>
                    </div>
                  
                    <div class='x_content'>
                        <p>Today is <code><span id='curdata'>".date('M-Y')."</span></code> All information will be updated by this date.</p>
                        <div class='table-responsive'>
                            <table id='myemployee' class='table table-striped jambo_table bulk_action'>
                                <thead>
                                    <tr class='headings'>
                                            <th class='column-title'> $colum1 </th>
                                            <th class='column-title'> $colum2 </th>
                                            <th class='column-title'> $colum7 </th>
                                            <th class='column-title'> $colum3 </th>
                                            <th class='column-title'> $colum4 </th>
                                            <th class='column-title'> $colum5 </th>
                                            <th class='column-title'> $colum6 </th>
                                            <th class='column-title no-link last'><span class='nobr'>Action</span></th>
                                     </tr>
                                </thead>
                            <tbody>";
                                 showDataForUsersTable(); echo"
                            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>    
";
}

function EmployeeTable()
{
    $colum1="Id# ";
    $colum2="Employee";
    $colum3="Speciality";
    $colum4="Level";
    $colum5="Group";
    $colum6="Data";
    $colum7="Salary";

    echo "    
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                    <div class='x_title'>
                        <h2>User Table <small>Intersog report with salary</small></h2>
                        <ul class='nav navbar-right panel_toolbox'>
                            <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a></li>
                            <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                                    <ul class='dropdown-menu' role='menu'>
                                        <li><a href='#'>Settings 1</a></li>
                                        <li><a href='#'>Settings 2</a></li>
                                    </ul>
                            </li>
                            <li><a class='close-link'><i class='fa fa-close'></i></a></li>
                        </ul>
                        <div class='clearfix'></div>
                    </div>
                  
                    <div class='x_content'>
                        <p>Today is <code><span id='curdata'>".date('M-Y')."</span></code> All information will be updated by this date.</p>
                        <div class='table-responsive'>
                            <table id='myemployee' class='table table-striped jambo_table bulk_action'>
                                <thead>
                                    <tr class='headings'>
                                            <th class='column-title'> $colum1 </th>
                                            <th class='column-title'> $colum2 </th>
                                            <th class='column-title'> $colum3 </th>
                                            <th class='column-title'> $colum4 </th>
                                            <th class='column-title'> $colum5 </th>
                                            <th class='column-title'> $colum6 </th>
                                            <th class='column-title'> $colum7 </th>
                                            <th class='column-title no-link last'><span class='nobr'>Action</span></th>
                                     </tr>
                                </thead>
                            <tbody>";

                                showEmployeeTable(date('M-Y')); echo"
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
";
}

function HeadContent() {
    echo "<div class='right_col' role='main'>
    <div class='clearfix'></div>";
}

function FooterContent(){
    echo "</div>";
}

function FormDataEnter(){
  echo "  
    <div class='x_panel'>
        <div class='x_title'>
        <h2>Setting Employee <small>current period data </small></h2>
            <div class='clearfix'></div>
        </div>
        <div class='x_content'>
            <div class='row'>
                  <div class='col-md-6 form-group'>
                    <input type='text' value='".date('M-Y')."' class='form-control' id='curdata'>
                  </div>
                  <div class='col-md-6 form-group'>
                    <input type='text' placeholder='.col-md-12' class='form-control'>
                  </div>                                    
                  <div class='col-md-3'>
                    <div class='input-group'>
                        <span class='input-group-btn'>
                            <button type='button' class='btn btn-primary'>Change</button>                          
                        </span>
                        <input type='text' class='form-control' placeholder='Current Data'>
                    </div>
                  </div>
                  <div class='col-md-3'>
                    <div class='input-group xdisplay_inputx form-group has-feedback'>
                        <span class='input-group-btn'>
                            <button id='snddate' type='button' class='btn btn-primary'>Date</button>                          
                        </span>
                        <input type='text' class='form-control has-feedback-right' id='single_cal2' placeholder='Chose date' aria-describedby='inputSuccess2Status'>
                        <span id='inputSuccess2Status' class='sr-only'>(success)</span>
                    </div>
                  </div>
                  <div class='col-md-3'>
                    <div class='input-group'>
                        <span class='input-group-btn'>
                            <button type='button' class='btn btn-primary'>Go!</button>                          
                        </span>
                        <input type='text' class='form-control' placeholder='Test'>
                    </div>
                  </div>
                  <div class='col-md-3'>
                    <div class='input-group'>
                        <span class='input-group-btn'>
                            <button type='button' class='btn btn-primary'>Go!</button>          
                        </span>
                        <input type='text' class='form-control' placeholder='Test'>
                    </div>
                  </div>
                  <div id='result'>Тут будет ответ от сервера</div><br/><br />
            </div>
        </div> 
    </div>
   ";
}

function dataForTableUser(){
    $va1="fgdfgf";
    $va2="dfdg";
    $va3="dfgdf";
    $va4="dfgdf";
    $va5="dfgdf";
    $va6="dfgdfg";

    echo "<tr class='even pointer'>";
        echo "<td>".$va1."</td>";
        echo "<td>".$va2."</td>";
        echo "<td>".$va3."</td>";
        echo "<td>".$va4."</td>";
        echo "<td>".$va5."</td>";
        echo "<td>".$va6."</td>";
    echo "</tr>";

}