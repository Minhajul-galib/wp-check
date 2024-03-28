<?php
/*
Template Name: March
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
                    
                      <th colspan="5" scope="col" class="text-center" data-type="text"><?php echo isset($globaMaindData['March_COM_NO']) ? $globaMaindData['March_COM_NO'] : "" ?></th>
                      
                      <th colspan="2" scope="col" class="text-end">
                          <p class="m-0 fw-normal fs-6">DATE: <span id="current-date"></span></p>
                      </th>
                      <th colspan="2" scope="col" class="text-end">
                        <p class="m-0 fw-normal fs-6">TIME: <span id="current-time"></span></p>

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
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_COMMITMENT_S']) ? $globaMaindData['March_COMMITMENT_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_COMMITMENT_M']) ? $globaMaindData['March_COMMITMENT_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_COMMITMENT_L']) ? $globaMaindData['March_COMMITMENT_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_COMMITMENT_XL']) ? $globaMaindData['March_COMMITMENT_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_COMMITMENT_XXL']) ? $globaMaindData['March_COMMITMENT_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_COMMITMENT_XXXL']) ? $globaMaindData['March_COMMITMENT_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchCommitment = 0;
                          $totalMarchCommitmentFields = ['March_COMMITMENT_S', 'March_COMMITMENT_M', 'March_COMMITMENT_L', 'March_COMMITMENT_XL', 'March_COMMITMENT_XXL', 'March_COMMITMENT_XXXL'];
                          foreach ($totalMarchCommitmentFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchCommitment += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchCommitment;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_COMMITMENT_DATE']) ? $globaMaindData['March_COMMITMENT_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_COMMITMENT_NOTE']) ? $globaMaindData['March_COMMITMENT_NOTE'] : 'NOTE '; ?>                  
                      </td>

                      
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle ">GREIGE FABRIC ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_GREIGE_FABRIC_S']) ? $globaMaindData['March_GREIGE_FABRIC_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_GREIGE_FABRIC_M']) ? $globaMaindData['March_GREIGE_FABRIC_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_GREIGE_FABRIC_L']) ? $globaMaindData['March_GREIGE_FABRIC_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_GREIGE_FABRIC_XL']) ? $globaMaindData['March_GREIGE_FABRIC_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_GREIGE_FABRIC_XXL']) ? $globaMaindData['March_GREIGE_FABRIC_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_GREIGE_FABRIC_XXXL']) ? $globaMaindData['March_GREIGE_FABRIC_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                        $totalMarchGreigeFabric = 0;
                        $totalMarchGreigeFabricFields = ['March_GREIGE_FABRIC_S', 'March_GREIGE_FABRIC_M', 'March_GREIGE_FABRIC_L', 'March_GREIGE_FABRIC_XL', 'March_GREIGE_FABRIC_XXL', 'March_GREIGE_FABRIC_XXXL'];
                        foreach ($totalMarchGreigeFabricFields as $field) {
                            if (isset($globaMaindData[$field])) {
                                $totalMarchGreigeFabric += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                            }
                        }
                        echo $totalMarchGreigeFabric;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_GREIGE_FABRIC_DATE']) ? $globaMaindData['March_GREIGE_FABRIC_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_GREIGE_FABRIC_NOTE']) ? $globaMaindData['March_GREIGE_FABRIC_NOTE'] : 'note'; ?>
                      </td>


                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">DYED FABRIC ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_DYED_S']) ? $globaMaindData['March_DYED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_DYED_M']) ? $globaMaindData['March_DYED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_DYED_L']) ? $globaMaindData['March_DYED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_DYED_XL']) ? $globaMaindData['March_DYED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_DYED_XXL']) ? $globaMaindData['March_DYED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_DYED_XXXL']) ? $globaMaindData['March_DYED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchDyed = 0;
                          $totalMarchDyedFields = ['March_DYED_S', 'March_DYED_M', 'March_DYED_L', 'March_DYED_XL', 'March_DYED_XXL', 'March_DYED_XXXL'];
                          foreach ($totalMarchDyedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchDyed += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchDyed;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_DYED_DATE']) ? $globaMaindData['March_DYED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_DYED_NOTE']) ? $globaMaindData['March_DYED_NOTE'] : 'note'; ?>
                      </td>

                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">RFID ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_RFID_S']) ? $globaMaindData['March_RFID_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_RFID_M']) ? $globaMaindData['March_RFID_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_RFID_L']) ? $globaMaindData['March_RFID_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_RFID_XL']) ? $globaMaindData['March_RFID_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_RFID_XXL']) ? $globaMaindData['March_RFID_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_RFID_XXXL']) ? $globaMaindData['March_RFID_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                         $totalMarchRFID = 0;
                         $totalMarchRFIDFields = ['March_RFID_S', 'March_RFID_M', 'March_RFID_L', 'March_RFID_XL', 'March_RFID_XXL', 'March_RFID_XXXL'];
                         foreach ($totalMarchRFIDFields as $field) {
                             if (isset($globaMaindData[$field])) {
                                 $totalMarchRFID += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                             }
                         }
                         echo $totalMarchRFID;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_RFID_DATE']) ? $globaMaindData['March_RFID_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_RFID_NOTE']) ? $globaMaindData['March_RFID_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">POLY ALLOCATED FOR (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_POLY_S']) ? $globaMaindData['March_POLY_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_POLY_M']) ? $globaMaindData['March_POLY_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_POLY_L']) ? $globaMaindData['March_POLY_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_POLY_XL']) ? $globaMaindData['March_POLY_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_POLY_XXL']) ? $globaMaindData['March_POLY_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_POLY_XXXL']) ? $globaMaindData['March_POLY_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchPOLY = 0;
                          $totalMarchPOLYFields = ['March_POLY_S', 'March_POLY_M', 'March_POLY_L', 'March_POLY_XL', 'March_POLY_XXL', 'March_POLY_XXXL'];
                          foreach ($totalMarchPOLYFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchPOLY += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchPOLY;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_POLY_DATE']) ? $globaMaindData['March_POLY_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_POLY_NOTE']) ? $globaMaindData['March_POLY_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    </div>


                    <tr class="w-100">
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>
                    
                    <tr class="mt-0 w-100">
                      <td class="d-table-cell align-middle " scope="row">GREIGE FABRIC AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_GREIGE_S']) ? $globaMaindData['March_Sec_GREIGE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_GREIGE_M']) ? $globaMaindData['March_Sec_GREIGE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_GREIGE_L']) ? $globaMaindData['March_Sec_GREIGE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_GREIGE_XL']) ? $globaMaindData['March_Sec_GREIGE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_GREIGE_XXL']) ? $globaMaindData['March_Sec_GREIGE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_GREIGE_XXXL']) ? $globaMaindData['March_Sec_GREIGE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchSecGREIGE = 0;
                          $totalMarchSecGREIGEFields = ['March_Sec_GREIGE_S', 'March_Sec_GREIGE_M', 'March_Sec_GREIGE_L', 'March_Sec_GREIGE_XL', 'March_Sec_GREIGE_XXL', 'March_Sec_GREIGE_XXXL'];
                          foreach ($totalMarchSecGREIGEFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchSecGREIGE += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          } 
                          echo $totalMarchSecGREIGE;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_Sec_GREIGE_DATE']) ? $globaMaindData['March_Sec_GREIGE_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_Sec_GREIGE_NOTE']) ? $globaMaindData['March_Sec_GREIGE_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">DYED FABRIC AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_DYED_S']) ? $globaMaindData['March_Sec_DYED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_DYED_M']) ? $globaMaindData['March_Sec_DYED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_DYED_L']) ? $globaMaindData['March_Sec_DYED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_DYED_XL']) ? $globaMaindData['March_Sec_DYED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_DYED_XXL']) ? $globaMaindData['March_Sec_DYED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_DYED_XXXL']) ? $globaMaindData['March_Sec_DYED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchSecDYED = 0;
                          $totalMarchSecDYEDFields = ['March_Sec_DYED_S', 'March_Sec_DYED_M', 'March_Sec_DYED_L', 'March_Sec_DYED_XL', 'March_Sec_DYED_XXL', 'March_Sec_DYED_XXXL'];
                          foreach ($totalMarchSecDYEDFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchSecDYED += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchSecDYED;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_Sec_DYED_DATE']) ? $globaMaindData['March_Sec_DYED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_Sec_DYED_NOTE']) ? $globaMaindData['March_Sec_DYED_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                    
                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">RFID AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_RFID_S']) ? $globaMaindData['March_Sec_RFID_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_RFID_M']) ? $globaMaindData['March_Sec_RFID_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_RFID_L']) ? $globaMaindData['March_Sec_RFID_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_RFID_XL']) ? $globaMaindData['March_Sec_RFID_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_RFID_XXL']) ? $globaMaindData['March_Sec_RFID_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_RFID_XXXL']) ? $globaMaindData['March_Sec_RFID_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchSecRFID = 0;
                          $totalMarchSecRFIDFields = ['March_Sec_RFID_S', 'March_Sec_RFID_M', 'March_Sec_RFID_L', 'March_Sec_RFID_XL', 'March_Sec_RFID_XXL', 'March_Sec_RFID_XXXL'];
                          foreach ($totalMarchSecRFIDFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchSecRFID += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchSecRFID;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_Sec_RFID_DATE']) ? $globaMaindData['March_Sec_RFID_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_Sec_RFID_NOTE']) ? $globaMaindData['March_Sec_RFID_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                    
                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">POLY AVAILABLE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_POLY_S']) ? $globaMaindData['March_Sec_POLY_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_POLY_M']) ? $globaMaindData['March_Sec_POLY_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_POLY_L']) ? $globaMaindData['March_Sec_POLY_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_POLY_XL']) ? $globaMaindData['March_Sec_POLY_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_POLY_XXL']) ? $globaMaindData['March_Sec_POLY_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Sec_POLY_XXXL']) ? $globaMaindData['March_Sec_POLY_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                         
                         $totalMarchSecPOLY = 0;
                         $totalMarchSecPOLYFields = ['March_Sec_POLY_S', 'March_Sec_POLY_M', 'March_Sec_POLY_L', 'March_Sec_POLY_XL', 'March_Sec_POLY_XXL', 'March_Sec_POLY_XXXL'];
                         foreach ($totalMarchSecPOLYFields as $field) {
                             if (isset($globaMaindData[$field])) {
                                 $totalMarchSecPOLY += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                             }
                         }
                         echo $totalMarchSecPOLY;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_Sec_POLY_DATE']) ? $globaMaindData['March_Sec_POLY_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_Sec_POLY_NOTE']) ? $globaMaindData['March_Sec_POLY_NOTE'] : 'note'; ?>
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
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_COMPLETED_S']) ? $globaMaindData['March_CUTTING_COMPLETED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_COMPLETED_M']) ? $globaMaindData['March_CUTTING_COMPLETED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_COMPLETED_L']) ? $globaMaindData['March_CUTTING_COMPLETED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_COMPLETED_XL']) ? $globaMaindData['March_CUTTING_COMPLETED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_COMPLETED_XXL']) ? $globaMaindData['March_CUTTING_COMPLETED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_COMPLETED_XXXL']) ? $globaMaindData['March_CUTTING_COMPLETED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                         $totalMarchCuttingCompleted = 0;
                         $totalMarchCuttingCompletedFields = ['March_CUTTING_COMPLETED_S', 'March_CUTTING_COMPLETED_M', 'March_CUTTING_COMPLETED_L', 'March_CUTTING_COMPLETED_XL', 'March_CUTTING_COMPLETED_XXL', 'March_CUTTING_COMPLETED_XXXL'];
                         foreach ($totalMarchCuttingCompletedFields as $field) {
                             if (isset($globaMaindData[$field])) {
                                 $totalMarchCuttingCompleted += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                             }
                         }
                         echo $totalMarchCuttingCompleted;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_CUTTING_COMPLETED_DATE']) ? $globaMaindData['March_CUTTING_COMPLETED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_CUTTING_COMPLETED_NOTE']) ? $globaMaindData['March_CUTTING_COMPLETED_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">CUTTING BALANCE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_BALANCE_S']) ? $globaMaindData['March_CUTTING_BALANCE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_BALANCE_M']) ? $globaMaindData['March_CUTTING_BALANCE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_BALANCE_L']) ? $globaMaindData['March_CUTTING_BALANCE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_BALANCE_XL']) ? $globaMaindData['March_CUTTING_BALANCE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_BALANCE_XXL']) ? $globaMaindData['March_CUTTING_BALANCE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_CUTTING_BALANCE_XXXL']) ? $globaMaindData['March_CUTTING_BALANCE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchCuttingBalance = 0;
                          $totalMarchCuttingBalanceFields = ['March_CUTTING_BALANCE_S', 'March_CUTTING_BALANCE_M', 'March_CUTTING_BALANCE_L', 'March_CUTTING_BALANCE_XL', 'March_CUTTING_BALANCE_XXL', 'March_CUTTING_BALANCE_XXXL'];
                          foreach ($totalMarchCuttingBalanceFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchCuttingBalance += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchCuttingBalance;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_CUTTING_BALANCE_DATE']) ? $globaMaindData['March_CUTTING_BALANCE_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_CUTTING_BALANCE_NOTE']) ? $globaMaindData['March_CUTTING_BALANCE_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">SEWING COMPLETED (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_COMPLETED_S']) ? $globaMaindData['March_SEWING_COMPLETED_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_COMPLETED_M']) ? $globaMaindData['March_SEWING_COMPLETED_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_COMPLETED_L']) ? $globaMaindData['March_SEWING_COMPLETED_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_COMPLETED_XL']) ? $globaMaindData['March_SEWING_COMPLETED_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_COMPLETED_XXL']) ? $globaMaindData['March_SEWING_COMPLETED_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_COMPLETED_XXXL']) ? $globaMaindData['March_SEWING_COMPLETED_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchSewingCompleted = 0;
                          $totalMarchSewingCompletedFields = ['March_SEWING_COMPLETED_S', 'March_SEWING_COMPLETED_M', 'March_SEWING_COMPLETED_L', 'March_SEWING_COMPLETED_XL', 'March_SEWING_COMPLETED_XXL', 'March_SEWING_COMPLETED_XXXL'];
                          foreach ($totalMarchSewingCompletedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchSewingCompleted += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchSewingCompleted;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_SEWING_COMPLETED_DATE']) ? $globaMaindData['March_SEWING_COMPLETED_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_SEWING_COMPLETED_NOTE']) ? $globaMaindData['March_SEWING_COMPLETED_NOTE'] : 'note'; ?>
                      </td>

                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle " scope="row">SEWING BALANCE (PCS)</td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_BALANCE_S']) ? $globaMaindData['March_SEWING_BALANCE_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_BALANCE_M']) ? $globaMaindData['March_SEWING_BALANCE_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_BALANCE_L']) ? $globaMaindData['March_SEWING_BALANCE_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_BALANCE_XL']) ? $globaMaindData['March_SEWING_BALANCE_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_BALANCE_XXL']) ? $globaMaindData['March_SEWING_BALANCE_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_SEWING_BALANCE_XXXL']) ? $globaMaindData['March_SEWING_BALANCE_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchSewingBalance = 0;
                          $totalMarchSewingBalanceFields = ['March_SEWING_BALANCE_S', 'March_SEWING_BALANCE_M', 'March_SEWING_BALANCE_L', 'March_SEWING_BALANCE_XL', 'March_SEWING_BALANCE_XXL', 'March_SEWING_BALANCE_XXXL'];
                          foreach ($totalMarchSewingBalanceFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchSewingBalance += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchSewingBalance;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_SEWING_BALANCE_DATE']) ? $globaMaindData['March_SEWING_BALANCE_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_SEWING_BALANCE_NOTE']) ? $globaMaindData['March_SEWING_BALANCE_NOTE'] : 'note'; ?>
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
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['March_PO_NO_id']) ? $globaMaindData['March_PO_NO_id'] : ""; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['March_Style_No_id']) ? $globaMaindData['March_Style_No_id'] : ""; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['March_Colour_id']) ? $globaMaindData['March_Colour_id'] : ""; ?></td>
                          </tr>
                        </table>
                      </td>


                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PO_ALLOCATION_S']) ? $globaMaindData['March_PO_ALLOCATION_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PO_ALLOCATION_M']) ? $globaMaindData['March_PO_ALLOCATION_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PO_ALLOCATION_L']) ? $globaMaindData['March_PO_ALLOCATION_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PO_ALLOCATION_XL']) ? $globaMaindData['March_PO_ALLOCATION_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PO_ALLOCATION_XXL']) ? $globaMaindData['March_PO_ALLOCATION_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PO_ALLOCATION_XXXL']) ? $globaMaindData['March_PO_ALLOCATION_XXXL'] : 0; ?></td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchPOAllocation = 0;
                          $totalMarchPOAllocationFields = ['March_PO_ALLOCATION_S', 'March_PO_ALLOCATION_M', 'March_PO_ALLOCATION_L', 'March_PO_ALLOCATION_XL', 'March_PO_ALLOCATION_XXL', 'March_PO_ALLOCATION_XXXL'];
                          foreach ($totalMarchPOAllocationFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchPOAllocation += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchPOAllocation;
                        ?>
                      </td>
                      
                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_PO_ALLOCATION_DATE']) ? $globaMaindData['March_PO_ALLOCATION_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_PO_ALLOCATION_NOTE']) ? $globaMaindData['March_PO_ALLOCATION_NOTE'] : 'note'; ?>
                      </td>


                    </tr>
                  
                    <tr class="w-100">
                      <td class="head-second-td d-table-cell align-middle" scope="row">Total Allocated To PO Qnty (Pcs)</td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Total_Allocated_S']) ? $globaMaindData['March_Total_Allocated_S'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Total_Allocated_M']) ? $globaMaindData['March_Total_Allocated_M'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Total_Allocated_L']) ? $globaMaindData['March_Total_Allocated_L'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Total_Allocated_XL']) ? $globaMaindData['March_Total_Allocated_XL'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Total_Allocated_XXL']) ? $globaMaindData['March_Total_Allocated_XXL'] : 0; ?></td>
                      <td class="head-second-td d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_Total_Allocated_XXXL']) ? $globaMaindData['March_Total_Allocated_XXXL'] : 0; ?></td>

                      <td class="head-second-td d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchAllocated = 0;
                          $totalMarchAllocatedFields = ['March_Total_Allocated_S', 'March_Total_Allocated_M', 'March_Total_Allocated_L', 'March_Total_Allocated_XL', 'March_Total_Allocated_XXL', 'March_Total_Allocated_XXXL'];
                          foreach ($totalMarchAllocatedFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchAllocated += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchAllocated;
                        ?>
                      </td>
                      
                      <td class="head-second-td d-table-cell align-middle text-center">
                        <?php 

                          $dateGet = isset($globaMaindData['March_Total_Allocated_DATE']) ? $globaMaindData['March_Total_Allocated_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_Total_Allocated_NOTE']) ? $globaMaindData['March_Total_Allocated_NOTE'] : 'note'; ?>
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
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_PO_NO_id']) ? $globaMaindData['March_PACKING_PARTICULARS_PO_NO_id'] : 0; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_Style_No_id']) ? $globaMaindData['March_PACKING_PARTICULARS_Style_No_id'] : 0; ?></td>
                            <td style="height: 52px; width: 33.33%;" class="d-table-cell align-middle remove-Bm-border remove-Rs-border text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_Colour_id']) ? $globaMaindData['March_PACKING_PARTICULARS_Colour_id'] : 0; ?></td>
                          </tr>
                        </table>
                      </td>


                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_S']) ? $globaMaindData['March_PACKING_PARTICULARS_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_M']) ? $globaMaindData['March_PACKING_PARTICULARS_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_L']) ? $globaMaindData['March_PACKING_PARTICULARS_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_XL']) ? $globaMaindData['March_PACKING_PARTICULARS_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_XXL']) ? $globaMaindData['March_PACKING_PARTICULARS_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center"><?php echo isset($globaMaindData['March_PACKING_PARTICULARS_XXXL']) ? $globaMaindData['March_PACKING_PARTICULARS_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $totalMarchPackingParticulars = 0;
                          $totalMarchPackingParticularsFields = ['March_PACKING_PARTICULARS_S', 'March_PACKING_PARTICULARS_M', 'March_PACKING_PARTICULARS_L', 'March_PACKING_PARTICULARS_XL', 'March_PACKING_PARTICULARS_XXL', 'March_PACKING_PARTICULARS_XXXL'];
                          foreach ($totalMarchPackingParticularsFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchPackingParticulars += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchPackingParticulars;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center">
                        <?php 
                          $dateGet = isset($globaMaindData['March_PACKING_PARTICULARS_DATE']) ? $globaMaindData['March_PACKING_PARTICULARS_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_PACKING_PARTICULARS_NOTE']) ? $globaMaindData['March_PACKING_PARTICULARS_NOTE'] : 'note'; ?>
                      </td>
                    </tr>
                  



                    <tr class="w-100">
                      <td scope="row" class="head-second-td d-table-cell align-middle">Total Packed Quantity (Pcs)</td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['March_Total_Packed_Quantity_S']) ? $globaMaindData['March_Total_Packed_Quantity_S'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['March_Total_Packed_Quantity_M']) ? $globaMaindData['March_Total_Packed_Quantity_M'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['March_Total_Packed_Quantity_L']) ? $globaMaindData['March_Total_Packed_Quantity_L'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['March_Total_Packed_Quantity_XL']) ? $globaMaindData['March_Total_Packed_Quantity_XL'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['March_Total_Packed_Quantity_XXL']) ? $globaMaindData['March_Total_Packed_Quantity_XXL'] : 0; ?></td>
                      <td class="text-center head-second-td d-table-cell align-middle"><?php echo isset($globaMaindData['March_Total_Packed_Quantity_XXXL']) ? $globaMaindData['March_Total_Packed_Quantity_XXXL'] : 0; ?></td>

                      <td class="text-center head-second-td d-table-cell align-middle">
                        <?php 
                          $totalMarchPackedQuantity = 0;
                          $totalMarchPackedQuantityFields = ['March_Total_Packed_Quantity_S', 'March_Total_Packed_Quantity_M', 'March_Total_Packed_Quantity_L', 'March_Total_Packed_Quantity_XL', 'March_Total_Packed_Quantity_XXL', 'March_Total_Packed_Quantity_XXXL'];
                          foreach ($totalMarchPackedQuantityFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchPackedQuantity += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          } 
                          echo $totalMarchPackedQuantity;
                        ?>
                      </td>

                      <td class="text-center head-second-td d-table-cell align-middle">
                        <?php 
                          $dateGet = isset($globaMaindData['March_Total_Packed_Quantity_DATE']) ? $globaMaindData['March_Total_Packed_Quantity_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_Total_Packed_Quantity_NOTE']) ? $globaMaindData['March_Total_Packed_Quantity_NOTE'] : 'note'; ?>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="12" class="remove-Rs-border empty-td-bg"></td>
                    </tr>

                    <tr class="w-100">
                      <td class="d-table-cell align-middle head-fourth-td" scope="row">AVAILABLE GMTS TO ISSUE PO (PCS)</td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['March_AVAILABLE_GMTS_S']) ? $globaMaindData['March_AVAILABLE_GMTS_S'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['March_AVAILABLE_GMTS_M']) ? $globaMaindData['March_AVAILABLE_GMTS_M'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['March_AVAILABLE_GMTS_L']) ? $globaMaindData['March_AVAILABLE_GMTS_L'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['March_AVAILABLE_GMTS_XL']) ? $globaMaindData['March_AVAILABLE_GMTS_XL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['March_AVAILABLE_GMTS_XXL']) ? $globaMaindData['March_AVAILABLE_GMTS_XXL'] : 0; ?></td>
                      <td class="d-table-cell align-middle text-center head-fourth-td"><?php echo isset($globaMaindData['March_AVAILABLE_GMTS_XXXL']) ? $globaMaindData['March_AVAILABLE_GMTS_XXXL'] : 0; ?></td>

                      <td class="d-table-cell align-middle text-center head-fourth-td">
                        <?php 
                          $totalMarchAvailableGMTS = 0;
                          $totalMarchAvailableGMTSFields = ['March_AVAILABLE_GMTS_S', 'March_AVAILABLE_GMTS_M', 'March_AVAILABLE_GMTS_L', 'March_AVAILABLE_GMTS_XL', 'March_AVAILABLE_GMTS_XXL', 'March_AVAILABLE_GMTS_XXXL'];
                          foreach ($totalMarchAvailableGMTSFields as $field) {
                              if (isset($globaMaindData[$field])) {
                                  $totalMarchAvailableGMTS += is_numeric($globaMaindData[$field]) ? intval($globaMaindData[$field]) : 0;
                              }
                          }
                          echo $totalMarchAvailableGMTS;
                        ?>
                      </td>

                      <td class="d-table-cell align-middle text-center head-fourth-td">
                        <?php 
                          $dateGet = isset($globaMaindData['March_AVAILABLE_GMTS_DATE']) ? $globaMaindData['March_AVAILABLE_GMTS_DATE'] : '';
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
                        <?php echo isset($globaMaindData['March_AVAILABLE_GMTS_NOTE']) ? $globaMaindData['March_AVAILABLE_GMTS_NOTE'] : 'note'; ?>
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
