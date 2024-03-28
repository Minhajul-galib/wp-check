<?php
/*
Template Name: February
Description: A custom template for the home page.
*/
?>
<!-- <?php global $globaMaindData; ?> -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clifton Group BD</title>

    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
     
    <header class="mb-3 d-md-flex d-block align-items-center justify-content-between text-center">
      <div class="logo mb-3 mb-md-0">
        <a href="/"><img src="<?php echo isset($globaMaindData['Logo_id']) ? $globaMaindData['Logo_id']['url']: ''; ?>" alt=""></a>
      </div>
      <!--<div class="mb-1 mb-md-0">-->
      <!--  <a class='cus-button mb-1' href="https://commitment.cliftongroup.tech/february/">February</a>-->
      <!--  <a class='cus-button mb-1' href="https://commitment.cliftongroup.tech/march/">March</a>-->
      <!--   <a id="logoutButton" class='cus-button mb-1' href="https://commitment.cliftongroup.tech/wp-login.php?action=logout&itsec-hb-token=CheckMytableData&_wpnonce=96316781ec">Logout</a> -->
         

        <!--<button id="logoutButton" class='cus-button mb-1'>Logout</button>-->

      <!--</div>-->
       <div class="menu">
                  <ul class="mb-1 mb-md-0">
                    <?php
                      wp_nav_menu( [
                        'theme_location'                        =>'Home-menu',
                        'container'                             =>'',
                        'menu_css'                              =>'cus-menu-css',
                        'menu_id'                               =>'cus-menu-id'
                      ] )
                    ?>
                  </ul>
        </div>
    </header>
  

    <div id="dataTablePDF" class="main-div">
      
      <div class="cus-div">
      <div class="table-responsive">

        <table id="dataTable" class="dataTable-class table table-bordered border-Secondary">
                  <thead class="table-borderless">
                    <tr>
                      <th class="col-3" scope="col">MATERIAL & PRODUCTION TRACKING</th>
                      <th colspan="6" scope="col" class="text-center"><?php echo isset($globaMaindData['COM_NO']) ? $globaMaindData['COM_NO'] : "" ?></th>

                      <th colspan="3" scope="col" class="text-end">
                        
                        <div class="d-flex gap-3 justify-content-end">
                          <p class="m-0 fw-normal fs-6">DATE: <span id="current-date"></span></p>
                          <p class="m-0 fw-normal fs-6">TIME: <span id="current-time"></span></p>
                        </div>

                      </th>
                    </tr>
                  </thead>

                  
                  <tbody class="table-group-divider">
                    
                    <div class="table-div">

                    <tr>
                      <td class="head-td">MATERIAL ALLOCATION & BALANCE</td>
                      <td class="head-td text-center ">S</td>
                      <td class="head-td text-center ">M</td>
                      <td class="head-td text-center ">L</td>
                      <td class="head-td text-center ">XL</td>
                      <td class="head-td text-center ">XXL</td>
                      <td class="head-td text-center ">XXXL</td>
                      <td class="head-td text-center remove-Rs-border">TOTAL QNTY</td>
                      <td class="head-td text-center remove-Rs-border">DATE</td>
                      <td class="head-td text-center remove-Rs-border">NOTE</td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle d-table-cell align-middle" scope="row">COMMITMENT QUANTITY (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['COMMITMENT_S']) ? $globaMaindData['COMMITMENT_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['COMMITMENT_M']) ? $globaMaindData['COMMITMENT_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['COMMITMENT_L']) ? $globaMaindData['COMMITMENT_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['COMMITMENT_XL']) ? $globaMaindData['COMMITMENT_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['COMMITMENT_XXL']) ? $globaMaindData['COMMITMENT_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['COMMITMENT_XXXL']) ? $globaMaindData['COMMITMENT_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalCommitment = 0;
                          $commitmentFields = ['COMMITMENT_S', 'COMMITMENT_M', 'COMMITMENT_L', 'COMMITMENT_XL', 'COMMITMENT_XXL', 'COMMITMENT_XXXL'];
                          foreach ($commitmentFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalCommitment += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalCommitment;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['COMMITMENT_DATE']) ? $globaMaindData['COMMITMENT_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['COMMITMENT_NOTE']) ? $globaMaindData['COMMITMENT_NOTE'] : 'NOTE '; ?>
                      </td>

                      
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle ">GREIGE FABRIC ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['GREIGE_FABRIC_S']) ? $globaMaindData['GREIGE_FABRIC_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['GREIGE_FABRIC_M']) ? $globaMaindData['GREIGE_FABRIC_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['GREIGE_FABRIC_L']) ? $globaMaindData['GREIGE_FABRIC_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['GREIGE_FABRIC_XL']) ? $globaMaindData['GREIGE_FABRIC_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['GREIGE_FABRIC_XXL']) ? $globaMaindData['GREIGE_FABRIC_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['GREIGE_FABRIC_XXXL']) ? $globaMaindData['GREIGE_FABRIC_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                        $totalGreigeFabric = 0;
                        $greigeFabricFields = ['GREIGE_FABRIC_S', 'GREIGE_FABRIC_M', 'GREIGE_FABRIC_L', 'GREIGE_FABRIC_XL', 'GREIGE_FABRIC_XXL', 'GREIGE_FABRIC_XXXL'];
                        foreach ($greigeFabricFields as $field) {
                            if (isset($globaMaindData[$field])) {
                                $totalGreigeFabric += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                            }
                        }
                        echo $totalGreigeFabric;
                        ?>
                        
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                        $dateGet = isset($globaMaindData['GREIGE_FABRIC_DATE']) ? $globaMaindData['GREIGE_FABRIC_DATE'] : '';
                        if($dateGet){
                          $dateSetUp = strtotime($dateGet);
                          $formateDate = date('d/m/y',$dateSetUp);
                        }else{
                          $dateSetUp = '';
                          
                          $formateDate = $dateSetUp;
                        }
                        echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['GREIGE_FABRIC_NOTE']) ? $globaMaindData['GREIGE_FABRIC_NOTE'] : 'note'; ?>
                      </td>


                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">DYED FABRIC ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['DYED_S']) ? $globaMaindData['DYED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['DYED_M']) ? $globaMaindData['DYED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['DYED_L']) ? $globaMaindData['DYED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['DYED_XL']) ? $globaMaindData['DYED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['DYED_XXL']) ? $globaMaindData['DYED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['DYED_XXXL']) ? $globaMaindData['DYED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalDyed = 0;
                          $dyedFields = ['DYED_S', 'DYED_M', 'DYED_L', 'DYED_XL', 'DYED_XXL', 'DYED_XXXL'];
                          foreach ($dyedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalDyed += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalDyed;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['DYED_DATE']) ? $globaMaindData['DYED_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>
                      
                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['DYED_NOTE']) ? $globaMaindData['DYED_NOTE'] : 'note'; ?>
                      </td>

                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">RFID ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['RFID_S']) ? $globaMaindData['RFID_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['RFID_M']) ? $globaMaindData['RFID_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['RFID_L']) ? $globaMaindData['RFID_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['RFID_XL']) ? $globaMaindData['RFID_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['RFID_XXL']) ? $globaMaindData['RFID_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['RFID_XXXL']) ? $globaMaindData['RFID_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalRFID = 0;
                          $rfidFields = ['RFID_S', 'RFID_M', 'RFID_L', 'RFID_XL', 'RFID_XXL', 'RFID_XXXL'];
                          foreach ($rfidFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalRFID += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalRFID;
                        ?>
                        
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['RFID_DATE']) ? $globaMaindData['RFID_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['RFID_NOTE']) ? $globaMaindData['RFID_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">POLY ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['POLY_S']) ? $globaMaindData['POLY_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['POLY_M']) ? $globaMaindData['POLY_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['POLY_L']) ? $globaMaindData['POLY_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['POLY_XL']) ? $globaMaindData['POLY_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['POLY_XXL']) ? $globaMaindData['POLY_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['POLY_XXXL']) ? $globaMaindData['POLY_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalPoly = 0;
                          $polyFields = ['POLY_S', 'POLY_M', 'POLY_L', 'POLY_XL', 'POLY_XXL', 'POLY_XXXL'];
                          foreach ($polyFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalPoly += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalPoly;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['POLY_DATE']) ? $globaMaindData['POLY_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>
                      

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['POLY_NOTE']) ? $globaMaindData['POLY_NOTE'] : 'note'; ?>               
                      </td>
                    </tr>

                    </div>


                    <tr class="w-100">
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>
                    
                    <tr class="mt-0 w-100">
                      <td class="d-table-cell align-middle " scope="row">GREIGE FABRIC AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_GREIGE_S']) ? $globaMaindData['Sec_GREIGE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_GREIGE_M']) ? $globaMaindData['Sec_GREIGE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_GREIGE_L']) ? $globaMaindData['Sec_GREIGE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_GREIGE_XL']) ? $globaMaindData['Sec_GREIGE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_GREIGE_XXL']) ? $globaMaindData['Sec_GREIGE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_GREIGE_XXXL']) ? $globaMaindData['Sec_GREIGE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalSecGreige = 0;
                          $secGreigeFields = ['Sec_GREIGE_S', 'Sec_GREIGE_M', 'Sec_GREIGE_L', 'Sec_GREIGE_XL', 'Sec_GREIGE_XXL', 'Sec_GREIGE_XXXL'];
                          foreach ($secGreigeFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalSecGreige += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalSecGreige;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['Sec_GREIGE_DATE']) ? $globaMaindData['Sec_GREIGE_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['Sec_GREIGE_NOTE']) ? $globaMaindData['Sec_GREIGE_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">DYED FABRIC AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_DYED_S']) ? $globaMaindData['Sec_DYED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_DYED_M']) ? $globaMaindData['Sec_DYED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_DYED_L']) ? $globaMaindData['Sec_DYED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_DYED_XL']) ? $globaMaindData['Sec_DYED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_DYED_XXL']) ? $globaMaindData['Sec_DYED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_DYED_XXXL']) ? $globaMaindData['Sec_DYED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php
                          $totalSecDyed = 0;
                          $secDyedFields = ['Sec_DYED_S', 'Sec_DYED_M', 'Sec_DYED_L', 'Sec_DYED_XL', 'Sec_DYED_XXL', 'Sec_DYED_XXXL'];
                          foreach ($secDyedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalSecDyed += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalSecDyed;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                        $dateGet = isset($globaMaindData['Sec_DYED_DATE']) ? $globaMaindData['Sec_DYED_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : ''; 
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['Sec_DYED_NOTE']) ? $globaMaindData['Sec_DYED_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                    
                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">RFID AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_RFID_S']) ? $globaMaindData['Sec_RFID_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_RFID_M']) ? $globaMaindData['Sec_RFID_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_RFID_L']) ? $globaMaindData['Sec_RFID_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_RFID_XL']) ? $globaMaindData['Sec_RFID_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_RFID_XXL']) ? $globaMaindData['Sec_RFID_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_RFID_XXXL']) ? $globaMaindData['Sec_RFID_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalSecRFID = 0;
                          $secRFIDFields = ['Sec_RFID_S', 'Sec_RFID_M', 'Sec_RFID_L', 'Sec_RFID_XL', 'Sec_RFID_XXL', 'Sec_RFID_XXXL'];
                          foreach ($secRFIDFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalSecRFID += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalSecRFID;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['Sec_RFID_DATE']) ? $globaMaindData['Sec_RFID_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['Sec_RFID_NOTE']) ? $globaMaindData['Sec_RFID_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                    
                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">POLY AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_POLY_S']) ? $globaMaindData['Sec_POLY_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_POLY_M']) ? $globaMaindData['Sec_POLY_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_POLY_L']) ? $globaMaindData['Sec_POLY_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_POLY_XL']) ? $globaMaindData['Sec_POLY_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_POLY_XXL']) ? $globaMaindData['Sec_POLY_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Sec_POLY_XXXL']) ? $globaMaindData['Sec_POLY_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalSecPoly = 0;
                          $secPolyFields = ['Sec_POLY_S', 'Sec_POLY_M', 'Sec_POLY_L', 'Sec_POLY_XL', 'Sec_POLY_XXL', 'Sec_POLY_XXXL'];
                          foreach ($secPolyFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalSecPoly += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalSecPoly;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['Sec_POLY_DATE']) ? $globaMaindData['Sec_POLY_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>


                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['Sec_POLY_NOTE']) ? $globaMaindData['Sec_POLY_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>



                    <tr class="w-100">
                      <td class="head-td " scope="row">PRODUCTION PARTICULARS</td>
                      <td class="head-td text-center col-1">S</td>
                      <td class="head-td text-center col-1">M</td>
                      <td class="head-td text-center col-1">L</td>
                      <td class="head-td text-center col-1">XL</td>
                      <td class="head-td text-center col-1">XXL</td>
                      <td class="head-td text-center col-1">XXXL</td>
                      <td class="head-td text-center remove-Rs-border">Total Qnty</td>
                      <td class="head-td text-center remove-Rs-border">DATE</td>
                      <td class="head-td text-center remove-Rs-border">NOTE</td>
                    </tr>


                    <tr class="w-100">
                      <td class="d-table-cell align-middle ">CUTTING COMPLETED (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_COMPLETED_S']) ? $globaMaindData['CUTTING_COMPLETED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_COMPLETED_M']) ? $globaMaindData['CUTTING_COMPLETED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_COMPLETED_L']) ? $globaMaindData['CUTTING_COMPLETED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_COMPLETED_XL']) ? $globaMaindData['CUTTING_COMPLETED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_COMPLETED_XXL']) ? $globaMaindData['CUTTING_COMPLETED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_COMPLETED_XXXL']) ? $globaMaindData['CUTTING_COMPLETED_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalCuttingCompleted = 0;
                          $cuttingCompletedFields = ['CUTTING_COMPLETED_S', 'CUTTING_COMPLETED_M', 'CUTTING_COMPLETED_L', 'CUTTING_COMPLETED_XL', 'CUTTING_COMPLETED_XXL', 'CUTTING_COMPLETED_XXXL'];
                          foreach ($cuttingCompletedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalCuttingCompleted += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalCuttingCompleted;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['CUTTING_COMPLETED_DATE']) ? $globaMaindData['CUTTING_COMPLETED_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>


                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['CUTTING_COMPLETED_NOTE']) ? $globaMaindData['CUTTING_COMPLETED_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">CUTTING BALANCE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_BALANCE_S']) ? $globaMaindData['CUTTING_BALANCE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_BALANCE_M']) ? $globaMaindData['CUTTING_BALANCE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_BALANCE_L']) ? $globaMaindData['CUTTING_BALANCE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_BALANCE_XL']) ? $globaMaindData['CUTTING_BALANCE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_BALANCE_XXL']) ? $globaMaindData['CUTTING_BALANCE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['CUTTING_BALANCE_XXXL']) ? $globaMaindData['CUTTING_BALANCE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalCuttingBalance = 0;
                          $cuttingBalanceFields = ['CUTTING_BALANCE_S', 'CUTTING_BALANCE_M', 'CUTTING_BALANCE_L', 'CUTTING_BALANCE_XL', 'CUTTING_BALANCE_XXL', 'CUTTING_BALANCE_XXXL'];
                          foreach ($cuttingBalanceFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalCuttingBalance += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalCuttingBalance;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['CUTTING_BALANCE_DATE']) ? $globaMaindData['CUTTING_BALANCE_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['CUTTING_BALANCE_NOTE']) ? $globaMaindData['CUTTING_BALANCE_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">SEWING COMPLETED (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_COMPLETED_S']) ? $globaMaindData['SEWING_COMPLETED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_COMPLETED_M']) ? $globaMaindData['SEWING_COMPLETED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_COMPLETED_L']) ? $globaMaindData['SEWING_COMPLETED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_COMPLETED_XL']) ? $globaMaindData['SEWING_COMPLETED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_COMPLETED_XXL']) ? $globaMaindData['SEWING_COMPLETED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_COMPLETED_XXXL']) ? $globaMaindData['SEWING_COMPLETED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php
                        $totalSewingCompleted = 0;
                        $sewingCompletedFields = ['SEWING_COMPLETED_S', 'SEWING_COMPLETED_M', 'SEWING_COMPLETED_L', 'SEWING_COMPLETED_XL', 'SEWING_COMPLETED_XXL', 'SEWING_COMPLETED_XXXL'];
                        foreach ($sewingCompletedFields as $field) {
                            if (isset($globaMaindData[$field])) {
                                $totalSewingCompleted += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                            }
                        }
                        echo $totalSewingCompleted;

                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                        $dateGet = isset($globaMaindData['SEWING_COMPLETED_DATE']) ? $globaMaindData['SEWING_COMPLETED_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['SEWING_COMPLETED_NOTE']) ? $globaMaindData['SEWING_COMPLETED_NOTE'] : 'note'; ?>
                      </td>

                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">SEWING BALANCE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_BALANCE_S']) ? $globaMaindData['SEWING_BALANCE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_BALANCE_M']) ? $globaMaindData['SEWING_BALANCE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_BALANCE_L']) ? $globaMaindData['SEWING_BALANCE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_BALANCE_XL']) ? $globaMaindData['SEWING_BALANCE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_BALANCE_XXL']) ? $globaMaindData['SEWING_BALANCE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['SEWING_BALANCE_XXXL']) ? $globaMaindData['SEWING_BALANCE_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalSewingBalance = 0;
                          $sewingBalanceFields = ['SEWING_BALANCE_S', 'SEWING_BALANCE_M', 'SEWING_BALANCE_L', 'SEWING_BALANCE_XL', 'SEWING_BALANCE_XXL', 'SEWING_BALANCE_XXXL'];
                          foreach ($sewingBalanceFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalSewingBalance += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalSewingBalance;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['SEWING_BALANCE_DATE']) ? $globaMaindData['SEWING_BALANCE_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['SEWING_BALANCE_NOTE']) ? $globaMaindData['SEWING_BALANCE_NOTE'] : 'note'; ?>
                      </td>

                    </tr>


                    <tr>
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>


                    <tr style="border-bottom-color: #9059FF;" class="w-100">
                      <td class="head-second-td" scope="row">PO ALLOCATION</td>
                      <td class="head-second-td text-center col-1 remove-Bm-border">S</td>
                      <td class="head-second-td text-center col-1 remove-Bm-border">M</td>
                      <td class="head-second-td text-center col-1 remove-Bm-border">L</td>
                      <td class="head-second-td text-center col-1 remove-Bm-border">XL</td>
                      <td class="head-second-td text-center col-1 remove-Bm-border">XXL</td>
                      <td class="head-second-td text-center col-1 remove-Bm-border">XXXL</td>
                      <td class="head-second-td text-center remove-Bm-border">Total Qnty</td>
                      <td class="head-second-td text-center remove-Bm-border">DATE</td>
                      <td class="head-second-td text-center remove-Bm-border remove-Rs-border">NOTE</td>

                    </tr>


                    <tr class="remove-Tp-border w-100">
                    <td colspan="1" class="inner-table">
                      <table class="table table-bordered ">
                        <tr>
                          <td style="height: 40px; width: 33.33%;" class="text-center remove-Tp-border remove-Ls-border sub-td-bg">PO NO</td>
                          <td style="height: 40px; width: 33.33%;" class="text-center remove-Tp-border sub-td-bg">Style No</td>
                          <td style="height: 40px; width: 33.33%;" class="text-center remove-Rs-border remove-Tp-border sub-td-bg">Colour</td>
                        </tr>
                      </table>
                    </td>
                    
                    <td colspan="remove-Tp-border" class="head-second-td text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td remove-Rs-border text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td remove-Rs-border text-center"></td>
                    <td colspan="remove-Tp-border" class="head-second-td remove-Rs-border text-center"></td>

                    </tr>


                    <tr class="w-100">
                      <td colspan="1" class="inner-table">
                        <table class="table table-bordered ">
                          <tr>
                            <td style="height: 40px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['PO_NO_id']) ? $globaMaindData['PO_NO_id'] : ""; ?></td>
                            <td style="height: 40px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['Style_No_id']) ? $globaMaindData['Style_No_id'] : ""; ?></td>
                            <td style="height: 40px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['Colour_id']) ? $globaMaindData['Colour_id'] : ""; ?></td>
                          </tr>
                        </table>
                      </td>


                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PO_ALLOCATION_S']) ? $globaMaindData['PO_ALLOCATION_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PO_ALLOCATION_M']) ? $globaMaindData['PO_ALLOCATION_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PO_ALLOCATION_L']) ? $globaMaindData['PO_ALLOCATION_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PO_ALLOCATION_XL']) ? $globaMaindData['PO_ALLOCATION_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PO_ALLOCATION_XXL']) ? $globaMaindData['PO_ALLOCATION_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PO_ALLOCATION_XXXL']) ? $globaMaindData['PO_ALLOCATION_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalPOAllocation = 0;
                          $poAllocationFields = ['PO_ALLOCATION_S', 'PO_ALLOCATION_M', 'PO_ALLOCATION_L', 'PO_ALLOCATION_XL', 'PO_ALLOCATION_XXL', 'PO_ALLOCATION_XXXL'];
                          foreach ($poAllocationFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalPOAllocation += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalPOAllocation;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['PO_ALLOCATION_DATE']) ? $globaMaindData['PO_ALLOCATION_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['PO_ALLOCATION_NOTE']) ? $globaMaindData['PO_ALLOCATION_NOTE'] : 'note'; ?>                      
                      </td>


                    </tr>
                  
                    <tr class="w-100">
                      <td class="head-second-td d-table-cell align-middle" scope="row">Total Allocated To PO Qnty (Pcs)</td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Total_Allocated_S']) ? $globaMaindData['Total_Allocated_S'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Total_Allocated_M']) ? $globaMaindData['Total_Allocated_M'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Total_Allocated_L']) ? $globaMaindData['Total_Allocated_L'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Total_Allocated_XL']) ? $globaMaindData['Total_Allocated_XL'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Total_Allocated_XXL']) ? $globaMaindData['Total_Allocated_XXL'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['Total_Allocated_XXXL']) ? $globaMaindData['Total_Allocated_XXXL'] : 0; ?></td>

                      <td class="head-second-td d-table-cell align-middle text-center">
                        <?php 
                          $totalAllocated = 0;
                          $totalAllocatedFields = ['Total_Allocated_S', 'Total_Allocated_M', 'Total_Allocated_L', 'Total_Allocated_XL', 'Total_Allocated_XXL', 'Total_Allocated_XXXL'];
                          foreach ($totalAllocatedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAllocated += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAllocated;
                        ?>
                      </td>

                      <td class="head-second-td d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['Total_Allocated_DATE']) ? $globaMaindData['Total_Allocated_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center head-second-td">
                        <?php echo isset($globaMaindData['Total_Allocated_NOTE']) ? $globaMaindData['Total_Allocated_NOTE'] : 'note'; ?>
                      </td>

                    </tr>

                    <tr>
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>

                    <tr style="border-bottom-color: #707070;" class="w-100">
                      <td class="head-third-td" scope="row">PACKING PARTICULARS</td>
                      <td class="head-third-td text-center col-1 remove-Bm-border">S</td>
                      <td class="head-third-td text-center col-1 remove-Bm-border">M</td>
                      <td class="head-third-td text-center col-1 remove-Bm-border">L</td>
                      <td class="head-third-td text-center col-1 remove-Bm-border">XL</td>
                      <td class="head-third-td text-center col-1 remove-Bm-border">XXL</td>
                      <td class="head-third-td text-center col-1 remove-Bm-border">XXXL</td>
                      <td class="head-third-td text-center remove-Bm-border remove-Rs-border">Total Qnty</td>
                      <td class="head-third-td text-center remove-Bm-border remove-Rs-border">DATE</td>
                      <td class="head-third-td text-center remove-Bm-border remove-Rs-border">NOTE</td>
                    </tr>

                    <!-- setup 3 column po style color  -->

                    <tr class="remove-Tp-border w-100">
                      <td colspan="1" class="inner-table">
                      <table class="table table-bordered ">
                        <tr>
                          <td style="height: 40px; width: 33.33%;" class="text-center remove-Tp-border remove-Ls-border sub-td-bg">PO No</td>
                          <td style="height: 40px; width: 33.33%;" class="text-center remove-Tp-border sub-td-bg">Style No</td>
                          <td style="height: 40px; width: 33.33%;" class="text-center remove-Rs-border remove-Tp-border sub-td-bg">Colour</td>
                        </tr>
                      </table>
                      </td>
                      
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td"></td>
                      <td colspan="remove-Tp-border" class="head-third-td remove-Rs-border"></td>

                    </tr>

                    <!-- ------------------------------------------------------- -->
                      

                    
                    <tr class="w-100">
                      <td colspan="1" class="inner-table">
                        <table class="table table-bordered ">
                          <tr>
                            <td style="height: 40px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_PO_NO_id']) ? $globaMaindData['PACKING_PARTICULARS_PO_NO_id'] : 0; ?></td>
                            <td style="height: 40px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_Style_No_id']) ? $globaMaindData['PACKING_PARTICULARS_Style_No_id'] : 0; ?></td>
                            <td style="height: 40px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_Colour_id']) ? $globaMaindData['PACKING_PARTICULARS_Colour_id'] : 0; ?></td>
                          </tr>
                        </table>
                      </td>


                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_S']) ? $globaMaindData['PACKING_PARTICULARS_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_M']) ? $globaMaindData['PACKING_PARTICULARS_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_L']) ? $globaMaindData['PACKING_PARTICULARS_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_XL']) ? $globaMaindData['PACKING_PARTICULARS_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_XXL']) ? $globaMaindData['PACKING_PARTICULARS_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['PACKING_PARTICULARS_XXXL']) ? $globaMaindData['PACKING_PARTICULARS_XXXL'] : 0; ?></td>
                     
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalPackingParticulars = 0;
                          $totalPackingParticularsFields = ['PACKING_PARTICULARS_S', 'PACKING_PARTICULARS_M', 'PACKING_PARTICULARS_L', 'PACKING_PARTICULARS_XL', 'PACKING_PARTICULARS_XXL', 'PACKING_PARTICULARS_XXXL'];
                          foreach ($totalPackingParticularsFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalPackingParticulars += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalPackingParticulars;
                          ?>
                      
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['PACKING_PARTICULARS_DATE']) ? $globaMaindData['PACKING_PARTICULARS_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center">
                        <?php echo isset($globaMaindData['PACKING_PARTICULARS_NOTE']) ? $globaMaindData['PACKING_PARTICULARS_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                  



                    <tr class="w-100">
                      <td scope="row" class="head-second-td d-table-cell align-middle">Total Packed Quantity (Pcs)</td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['Total_Packed_Quantity_S']) ? $globaMaindData['Total_Packed_Quantity_S'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['Total_Packed_Quantity_M']) ? $globaMaindData['Total_Packed_Quantity_M'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['Total_Packed_Quantity_L']) ? $globaMaindData['Total_Packed_Quantity_L'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['Total_Packed_Quantity_XL']) ? $globaMaindData['Total_Packed_Quantity_XL'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['Total_Packed_Quantity_XXL']) ? $globaMaindData['Total_Packed_Quantity_XXL'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['Total_Packed_Quantity_XXXL']) ? $globaMaindData['Total_Packed_Quantity_XXXL'] : 0; ?></td>

                      <td class="text-center head-second-td d-table-cell align-middle">
                        <?php 
                         $totalPackedQuantity = 0;
                         $totalPackedQuantityFields = ['Total_Packed_Quantity_S', 'Total_Packed_Quantity_M', 'Total_Packed_Quantity_L', 'Total_Packed_Quantity_XL', 'Total_Packed_Quantity_XXL', 'Total_Packed_Quantity_XXXL'];
                         foreach ($totalPackedQuantityFields as $field) {
                             if (isset($globaMaindData[$field])) {
                                 $totalPackedQuantity += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                             }
                         }
                         echo $totalPackedQuantity;
                        ?>
                      </td>
                      
                      <td class="text-center head-second-td d-table-cell align-middle">
                        <?php 
                          $dateGet = isset($globaMaindData['Total_Packed_Quantity_DATE']) ? $globaMaindData['Total_Packed_Quantity_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center head-second-td">
                        <?php echo isset($globaMaindData['Total_Packed_Quantity_NOTE']) ? $globaMaindData['Total_Packed_Quantity_NOTE'] : 'note'; ?>                  
                      </td>
                    </tr>

                    <tr>
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle head-fourth-td" scope="row">AVAILABLE GMTS TO ISSUE PO (PCS)</td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['AVAILABLE_GMTS_S']) ? $globaMaindData['AVAILABLE_GMTS_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['AVAILABLE_GMTS_M']) ? $globaMaindData['AVAILABLE_GMTS_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['AVAILABLE_GMTS_L']) ? $globaMaindData['AVAILABLE_GMTS_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['AVAILABLE_GMTS_XL']) ? $globaMaindData['AVAILABLE_GMTS_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['AVAILABLE_GMTS_XXL']) ? $globaMaindData['AVAILABLE_GMTS_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['AVAILABLE_GMTS_XXXL']) ? $globaMaindData['AVAILABLE_GMTS_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center head-fourth-td">
                        <?php 
                          $totalAvailableGMTS = 0;
                          $totalAvailableGMTSFields = ['AVAILABLE_GMTS_S', 'AVAILABLE_GMTS_M', 'AVAILABLE_GMTS_L', 'AVAILABLE_GMTS_XL', 'AVAILABLE_GMTS_XXL', 'AVAILABLE_GMTS_XXXL'];
                          foreach ($totalAvailableGMTSFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAvailableGMTS += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAvailableGMTS;
                        ?>
                        
                      </td>

                      <td class="d-table-cell align-middle text-center head-fourth-td">
                        <?php 
                        $dateGet = isset($globaMaindData['AVAILABLE_GMTS_DATE']) ? $globaMaindData['AVAILABLE_GMTS_DATE'] : '';
                          if($dateGet){
                            $dateSetUp = strtotime($dateGet);
                            $formateDate = date('d/m/y',$dateSetUp);
                          }else{
                            $dateSetUp = '';
                            
                            $formateDate = $dateSetUp;
                          }
                          echo isset($formateDate)? $formateDate : '';
                        ?>
                      </td>

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center head-fourth-td">
                        <?php echo isset($globaMaindData['AVAILABLE_GMTS_NOTE']) ? $globaMaindData['AVAILABLE_GMTS_NOTE'] : 'note'; ?>
                    
                      </td>
                    </tr>
                  
                    
                  </tbody>
          </table>
        </div>
      </div>

   

    </div>

   
    <div class="btn-div pt-1 px-4 mb-5 d-flex gap-3 justify-content-md-end justify-content-center">
      <button class="cus-button" onclick="downloadTableAsXLSX()">Download as XLSX</button>
      <button class="cus-button" onclick="downloadTableAsPDF()">Download as PDF</button>
    </div>
    

    <footer style="background-color: #171A7C;" class="p-3">
      <p style="color: #444444;" class="m-0 text-center fs-6"> &copy; Copyrights <?php echo date('Y'); ?> All Rights Reserved.</p>
    </footer>
    
    <?php wp_footer();?>
</body>
</html>
