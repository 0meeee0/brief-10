<?php
ob_start();
?>
<div class="wrapper">
        <div class="body-overlay"></div>
        <nav id="sidebar">
          <ul class="list-unstyled components">
    <li  class="active">
                  <a href="#" class="dashboard"><i class="material-icons">dashboard</i>
        <span>Dashboard</span></a>
              </li>
        <li class="dropdown">
                  <a href="adminroad.html"  aria-expanded="false" >
        <i class="material-icons"></i><span>Bus</span></a>
                  <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                      <li>
                          <a href="#"></a>
                      </li>
                      <li>
                          <a href="#"></a>
                      </li>
                      <li>
                          <a href="#"></a>
                      </li>
                  </ul>
              </li>
      <li class="dropdown">
                  <a href="adminschedule.html"  aria-expanded="false" >
        <i class="material-icons"></i><span>Schedule</span></a>
                  <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                      <li>
                          
                      </li>
                      <li>
                         
                      </li>
                      <li>
                          
                      </li>
                  </ul>
              </li>
      </nav>
		<div id="content">
		   <div class="top-navbar">
		      <div class="xp-topbar">
                <div class="row"> 
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                    </div>
                    <div class="col-md-5 col-lg-3 order-3 order-md-2">
                        <div class="xp-searchbar">
                        </div>
                    </div>
                    <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                        <div class="xp-profilebar text-right">
							 <nav class="navbar p-0">
                        <ul class="nav navbar-nav flex-row ml-auto" style="position: relative; left: 700px;">   
                            <li class="dropdown nav-item active">
                                <a href="#" class="nav-link" data-toggle="dropdown" >
                                   <span class="material-icons">notifications</span>
                               </a>
								<ul class="dropdown-menu small-menu">
                                    <li>
                                        <a href="#">
										  <span class="material-icons">
person_outline
</span>Profile
										</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="material-icons">
settings
</span>Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="material-icons">
logout</span>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
            </nav>
                        </div>
                    </div>
                </div> 
            </div>
		     <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Dashboard</h4>             
            </div>
		   </div>
		   <div class="main-content">
			  <div class="row">
				<div class="col-md-12">
				<div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Manage Bus</h2>
        </div>
        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Bus Number</th>
          <th>Lisence</th>
          <th>Capacity</th>
          <th>Company</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($buses as $bus): ?>
    <tr>
        <td><?= $bus->getBusnumber() ?></td>
        <td><?= $bus->getLicenseplate() ?></td>
        <td><?= $bus->getCapacity() ?></td>
        <td><?= $bus->getCompanyname() ?></td>
        <td><a href="index.php?action=edit&immat=<?= $category->getBusimmat() ?>" class="btn btn-warning">Update</a></td>
        <td><a href="index.php?action=delete&immat=<?= $category->getBusimmat() ?>" class="btn btn-danger">Delete</a></td>
    </tr>
<?php endforeach; ?>
      </tbody>
    </table>
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
	</div>
  </div>
</div>
		</div>
		<footer class="footer">
			    <div class="container-fluid">
				  <div class="footer-in">
                    <p class="mb-0">&copy; 2024 SmartTravel - All Rights Reserved.</p>
                </div>
				</div>
			 </footer>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>



