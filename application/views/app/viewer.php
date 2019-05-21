<div class="max-width-viewer mx-auto">
  <h3 class="bg-light text-primary mt-5 py-2 pl-3 shadow-lg-personal rounded-personal">Budget Viewer</h3>
    <div class="my-3">
      <h5 class="pl-3 text-secondary">Links to Category <i class="fa fa-caret-square-o-down text-primary f-size-category mt-1 ml-2"></i></h5>
      <ul class="list-group d-flex flex-row justify-content-center width-100">
        <?php
        foreach($result as $key => $row): ?>
            <li class="list-group-item p-2 ml-3"><a href="#<?php echo $key ?>"><?php echo $key ?> </a></li>
        <?php endforeach; ?>
      </ul>
    </div>
      <div class="row">
          <div class="col-7 mt-3 mb-1 ">

            <p class="badge badge-primary py-2 px-2 f-size-category">From: <span class="badge badge-light px-1 py-1"><?php echo $past_date; ?></span> </p>
            <p class="badge badge-primary py-2 px-2 f-size-category">To: <span class="badge badge-light px-1 py-1"><?php echo $recent_date ?></span></p>
          </div>
          <div class="col">
            <p class="mt-3 py-2 px-2 f-size-category">Budget: <span class="badge badge-success f-size-category px-1 py-1">$<?php echo $budget_amount; ?></span></p>
          </div>
      </div>

      <div class="shadow-lg-personal rounded-personal px-4 pt-4 pb-5 text-left bg-light">

      <ul class="list-group">
      <?php
      $count = 0;
      $budgetSub = 0;
      $budgetIncr = 0;
      foreach($result as $key => $row): ?>
        <li class="list-group bg-white">  <a class="category-link"  id="<?php echo $key ?>"><span class=" text-uppercase text-primary text-left f-size-category pr-3 bg-light width-100"><?php echo $key ?></span></a><small class=" mb-3 mr-3"><a href="#top"> <i class="fa fa-caret-square-o-up text-secondary float-right f-size-category"></i></a></small>

          <ul class="info-ul" aria-labelledby="dropdownMenuButton">
            <?php foreach($row['subInfo'] as $sub):
              $count++;
              $budgetIncr += $sub['amount'];
              $budgetSub = $budget_amount - $budgetIncr; ?>
              <li  class="list-group border-bottom border-color-grey info-li mr-5">
                <p class="badge badge-secondary mt-3 text-center max-width-count dis-inline"><?php echo $count ?></p>
                <div>
                    <small class="text-secondary">Date of Debit</small>
                    <p class="col-8 bg-light text-primary"><?php echo $sub['record_date']; ?></p>
                    <small class="text-secondary">Note</small>
                    <p class="col-8 bg-light text-primary"><?php echo $sub['note']; ?></p>
                  <div class="row">
                      <p class="col-8 text-secondary">Amount:  <?php echo $sub['amount']; ?></p>
                      <small class="text-secondary">Budget: <span class="badge <?php echo (isset($budgetSub) && $budgetSub > 0) ?  'badge-success' : 'badge-danger' ?> f-size-category px-1 py-1">$<?php echo $budgetSub ?></span></small>

                  <p></p>
                  </div>
                </div>
              </li>
            <?php endforeach;
            $count = 0; ?>
          </ul>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
</div>




?>
