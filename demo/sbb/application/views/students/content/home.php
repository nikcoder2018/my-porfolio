<?php $this->load->view('students/header'); ?>

<?php $this->load->view('students/topmenu'); ?>

<div class="container student">
  <?php $this->load->view('students/navbar'); ?>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php if(is_array($activities)): ?>
        <?php $counter = 0; ?>
        <?php foreach($activities as $key=>$val): ?>
        <?php if($val->addon_mainslide == true): ?>
          <?php if($val->active == true): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?=$counter; ?>" class="active"></li>
          <?php else: ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?=$counter; ?>"></li>
          <?php endif; ?>
        <?php endif; ?>
        <?php $counter++; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </ol>
    <div class="carousel-inner">
      <?php if(is_array($activities)): ?>
        <?php foreach($activities as $key=>$val): ?>
        <?php if($val->addon_mainslide == true): ?>
          <?php if($val->active == true): ?>
            <div class="carousel-item active">
              <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
            </div>
          <?php else: ?>
            <div class="carousel-item">
              <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
            </div>
          <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="row mt-1">
    <div class="col-xs-6 col-md-3">
      <div class="card">
        <div id="AgricultureIndicators2" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php if(is_array($agriculture)): ?>
              <?php $counter = 0; ?>
              <?php foreach($agriculture as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <li data-target="#AgricultureIndicators2" data-slide-to="<?=$counter; ?>" class="active"></li>
                <?php else: ?>
                  <li data-target="#AgricultureIndicators2" data-slide-to="<?=$counter; ?>"></li>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </ol>
          <div class="carousel-inner">
            <?php if(is_array($agriculture)): ?>
              <?php $counter = 0; ?>
              <?php foreach($agriculture as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <div class="carousel-item active">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php else: ?>
                  <div class="carousel-item">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <a class="carousel-control-prev" href="#AgricultureIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#AgricultureIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <a href="<?=base_url(); ?>activities/2" class="btn btn-success btn-block">Agriculture</a>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="card">
        <div id="CriminologyIndicators2" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php if(is_array($criminology)): ?>
              <?php $counter = 0; ?>
              <?php foreach($criminology as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <li data-target="#CriminologyIndicators2" data-slide-to="<?=$counter; ?>" class="active"></li>
                <?php else: ?>
                  <li data-target="#CriminologyIndicators2" data-slide-to="<?=$counter; ?>"></li>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </ol>
          <div class="carousel-inner">
            <?php if(is_array($criminology)): ?>
              <?php $counter = 0; ?>
              <?php foreach($criminology as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <div class="carousel-item active">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php else: ?>
                  <div class="carousel-item">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <a class="carousel-control-prev" href="#CriminologyIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#CriminologyIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <a href="<?=base_url(); ?>activities/3" class="btn btn-danger btn-block">Criminology</a>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="card">
        <div id="EducationIndicators2" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php if(is_array($education)): ?>
              <?php $counter = 0; ?>
              <?php foreach($education as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <li data-target="#EducationIndicators2" data-slide-to="<?=$counter; ?>" class="active"></li>
                <?php else: ?>
                  <li data-target="#EducationIndicators2" data-slide-to="<?=$counter; ?>"></li>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </ol>
          <div class="carousel-inner">
            <?php if(is_array($education)): ?>
              <?php $counter = 0; ?>
              <?php foreach($education as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <div class="carousel-item active">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php else: ?>
                  <div class="carousel-item">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <a class="carousel-control-prev" href="#EducationIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#EducationIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <a href="<?=base_url(); ?>activities/4" class="btn btn-primary btn-block">Education</a>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="card">
        <div id="InfoTechIndicators2" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php if(is_array($infotech)): ?>
              <?php $counter = 0; ?>
              <?php foreach($infotech as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <li data-target="#InfoTechIndicators2" data-slide-to="<?=$counter; ?>" class="active"></li>
                <?php else: ?>
                  <li data-target="#InfoTechIndicators2" data-slide-to="<?=$counter; ?>"></li>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </ol>
          <div class="carousel-inner">
            <?php if(is_array($infotech)): ?>
              <?php $counter = 0; ?>
              <?php foreach($infotech as $key=>$val): ?>
                <?php if($counter == 0): ?>
                  <div class="carousel-item active">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php else: ?>
                  <div class="carousel-item">
                    <img src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>" class="d-block w-100" alt="...">
                  </div>
                <?php endif; ?>
              <?php $counter++; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <a class="carousel-control-prev" href="#InfoTechIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#InfoTechIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <a href="<?=base_url(); ?>activities/5" class="btn btn-secondary btn-block">Information & Technology</a>
        </div>
      </div>
    </div>
  </div>
</div>
