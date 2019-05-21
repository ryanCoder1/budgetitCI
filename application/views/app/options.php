<div class="row">
<div class="col-sm-12 col-md-6 bg-light pb-3 pl-4 pr-4 border-right min-width-form">
  <h4 class="text-primary pt-4">Budget tracker</h4>
    <?php echo (isset($record_success)) ?
    '<p class="text-success ">' .$record_success.'</p>' : ''
     ?>

      <form method="post" action="tracker" class="mt-3">
      <div class="max-width-input mx-auto">
        <div class="form-group col-sm-12 col-md marg-left-neg max-width-input">
          <input type="text" class="form-control" id="note" name="note" placeholder="Make a note" value="">
        </div>
        <?php echo (!empty(form_error('record_date'))) ?
        '<small class="text-red">' .form_error('record_date').'</small>' : ''
         ?>
        <div class="row">
          <div class="form-group col-sm-12 col-md max-width-input">
            <input type="text" class="form-control" id="recordDate" name="record_date" placeholder="Date of Debit" value="" required>
          </div>

          <div class="form-group  col-sm-12 col-md max-width-input">
            <input type="text" class="form-control" id="debitAmt" name="amount" placeholder="Debit Amount" value="" required>
          </div>
        </div>
          <?php echo (!empty(form_error('amount'))) ?
          '<small class="text-red">' .form_error('amount').'</small>' : ''
           ?>

          <div class="form-group col-sm-12 col-md marg-left-neg max-width-input">
            <select class="custom-select " name="category" required>
              <option  value="category" selected="true" disabled="disabled">Category...</option>
              <option value="payroll check">Payroll Check</option>
              <option value="mortgage">Mortgage</option>
              <option value="rent">Rent</option>
              <option value="property taxes">Property Taxes</option>
              <option value="condo fee">Condo Fee</option>
              <option value="house/tenant insurance">House/Tenant Insurance</option>
              <option value="cable">Cable</option>
              <option value="cell phone">Cell Phone</option>
              <option value="electricity">Electricity</option>
              <option value="water">Water</option>
              <option value="fuel">Fuel</option>
              <option value="car">Car</option>
              <option value="vehicle insurance">Vehicle Insurance</option>
              <option value="life insurance">Life Insurance</option>
              <option value="bank fees">Bank Fees</option>
              <option value="debt payments">Debt Payments</option>
              <option value="clothing/shoes">Clothing / Shoes</option>
              <option value="health expenses">Health Expenses</option>
              <option value="vet bills">Vet Bills</option>
              <option value="gifts">Gifts</option>
              <option value="vehicle maintenance">Vehicle Maintenance</option>
              <option value="groceries">Groceries</option>
              <option value="fuel vehicle">Fuel / Vehicle</option>
              <option value="public transportation">Public Transportation</option>
              <option value="daycare">Daycare</option>
              <option value="entertainment">Entertainment</option>
              <option value="sports / recreation">Sport / Recreation</option>
              <option value="hair care">Hair Care</option>
              <option value="reading material">Reading Material</option>
              <option value="children's activities">Children's Activities</option>

            </select>
          </div>
          <?php echo (!empty(form_error('category'))) ?
          '<p class="text-danger ">' .form_error('category').'</p>' : ''
           ?>
          <input type="hidden" name="user_id" value="<?php echo (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '' ?>">
        <div class="form-group mt-2 col-sm-8 col-md-8 col-lg-4 width-btn-sm">
           <button type="submit" class="form-control pt-2 pb-2 btn btn-primary">Track activity</button>
         </div>
       </div>
    </form>
</div>
<div class="col-sm-12 col-md-6 bg-light pb-3 pr-4 pl-4 border-right min-width-form">
  <h4 class="text-primary pt-4 pb-4 ">Budget viewer</h4>
    <form method="post" action="viewer">
      <div class="max-width-input mx-auto">
          <div class="row">
            <div class="form-group  col-sm-12 col-md  max-width-input">
              <input type="text" class="form-control" id="pastDate" name="past_date" placeholder="Search from Date" value="" required>
            </div>
          <div class="form-group  col-sm-12 col-md max-width-input">
             <input type="text" class="form-control" id="recentDate" name="recent_date" placeholder="Search to Date" value="" required>
         </div>
         <?php echo (!empty(form_error('past_date'))) ?
         '<small class="text-red">' .form_error('past_date').'</small>' : ''
          ?>
          <?php echo (!empty(form_error('recent_date'))) ?
          '<small class="text-red">' .form_error('recent_date').'</small>' : ''
           ?>
       </div>

          <div class="form-group  col-sm-12 col-md  marg-left-neg max-width-input">
            <input type="text" class="form-control" id="budgetAmt" name="budget_amount" placeholder="Budget Amount" required>
          </div>
          <?php echo (!empty(form_error('budget_amount'))) ?
          '<small class="text-red">' .form_error('budget_amount').'</small>' : ''
           ?>
          <div class="form-group  col-sm-12 col-md  marg-left-neg max-width-input">
            <select class="custom-select" name="category">
              <option value="all">All Categories</option>
              <option value="payroll check">Payroll Check</option>
              <option value="mortgage">Mortgage</option>
              <option value="rent">Rent</option>
              <option value="property taxes">Property Taxes</option>
              <option value="condo fee">Condo Fee</option>
              <option value="house/tenant insurance">House/Tenant Insurance</option>
              <option value="cable">Cable</option>
              <option value="cell phone">Cell Phone</option>
              <option value="electricity">Electricity</option>
              <option value="water">Water</option>
              <option value="fuel">Fuel</option>
              <option value="car">Car</option>
              <option value="vehicle insurance">Vehicle Insurance</option>
              <option value="life insurance">Life Insurance</option>
              <option value="bank fees">Bank Fees</option>
              <option value="debt payments">Debt Payments</option>
              <option value="clothing/shoes">Clothing / Shoes</option>
              <option value="health expenses">Health Expenses</option>
              <option value="vet bills">Vet Bills</option>
              <option value="gifts">Gifts</option>
              <option value="vehicle maintenance">Vehicle Maintenance</option>
              <option value="groceries">Groceries</option>
              <option value="fuel vehicle">Fuel / Vehicle</option>
              <option value="public transportation">Public Transportation</option>
              <option value="daycare">Daycare</option>
              <option value="entertainment">Entertainment</option>
              <option value="sports / recreation">Sport / Recreation</option>
              <option value="hair care">Hair Care</option>
              <option value="reading material">Reading Material</option>
              <option value="children's activities">Children's Activities</option>

            </select>
          </div>

        <div class="form-group mt-2 col-sm-8 col-md-8 col-lg-4 width-btn-sm">
           <button type="submit" class="form-control pt-2 pb-2 btn btn-primary">View budget</button>
         </div>
       </div>
    </form>
</div>
</div>
