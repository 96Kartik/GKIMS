<h1 class="page-title">Dashboard</h1>
<div class="main-content">
<div class="row">
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading no-collapse">Summary</div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>City</th>
                  <th>Number of shops</th>
                  <th>Number of users</th>
                </tr>
              </thead>
              <tbody>
		<?php foreach($allShopDetail as $city=>$shopData) { ?>
                <tr>
                  <td><?php echo $shopData['city_name']; ?></td>
                  <td><?php echo $shopData['shop_count'];  ?></td>
                  <td><?php echo $shopData['total_users_shopped']; ?></td>
                </tr>
		<?php } ?>
              </tbody>
            </table>
        </div>
    </div>
    
</div>



            
