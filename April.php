<?php
/*
Template Name: April
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
                      <th colspan="6" scope="col" class="text-center"><?php echo isset($globaMaindData['April_COM_NO']) ? $globaMaindData['April_COM_NO'] : "" ?></th>
                      
                      <th colspan="3" scope="col" class="text-end">
                        
                        <div class="d-flex gap-2 justify-content-end">
                          
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
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_COMMITMENT_S']) ? $globaMaindData['April_COMMITMENT_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_COMMITMENT_M']) ? $globaMaindData['April_COMMITMENT_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_COMMITMENT_L']) ? $globaMaindData['April_COMMITMENT_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_COMMITMENT_XL']) ? $globaMaindData['April_COMMITMENT_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_COMMITMENT_XXL']) ? $globaMaindData['April_COMMITMENT_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_COMMITMENT_XXXL']) ? $globaMaindData['April_COMMITMENT_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilCommitment = 0;
                          $totalAprilCommitmentFields = ['April_COMMITMENT_S', 'April_COMMITMENT_M', 'April_COMMITMENT_L', 'April_COMMITMENT_XL', 'April_COMMITMENT_XXL', 'April_COMMITMENT_XXXL'];
                          foreach ($totalAprilCommitmentFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilCommitment += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilCommitment;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_COMMITMENT_DATE']) ? $globaMaindData['April_COMMITMENT_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_COMMITMENT_NOTE']) ? $globaMaindData['April_COMMITMENT_NOTE'] : 'NOTE '; ?>                  
                      </td>

                      
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle ">GREIGE FABRIC ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_GREIGE_FABRIC_S']) ? $globaMaindData['April_GREIGE_FABRIC_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_GREIGE_FABRIC_M']) ? $globaMaindData['April_GREIGE_FABRIC_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_GREIGE_FABRIC_L']) ? $globaMaindData['April_GREIGE_FABRIC_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_GREIGE_FABRIC_XL']) ? $globaMaindData['April_GREIGE_FABRIC_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_GREIGE_FABRIC_XXL']) ? $globaMaindData['April_GREIGE_FABRIC_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_GREIGE_FABRIC_XXXL']) ? $globaMaindData['April_GREIGE_FABRIC_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                        $totalAprilGreigeFabric = 0;
                        $totalAprilGreigeFabricFields = ['April_GREIGE_FABRIC_S', 'April_GREIGE_FABRIC_M', 'April_GREIGE_FABRIC_L', 'April_GREIGE_FABRIC_XL', 'April_GREIGE_FABRIC_XXL', 'April_GREIGE_FABRIC_XXXL'];
                        foreach ($totalAprilGreigeFabricFields as $field) {
                            if (isset($globaMaindData[$field])) {
                                $totalAprilGreigeFabric += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                            }
                        }
                        echo $totalAprilGreigeFabric;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_GREIGE_FABRIC_DATE']) ? $globaMaindData['April_GREIGE_FABRIC_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_GREIGE_FABRIC_NOTE']) ? $globaMaindData['April_GREIGE_FABRIC_NOTE'] : 'note'; ?>
                      </td>


                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">DYED FABRIC ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_DYED_S']) ? $globaMaindData['April_DYED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_DYED_M']) ? $globaMaindData['April_DYED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_DYED_L']) ? $globaMaindData['April_DYED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_DYED_XL']) ? $globaMaindData['April_DYED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_DYED_XXL']) ? $globaMaindData['April_DYED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_DYED_XXXL']) ? $globaMaindData['April_DYED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilDyed = 0;
                          $totalAprilDyedFields = ['April_DYED_S', 'April_DYED_M', 'April_DYED_L', 'April_DYED_XL', 'April_DYED_XXL', 'April_DYED_XXXL'];
                          foreach ($totalAprilDyedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilDyed += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilDyed;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_DYED_DATE']) ? $globaMaindData['April_DYED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_DYED_NOTE']) ? $globaMaindData['April_DYED_NOTE'] : 'note'; ?>
                      </td>

                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">RFID ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_RFID_S']) ? $globaMaindData['April_RFID_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_RFID_M']) ? $globaMaindData['April_RFID_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_RFID_L']) ? $globaMaindData['April_RFID_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_RFID_XL']) ? $globaMaindData['April_RFID_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_RFID_XXL']) ? $globaMaindData['April_RFID_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_RFID_XXXL']) ? $globaMaindData['April_RFID_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                         $totalAprilRFID = 0;
                         $totalAprilRFIDFields = ['April_RFID_S', 'April_RFID_M', 'April_RFID_L', 'April_RFID_XL', 'April_RFID_XXL', 'April_RFID_XXXL'];
                         foreach ($totalAprilRFIDFields as $field) {
                             if (isset($globaMaindData[$field])) {
                                 $totalAprilRFID += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                             }
                         }
                         echo $totalAprilRFID;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_RFID_DATE']) ? $globaMaindData['April_RFID_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_RFID_NOTE']) ? $globaMaindData['April_RFID_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">POLY ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_POLY_S']) ? $globaMaindData['April_POLY_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_POLY_M']) ? $globaMaindData['April_POLY_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_POLY_L']) ? $globaMaindData['April_POLY_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_POLY_XL']) ? $globaMaindData['April_POLY_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_POLY_XXL']) ? $globaMaindData['April_POLY_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_POLY_XXXL']) ? $globaMaindData['April_POLY_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilPOLY = 0;
                          $totalAprilPOLYFields = ['April_POLY_S', 'April_POLY_M', 'April_POLY_L', 'April_POLY_XL', 'April_POLY_XXL', 'April_POLY_XXXL'];
                          foreach ($totalAprilPOLYFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilPOLY += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilPOLY;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_POLY_DATE']) ? $globaMaindData['April_POLY_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_POLY_NOTE']) ? $globaMaindData['April_POLY_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    </div>


                    <tr class="w-100">
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>
                    
                    <tr class="mt-0 w-100">
                      <td class="d-table-cell align-middle " scope="row">GREIGE FABRIC AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_GREIGE_S']) ? $globaMaindData['April_Sec_GREIGE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_GREIGE_M']) ? $globaMaindData['April_Sec_GREIGE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_GREIGE_L']) ? $globaMaindData['April_Sec_GREIGE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_GREIGE_XL']) ? $globaMaindData['April_Sec_GREIGE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_GREIGE_XXL']) ? $globaMaindData['April_Sec_GREIGE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_GREIGE_XXXL']) ? $globaMaindData['April_Sec_GREIGE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilSecGREIGE = 0;
                          $totalAprilSecGREIGEFields = ['April_Sec_GREIGE_S', 'April_Sec_GREIGE_M', 'April_Sec_GREIGE_L', 'April_Sec_GREIGE_XL', 'April_Sec_GREIGE_XXL', 'April_Sec_GREIGE_XXXL'];
                          foreach ($totalAprilSecGREIGEFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilSecGREIGE += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          } 
                          echo $totalAprilSecGREIGE;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_Sec_GREIGE_DATE']) ? $globaMaindData['April_Sec_GREIGE_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_Sec_GREIGE_NOTE']) ? $globaMaindData['April_Sec_GREIGE_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">DYED FABRIC AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_DYED_S']) ? $globaMaindData['April_Sec_DYED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_DYED_M']) ? $globaMaindData['April_Sec_DYED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_DYED_L']) ? $globaMaindData['April_Sec_DYED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_DYED_XL']) ? $globaMaindData['April_Sec_DYED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_DYED_XXL']) ? $globaMaindData['April_Sec_DYED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_DYED_XXXL']) ? $globaMaindData['April_Sec_DYED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilSecDYED = 0;
                          $totalAprilSecDYEDFields = ['April_Sec_DYED_S', 'April_Sec_DYED_M', 'April_Sec_DYED_L', 'April_Sec_DYED_XL', 'April_Sec_DYED_XXL', 'April_Sec_DYED_XXXL'];
                          foreach ($totalAprilSecDYEDFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilSecDYED += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilSecDYED;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_Sec_DYED_DATE']) ? $globaMaindData['April_Sec_DYED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_Sec_DYED_NOTE']) ? $globaMaindData['April_Sec_DYED_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                    
                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">RFID AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_RFID_S']) ? $globaMaindData['April_Sec_RFID_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_RFID_M']) ? $globaMaindData['April_Sec_RFID_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_RFID_L']) ? $globaMaindData['April_Sec_RFID_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_RFID_XL']) ? $globaMaindData['April_Sec_RFID_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_RFID_XXL']) ? $globaMaindData['April_Sec_RFID_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_RFID_XXXL']) ? $globaMaindData['April_Sec_RFID_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilSecRFID = 0;
                          $totalAprilSecRFIDFields = ['April_Sec_RFID_S', 'April_Sec_RFID_M', 'April_Sec_RFID_L', 'April_Sec_RFID_XL', 'April_Sec_RFID_XXL', 'April_Sec_RFID_XXXL'];
                          foreach ($totalAprilSecRFIDFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilSecRFID += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilSecRFID;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_Sec_RFID_DATE']) ? $globaMaindData['April_Sec_RFID_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_Sec_RFID_NOTE']) ? $globaMaindData['April_Sec_RFID_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                    
                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">POLY AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_POLY_S']) ? $globaMaindData['April_Sec_POLY_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_POLY_M']) ? $globaMaindData['April_Sec_POLY_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_POLY_L']) ? $globaMaindData['April_Sec_POLY_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_POLY_XL']) ? $globaMaindData['April_Sec_POLY_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_POLY_XXL']) ? $globaMaindData['April_Sec_POLY_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Sec_POLY_XXXL']) ? $globaMaindData['April_Sec_POLY_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                         
                         $totalAprilSecPOLY = 0;
                         $totalAprilSecPOLYFields = ['April_Sec_POLY_S', 'April_Sec_POLY_M', 'April_Sec_POLY_L', 'April_Sec_POLY_XL', 'April_Sec_POLY_XXL', 'April_Sec_POLY_XXXL'];
                         foreach ($totalAprilSecPOLYFields as $field) {
                             if (isset($globaMaindData[$field])) {
                                 $totalAprilSecPOLY += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                             }
                         }
                         echo $totalAprilSecPOLY;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_Sec_POLY_DATE']) ? $globaMaindData['April_Sec_POLY_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_Sec_POLY_NOTE']) ? $globaMaindData['April_Sec_POLY_NOTE'] : 'note'; ?>
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
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_COMPLETED_S']) ? $globaMaindData['April_CUTTING_COMPLETED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_COMPLETED_M']) ? $globaMaindData['April_CUTTING_COMPLETED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_COMPLETED_L']) ? $globaMaindData['April_CUTTING_COMPLETED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_COMPLETED_XL']) ? $globaMaindData['April_CUTTING_COMPLETED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_COMPLETED_XXL']) ? $globaMaindData['April_CUTTING_COMPLETED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_COMPLETED_XXXL']) ? $globaMaindData['April_CUTTING_COMPLETED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                         $totalAprilCuttingCompleted = 0;
                         $totalAprilCuttingCompletedFields = ['April_CUTTING_COMPLETED_S', 'April_CUTTING_COMPLETED_M', 'April_CUTTING_COMPLETED_L', 'April_CUTTING_COMPLETED_XL', 'April_CUTTING_COMPLETED_XXL', 'April_CUTTING_COMPLETED_XXXL'];
                         foreach ($totalAprilCuttingCompletedFields as $field) {
                             if (isset($globaMaindData[$field])) {
                                 $totalAprilCuttingCompleted += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                             }
                         }
                         echo $totalAprilCuttingCompleted;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_CUTTING_COMPLETED_DATE']) ? $globaMaindData['April_CUTTING_COMPLETED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_CUTTING_COMPLETED_NOTE']) ? $globaMaindData['April_CUTTING_COMPLETED_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">CUTTING BALANCE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_BALANCE_S']) ? $globaMaindData['April_CUTTING_BALANCE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_BALANCE_M']) ? $globaMaindData['April_CUTTING_BALANCE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_BALANCE_L']) ? $globaMaindData['April_CUTTING_BALANCE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_BALANCE_XL']) ? $globaMaindData['April_CUTTING_BALANCE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_BALANCE_XXL']) ? $globaMaindData['April_CUTTING_BALANCE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_CUTTING_BALANCE_XXXL']) ? $globaMaindData['April_CUTTING_BALANCE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilCuttingBalance = 0;
                          $totalAprilCuttingBalanceFields = ['April_CUTTING_BALANCE_S', 'April_CUTTING_BALANCE_M', 'April_CUTTING_BALANCE_L', 'April_CUTTING_BALANCE_XL', 'April_CUTTING_BALANCE_XXL', 'April_CUTTING_BALANCE_XXXL'];
                          foreach ($totalAprilCuttingBalanceFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilCuttingBalance += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilCuttingBalance;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_CUTTING_BALANCE_DATE']) ? $globaMaindData['April_CUTTING_BALANCE_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_CUTTING_BALANCE_NOTE']) ? $globaMaindData['April_CUTTING_BALANCE_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">SEWING COMPLETED (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_COMPLETED_S']) ? $globaMaindData['April_SEWING_COMPLETED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_COMPLETED_M']) ? $globaMaindData['April_SEWING_COMPLETED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_COMPLETED_L']) ? $globaMaindData['April_SEWING_COMPLETED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_COMPLETED_XL']) ? $globaMaindData['April_SEWING_COMPLETED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_COMPLETED_XXL']) ? $globaMaindData['April_SEWING_COMPLETED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_COMPLETED_XXXL']) ? $globaMaindData['April_SEWING_COMPLETED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilSewingCompleted = 0;
                          $totalAprilSewingCompletedFields = ['April_SEWING_COMPLETED_S', 'April_SEWING_COMPLETED_M', 'April_SEWING_COMPLETED_L', 'April_SEWING_COMPLETED_XL', 'April_SEWING_COMPLETED_XXL', 'April_SEWING_COMPLETED_XXXL'];
                          foreach ($totalAprilSewingCompletedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilSewingCompleted += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilSewingCompleted;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_SEWING_COMPLETED_DATE']) ? $globaMaindData['April_SEWING_COMPLETED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_SEWING_COMPLETED_NOTE']) ? $globaMaindData['April_SEWING_COMPLETED_NOTE'] : 'note'; ?>
                      </td>

                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">SEWING BALANCE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_BALANCE_S']) ? $globaMaindData['April_SEWING_BALANCE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_BALANCE_M']) ? $globaMaindData['April_SEWING_BALANCE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_BALANCE_L']) ? $globaMaindData['April_SEWING_BALANCE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_BALANCE_XL']) ? $globaMaindData['April_SEWING_BALANCE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_BALANCE_XXL']) ? $globaMaindData['April_SEWING_BALANCE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_SEWING_BALANCE_XXXL']) ? $globaMaindData['April_SEWING_BALANCE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilSewingBalance = 0;
                          $totalAprilSewingBalanceFields = ['April_SEWING_BALANCE_S', 'April_SEWING_BALANCE_M', 'April_SEWING_BALANCE_L', 'April_SEWING_BALANCE_XL', 'April_SEWING_BALANCE_XXL', 'April_SEWING_BALANCE_XXXL'];
                          foreach ($totalAprilSewingBalanceFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilSewingBalance += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilSewingBalance;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_SEWING_BALANCE_DATE']) ? $globaMaindData['April_SEWING_BALANCE_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_SEWING_BALANCE_NOTE']) ? $globaMaindData['April_SEWING_BALANCE_NOTE'] : 'note'; ?>
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
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['April_PO_NO_id']) ? $globaMaindData['April_PO_NO_id'] : ""; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['April_Style_No_id']) ? $globaMaindData['April_Style_No_id'] : ""; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['April_Colour_id']) ? $globaMaindData['April_Colour_id'] : ""; ?></td>
                          </tr>
                        </table>
                      </td>


                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PO_ALLOCATION_S']) ? $globaMaindData['April_PO_ALLOCATION_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PO_ALLOCATION_M']) ? $globaMaindData['April_PO_ALLOCATION_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PO_ALLOCATION_L']) ? $globaMaindData['April_PO_ALLOCATION_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PO_ALLOCATION_XL']) ? $globaMaindData['April_PO_ALLOCATION_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PO_ALLOCATION_XXL']) ? $globaMaindData['April_PO_ALLOCATION_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PO_ALLOCATION_XXXL']) ? $globaMaindData['April_PO_ALLOCATION_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilPOAllocation = 0;
                          $totalAprilPOAllocationFields = ['April_PO_ALLOCATION_S', 'April_PO_ALLOCATION_M', 'April_PO_ALLOCATION_L', 'April_PO_ALLOCATION_XL', 'April_PO_ALLOCATION_XXL', 'April_PO_ALLOCATION_XXXL'];
                          foreach ($totalAprilPOAllocationFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilPOAllocation += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilPOAllocation;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_PO_ALLOCATION_DATE']) ? $globaMaindData['April_PO_ALLOCATION_DATE'] : '';
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

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center d-table-cell align-middle">
                        <?php echo isset($globaMaindData['April_PO_ALLOCATION_NOTE']) ? $globaMaindData['April_PO_ALLOCATION_NOTE'] : 'note'; ?>
                      </td>


                    </tr>
                  
                    <tr class="w-100">
                      <td class="head-second-td d-table-cell align-middle" scope="row">Total Allocated To PO Qnty (Pcs)</td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Total_Allocated_S']) ? $globaMaindData['April_Total_Allocated_S'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Total_Allocated_M']) ? $globaMaindData['April_Total_Allocated_M'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Total_Allocated_L']) ? $globaMaindData['April_Total_Allocated_L'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Total_Allocated_XL']) ? $globaMaindData['April_Total_Allocated_XL'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Total_Allocated_XXL']) ? $globaMaindData['April_Total_Allocated_XXL'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_Total_Allocated_XXXL']) ? $globaMaindData['April_Total_Allocated_XXXL'] : 0; ?></td>

                      <td class="head-second-td d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilAllocated = 0;
                          $totalAprilAllocatedFields = ['April_Total_Allocated_S', 'April_Total_Allocated_M', 'April_Total_Allocated_L', 'April_Total_Allocated_XL', 'April_Total_Allocated_XXL', 'April_Total_Allocated_XXXL'];
                          foreach ($totalAprilAllocatedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilAllocated += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilAllocated;
                        ?>
                      </td>
                      
                      <td class="head-second-td d-table-cell align-middle text-center">
                        <?php 

                          $dateGet = isset($globaMaindData['April_Total_Allocated_DATE']) ? $globaMaindData['April_Total_Allocated_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_Total_Allocated_NOTE']) ? $globaMaindData['April_Total_Allocated_NOTE'] : 'note'; ?>
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
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_PO_NO_id']) ? $globaMaindData['April_PACKING_PARTICULARS_PO_NO_id'] : 0; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_Style_No_id']) ? $globaMaindData['April_PACKING_PARTICULARS_Style_No_id'] : 0; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_Colour_id']) ? $globaMaindData['April_PACKING_PARTICULARS_Colour_id'] : 0; ?></td>
                          </tr>
                        </table>
                      </td>


                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_S']) ? $globaMaindData['April_PACKING_PARTICULARS_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_M']) ? $globaMaindData['April_PACKING_PARTICULARS_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_L']) ? $globaMaindData['April_PACKING_PARTICULARS_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_XL']) ? $globaMaindData['April_PACKING_PARTICULARS_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_XXL']) ? $globaMaindData['April_PACKING_PARTICULARS_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['April_PACKING_PARTICULARS_XXXL']) ? $globaMaindData['April_PACKING_PARTICULARS_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalAprilPackingParticulars = 0;
                          $totalAprilPackingParticularsFields = ['April_PACKING_PARTICULARS_S', 'April_PACKING_PARTICULARS_M', 'April_PACKING_PARTICULARS_L', 'April_PACKING_PARTICULARS_XL', 'April_PACKING_PARTICULARS_XXL', 'April_PACKING_PARTICULARS_XXXL'];
                          foreach ($totalAprilPackingParticularsFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilPackingParticulars += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilPackingParticulars;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['April_PACKING_PARTICULARS_DATE']) ? $globaMaindData['April_PACKING_PARTICULARS_DATE'] : '';
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

                      <td style="font-size: 14px; padding: 8px 1px 8px 1px;" class="text-center d-table-cell align-middle">
                        <?php echo isset($globaMaindData['April_PACKING_PARTICULARS_NOTE']) ? $globaMaindData['April_PACKING_PARTICULARS_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                  



                    <tr class="w-100">
                      <td scope="row" class="head-second-td d-table-cell align-middle">Total Packed Quantity (Pcs)</td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['April_Total_Packed_Quantity_S']) ? $globaMaindData['April_Total_Packed_Quantity_S'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['April_Total_Packed_Quantity_M']) ? $globaMaindData['April_Total_Packed_Quantity_M'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['April_Total_Packed_Quantity_L']) ? $globaMaindData['April_Total_Packed_Quantity_L'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['April_Total_Packed_Quantity_XL']) ? $globaMaindData['April_Total_Packed_Quantity_XL'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['April_Total_Packed_Quantity_XXL']) ? $globaMaindData['April_Total_Packed_Quantity_XXL'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['April_Total_Packed_Quantity_XXXL']) ? $globaMaindData['April_Total_Packed_Quantity_XXXL'] : 0; ?></td>

                      <td class="text-center head-second-td d-table-cell align-middle">
                        <?php 
                          $totalAprilPackedQuantity = 0;
                          $totalAprilPackedQuantityFields = ['April_Total_Packed_Quantity_S', 'April_Total_Packed_Quantity_M', 'April_Total_Packed_Quantity_L', 'April_Total_Packed_Quantity_XL', 'April_Total_Packed_Quantity_XXL', 'April_Total_Packed_Quantity_XXXL'];
                          foreach ($totalAprilPackedQuantityFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilPackedQuantity += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          } 
                          echo $totalAprilPackedQuantity;
                        ?>
                      </td>

                      <td class="text-center head-second-td d-table-cell align-middle">
                        <?php 
                          $dateGet = isset($globaMaindData['April_Total_Packed_Quantity_DATE']) ? $globaMaindData['April_Total_Packed_Quantity_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_Total_Packed_Quantity_NOTE']) ? $globaMaindData['April_Total_Packed_Quantity_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle head-fourth-td" scope="row">AVAILABLE GMTS TO ISSUE PO (PCS)</td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['April_AVAILABLE_GMTS_S']) ? $globaMaindData['April_AVAILABLE_GMTS_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['April_AVAILABLE_GMTS_M']) ? $globaMaindData['April_AVAILABLE_GMTS_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['April_AVAILABLE_GMTS_L']) ? $globaMaindData['April_AVAILABLE_GMTS_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['April_AVAILABLE_GMTS_XL']) ? $globaMaindData['April_AVAILABLE_GMTS_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['April_AVAILABLE_GMTS_XXL']) ? $globaMaindData['April_AVAILABLE_GMTS_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['April_AVAILABLE_GMTS_XXXL']) ? $globaMaindData['April_AVAILABLE_GMTS_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center head-fourth-td">
                        <?php 
                          $totalAprilAvailableGMTS = 0;
                          $totalAprilAvailableGMTSFields = ['April_AVAILABLE_GMTS_S', 'April_AVAILABLE_GMTS_M', 'April_AVAILABLE_GMTS_L', 'April_AVAILABLE_GMTS_XL', 'April_AVAILABLE_GMTS_XXL', 'April_AVAILABLE_GMTS_XXXL'];
                          foreach ($totalAprilAvailableGMTSFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalAprilAvailableGMTS += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalAprilAvailableGMTS;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center head-fourth-td">
                        <?php 
                          $dateGet = isset($globaMaindData['April_AVAILABLE_GMTS_DATE']) ? $globaMaindData['April_AVAILABLE_GMTS_DATE'] : '';
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
                        <?php echo isset($globaMaindData['April_AVAILABLE_GMTS_NOTE']) ? $globaMaindData['April_AVAILABLE_GMTS_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                  
                    
                  </tbody>
          </table>
        </div>
      </div>

   

    </div>

   
    <div class="btn-div pt-1 px-3 mb-5 d-flex gap-3 justify-content-md-end justify-content-center">
      <button class="cus-button" onclick="downloadTableAsXLSX()">Download as XLSX</button>
      <button class="cus-button" onclick="downloadTableAsPDF()">Download as PDF</button>
    </div>
    

    <footer style="background-color: #171A7C;" class="p-3">
      <p style="color: #444444;" class="m-0 text-center fs-6"> &copy; Copyrights <?php echo date('Y'); ?> All Rights Reserved.</p>
    </footer>
    
    <?php wp_footer();?>
</body>
</html>
