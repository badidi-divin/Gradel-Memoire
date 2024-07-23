<?php session_start();
	require_once('securite.php');
	$user=$_SESSION['pseudo'];
	extract($_GET); 
    // La fonction strip tags permet de supprimer le html lors de l'envoie    
    $id=strip_tags($id);
    require_once('../model/functions.php');
         $success=array();
    if (!empty($_POST)){

      extract($_POST);
      $errors=array();


      $auteur=strip_tags($auteur);
      $comment=strip_tags($comment);

      if (empty($auteur)) 
        array_push($errors, 'Entrer un Pseudo');


        if (empty($comment)) 
          array_push($errors, 'Entrer un commentaire');


              if (count($errors)==0){

                    $comment=addComment_blog($id,$auteur,$comment);
                    $success['message']='Votre commentaire a bien été publié';
                    unset($auteur);
                    unset($comment);
                    
                  }             
     
         }
  $blogs=getblogs($id); 
  $comments=getComments_blog($id);

 ?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<style type="text/css">
	    .right p{
	      background-color: #86BB71;
	      padding: 15px;
	      border-radius: 8px;
	      color: white;
	    }
  	</style>
	<body>

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				

			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<?php if (!$_SESSION['photo']=='') {
									?>
									<img src="../includes/Avatar_compte/<?= $_SESSION['photo'] ?>" alt="" width="400px"  height="400px"/> 
									<?php	
								} ?>
							</span>
							<span class="user-name"><?php echo $_SESSION['pseudo'] ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.php"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="faq.php"
								><i class="dw dw-help"></i> Aide</a
							>
							<a class="dropdown-item" href="logout.php"
								><i class="dw dw-logout"></i> Se Déconecter</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php  require_once('theme.php');

		?>
		<?php require_once('menu-sidebar.php'); ?>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Blog Detail <?php echo $blogs->nom; ?></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="blog-wrap">
						<div class="container pd-0">
							<div class="row">
								<div class="col-md-8 col-sm-12">
									<div class="blog-detail card-box overflow-hidden mb-30">
										<div class="blog-img">
											<a href="../includes/blog/<?php echo $blogs->image; ?>" target="_blank"><img src="../includes/blog/<?php echo $blogs->image; ?>" alt="" /></a>
											
										</div>
										<div class="blog-caption">
											<h4 class="mb-10">
												<?php echo $blogs->nom; ?>
											</h4>
											<p>
												<?php echo $blogs->description; ?>
											</p>
											<p>
												Publié le: <?php echo $blogs->dates; ?>
											</p>
											
										</div>

									</div>
								</div>
								
							</div>
							<section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
   
        <div class="col-md-12">
        <?php
			if (!empty($success)):
		?>
        <div class="alert alert-success">
			<p></p>
			<ul>
				<?php foreach($success as $successs):?>
				<li><?= $successs; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
                <?php
      if(!empty($errors)):?>
      <?php
        foreach($errors as $error):?>
          <div class="row">
            <div class="col-md-6">
              <div class="alert alert-danger"><?= $error?></div>
            </div>
          </div>
      <?php
        endforeach;?>
    <?php
      endif; ?>
          <div class="wrapper">
            <div class="row no-gutters">
              <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-md-5 p-4">
                  <h3 class="mb-4">Laissez un commentaire ici</h3>
                  <form method="POST" id="contactForm" action="detailblog.php?id=<?=$blogs->id;?>" class="contactForm">
                        <?php
                    if (!empty($erreur)):
                  ?>
                  <div class="alert alert-danger">
                    <p></p>
                      <ul>
                        <?php foreach($erreur as $erreur):?>
                          <li><?= $erreur; ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>

                    <?php endif; ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="hidden" class="form-control"name="auteur" id="auteur" value="<?php echo $user; ?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="#">Message</label>
                          <textarea name="comment" class="form-control" id="message" cols="30" rows="4" id="comment" cols="30" rows="8" required="required"><?php if(isset($comment)) echo $comment; ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" value="Envoyer Message" class="btn btn-primary">
                          <div class="submitting"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
    <?php foreach ($comments as $com): ?>
      <div class="right">
        <h3 ><a href="#"><?= $com->auteur ?></a></h3>
        <time><?= $com->dates ?></time>
        <p><?= $com->comment ?></p>
      </div>
    <?php endforeach; ?>
        <div class="col-md-12 mt-5">
          <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>
						</div>
					</div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php') ?>
					
				</div>
			</div>
		</div>
		<!-- welcome modal start -->
		
		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
