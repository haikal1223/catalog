<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('url') ?>/wp-content/themes/slick/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('url') ?>/wp-content/themes/slick/slick/slick-theme.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="<?php bloginfo('url') ?>/wp-content/themes/calia/style.css">

<script>
    function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

</script>

<style>

</style>
</head>

    <body>
        <?php get_header() ?>

        <!-- HEAD JUMBO START -->
        <div class='head-background col-md-12'>
            <div class='container'>
            <div class='row header-catalog-text'>
                    <h2 class ='product-catalog-text col-md-12'>PRODUCT CATALOG</h2>
                    <input type="hidden" id="parent_name" value="<?php echo $_GET["parent_name"];?>">
                    <input type="hidden" id="parent_id" value="<?php echo $_GET["parent_id"];?>">
                </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="motor-tab" data-toggle="tab" href="#motor_content" role="tab" aria-controls="home" aria-selected="true">Motor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobil-tab" data-toggle="tab" href="#mobil_content" role="tab" aria-controls="profile" aria-selected="false">Mobil</a>
                </li>
                
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="motor_content" role="tabpanel" aria-labelledby="home-tab">
                
    <!-- TAB & FILTER START -->
    <div class='motor container'>
                <div>
                    <h2 class='text-white col-md-12'>PILIH OLI MOTOR YANG TEPAT!</h2>
                </div>
                <!-- TOP FILTER START -->
                    <div class='top-filter row'>

                        <div class='col-md-6'>
                            <!-- FIRST FILTER -->
                                <span class='text-white'>Kelas Motor:</span>
                                <form id="category_form" action="" method="post">
                                    <select name="category_id" id="category_id" >
                                    <option value="">Pilih Kelas Motor</option>

                                    
                                        <?php
                                        $terms = get_terms(
                                            array(
                                                'orderby' => 'name',
                                                'hierarchical' => 1,
                                                'taxonomy' => 'motor',
                                                'hide_empty' => 0,
                                                'parent' => 64,
                                            )
                                        );
                                    
                                            $args = array(
                                                'orderby' => 'name',
                                                'hierarchical' => 1,
                                                'taxonomy' => 'category',
                                                'hide_empty' => 0,
                                                'parent' => 43,
                                        );
                                        $categories = get_categories($args);
                                        
                                        foreach($categories as $category) {
                                        // echo '<option value="'.$category->cat_ID.'">' . $category->name . '</option>';
                                        // }
                                        ?>
                                        <option value="<?php echo $category->cat_ID; ?>" <?php if($_GET["category_id"] == $category->cat_ID) { echo "selected"; } ?>><?php echo $category->name; ?></option>
                                        <?php
                                        }
                                
                                        ?>
                                    </select>
                                </form>
                            <!-- FIRST END -->
                        </div>
                        <div class='col-md-6'>
                            <!-- SECOND FILTER -->
                            <span class='text-white'>Merk Motor:</span>
                            <form id="sub_category_form" action="" method="post">
                                <select name="sub_category_id" id="sub_category_id">
                                <option value="">Pilih Merk Motor</option>

                                    <?php

                                        if(isset($_GET["category_id"])) {
                                            $args = array(
                                                'orderby' => 'name',
                                                'hierarchical' => 1,
                                                'taxonomy' => 'category',
                                                'hide_empty' => 0,
                                                'parent' => $_GET["category_id"],
                                                );
                                                $categories = get_categories($args);
                                                
                                                foreach($categories as $category) {
                                                
                                    ?>
                                    <option value="<?php echo $category->cat_ID; ?>" <?php if($_GET["sub_category_id"] == $category->cat_ID) { echo "selected"; } ?>><?php echo $category->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                    
                                    <?php
                                    }
                                    ?>
                                </select>
                            </form>

                            <!-- SECOND END -->
                        </div>
                    </div>
                    <!-- TOP FILTER END -->
                    <!-- BOTTOM FILTER START -->
                        <div class='botom-filter row'>
                                <!-- THIRD FILTER -->
                            <div class='col-md-6'>
                                    <span class='text-white'>Tipe Motor:</span>
                                    <form id="sub_level_category_form" action="" method="post">
                                        <select name="sub_level_category_id" id="sub_level_category_id">
                                            <option value=""> Pilih Tipe Motor</option>
                                                <?php

                                                    if(isset($_GET["sub_category_id"])) {
                                                        $args = array(
                                                            'orderby' => 'name',
                                                            'hierarchical' => 1,
                                                            'taxonomy' => 'category',
                                                            'hide_empty' => 0,
                                                            'parent' => $_GET["sub_category_id"],
                                                            );
                                                            $categories = get_categories($args);
                                                            
                                                            foreach($categories as $category) {
                                                
                                                    
                                                ?>
                                                <option value="<?php echo $category->cat_ID; ?>" <?php if($_GET["sub_level_category_id"] == $category->cat_ID) { echo "selected"; } ?>><?php echo $category->name; ?></option>
                                                <?php
                                                }
                                            }
                                            ?>  
                                            
                                        </select>
                                </div>
                                <div class='col-md-6 mb-3 mt-3'>                                
                                        <input type="submit" name="submit_data" value='Cari Produk' style='color:white; background:#212931 !important'>   
                                </div>
                                
                                    </form>
                            <!-- THRID END -->
                            <!-- BUTTON -->
                                                        
                            <!-- BUTTON END -->
                        </div>
                    <!-- BOTTOM FILTER END -->
                </div>
                <!-- TAB & FILTER END -->
                </div>
                <div class="tab-pane fade" id="mobil_content" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- TAB & FILTER START -->
    <div class='motor container'>
                <div>
                    <h2 class='text-white col-md-12'>PILIH OLI MOBIL YANG TEPAT!</h2>
                </div>
                <!-- TOP FILTER START -->
                    <div class='top-filter row'>

                        <div class='col-md-6'>
                            <!-- FIRST FILTER -->
                                <span class='text-white'>Kelas Mobil:</span>
                                <form id="mobil_category_form" action="" method="post">
                                    <select name="mobil_category_id" id="mobil_category_id" >
                                    <option value="">- Kelas Mobil -</option>
                                        <?php
                                        
                                            $args = array(
                                                'orderby' => 'name',
                                                'hierarchical' => 1,
                                                'taxonomy' => 'category',
                                                'hide_empty' => 0,
                                                'parent' => 44,
                                        );
                                        $categories = get_categories($args);
                                        
                                        foreach($categories as $category) {
                                        // echo '<option value="'.$category->cat_ID.'">' . $category->name . '</option>';
                                        // }
                                        ?>
                                        <option value="<?php echo $category->cat_ID; ?>" <?php if($_GET["mobil_category_id"] == $category->cat_ID) { echo "selected"; } ?>><?php echo $category->name; ?></option>
                                        <?php
                                        }
                                
                                        ?>
                                    </select>
                                </form>
                            <!-- FIRST END -->
                        </div>
                        <div class='col-md-6'>
                            <!-- SECOND FILTER -->
                            <span class='text-white'>Merk Mobil:</span>
                            <form id="mobil_sub_category_form" action="" method="post">
                                <select name="mobil_sub_category_id" id="mobil_sub_category_id">
                                <option value="">- Merk Mobil -</option>
                                    <?php

                                        if(isset($_GET["mobil_category_id"])) {
                                            $args = array(
                                                'orderby' => 'name',
                                                'hierarchical' => 1,
                                                'taxonomy' => 'category',
                                                'hide_empty' => 0,
                                                'parent' => $_GET["mobil_category_id"],
                                                );
                                                $categories = get_categories($args);
                                                
                                                foreach($categories as $category) {
                                                
                                    ?>
                                    <option value="<?php echo $category->cat_ID; ?>" <?php if($_GET["mobil_sub_category_id"] == $category->cat_ID) { echo "selected"; } ?>><?php echo $category->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                    
                                    <?php
                                    }
                                    ?>
                                </select>
                            </form>

                            <!-- SECOND END -->
                        </div>
                    </div>
                    <!-- TOP FILTER END -->
                    <!-- BOTTOM FILTER START -->
                        <div class='botom-filter row'>
                                <!-- THIRD FILTER -->
                            <div class='col-md-6'>
                                    <span class='text-white'>Tipe Mobil:</span>
                                    <form id="mobil_sub_level_category_form" action="" method="post">
                                        <select name="mobil_sub_level_category_id" id="mobil_sub_level_category_id">
                                            <option value="">- Merk Mobil -</option>
                                                <?php

                                                    if(isset($_GET["mobil_sub_category_id"])) {
                                                        $args = array(
                                                            'orderby' => 'name',
                                                            'hierarchical' => 1,
                                                            'taxonomy' => 'category',
                                                            'hide_empty' => 0,
                                                            'parent' => $_GET["mobil_sub_category_id"],
                                                            );
                                                            $categories = get_categories($args);
                                                            
                                                            foreach($categories as $category) {
                                                
                                                    
                                                ?>
                                                <option value="<?php echo $category->cat_ID; ?>" <?php if($_GET["mobil_sub_level_category_id"] == $category->cat_ID) { echo "selected"; } ?>><?php echo $category->name; ?></option>
                                                <?php
                                                }
                                            }
                                            ?>  
                                            
                                        </select>
                            </div>
                            <div class='col-md-6 mb-3 mt-3'>
                                                        
                                        <input type="submit" name="submit_data_mobil" value='Cari Produk' style='color:white; background:#212931 !important'> 
                            </div>

                                    </form>
                            <!-- THRID END -->
                            <!-- BUTTON -->
                            
                            <!-- BUTTON END -->
                        </div>
                    <!-- BOTTOM FILTER END -->
                </div>
                <!-- TAB & FILTER END -->
                </div>
                <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
                
                
            </div>
        </div>
        <!-- HEAD JUMBO END -->

        <div style='background-color:  #212931;' style='width:100%; height: auto'>
        <div> <?php

    if(isset($_POST["submit_data"]) ) {
        // untuk motor $_POST["submit_data"] buat filternya
        ?>
    <div class="container">
                <div class="row">
                    <div class="col-12">
                    <div class='row d-flex justify-space-around'>
                    <?php
            if($_GET["category_id"] !== "") {
                $query = new WP_Query(
                    array(
                    'category__and' => array('43', $_GET["category_id"]),
                    ));
                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>
                                        <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>                                                                                                                     
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>                                                
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>

                    
                <?php
                    }
                };
            } else if( $_GET["sub_category_id"] !== "") {
                $query = new WP_Query(
                    array(
                    'category__and' => array('43', $_GET["category_id"], $_GET["sub_category_id"]),
                    ));
                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                        ?>
                    
                    <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>
                                        <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>                                                                                                                     
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>                                                
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>


                <?php
                    }
                };
            } else if($_GET["sub_level_category_id"] !== "") {
                $query = new WP_Query(
                    array(
                    'category__and' => array('43', $_GET["category_id"], $_GET["sub_category_id"], $_GET["sub_level_category_id"]),
                    ));
                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>
                                        <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>                                                                                                                     
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>                                                
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>

                        
                        <?php
                        
                    }
                };
            };

        } else if(isset($_POST["submit_data_mobil"])) {
            ?>
                <div class="container">
                <div class="row">
                    <div class="col-12">
                    <div class='row d-flex justify-space-around'>
            <?php
            
                // untuk filter mobil,

                if($_GET["mobil_category_id"] !== "") {
                    $query = new WP_Query(
                        array(
                        'category__and' => array('44', $_GET["mobil_category_id"]),
                        ));
                    if($query->have_posts()) {
                        while($query->have_posts()) {
                            $query->the_post();
                        ?>
                        <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>
                                        <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>                                                                                                                     
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>                                                
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>

                        <?php
                        }
                    };
                } else if( $_GET["mobil_sub_category_id"] !== "") {
                    $query = new WP_Query(
                        array(
                        'category__and' => array('44', $_GET["mobil_category_id"], $_GET["mobil_sub_category_id"]),
                        ));
                    if($query->have_posts()) {
                        while($query->have_posts()) {
                            $query->the_post();
                        ?>
                        <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>
                                        <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>                                                                                                                     
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>                                                
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>

                        <?php
                        }
                    };
                } else if($_GET["mobil_sub_level_category_id"] !== "") {
                    $query = new WP_Query(
                        array(
                        'category__and' => array('44', $_GET["mobil_category_id"], $_GET["mobil_sub_category_id"], $_GET["mobil_sub_level_category_id"]),
                        ));
                    if($query->have_posts()) {
                        while($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>
                                        <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>                                                                                                                     
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>                                                
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>
                            <?php
                            
                        }
                    };
                };
                // sma kayak motor, tapi $_GETnya beda. kalo motor yang pertama $_GET["category_id]
                // kalo mobil $_GET["mobil_category_id"]
            
        } else {
            ?>  
                <div class="container">
                <div class="row">
                    <div class="col-12">
                    <div class='row d-flex justify-space-around'>
            <?php
            if($_GET["parent"] == "motor_content") {
                // ini buat get semua produk motor
    $query = new WP_Query(
                array(
                'cat' => '43',
                ));
            if($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    ?>
                        <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>
                                        <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>                                                                                                                     
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>                                                
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>
                    <?php
                };
                
            };
            $query->reset_postdata();

            } 
            
            if($_GET["parent"] == "mobil_content") {
                // Ini buat get semua produk mobil 
                
                $query = new WP_Query(
                    array(
                    'category_name' => 'mobil',
                    ));
                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                    ?>
                        <div class='col-6 card-product mb-3 mt-3'>
                                    
                                    <div class="">
                                            <div class='image-card'>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Denim Jeans" style="">
                                                <div class="title-product">
                                                <h1><?php the_title() ?> </h1>
                                            </div>
                                            </div>
                                        <div class='description'>                                
                                                <p class='harga text-left'>Harga <span class='harga-angka'>Rp.<?php echo get_post_meta($post->ID, 'nominal', true); ?>,-</span></p>
                                                <div class='deskripsi-box'>
                                                <p class="description-text text-left text-white"><?php echo get_post_meta($post->ID, 'excerpt_produk', true); ?></p>
                                                </div>
                                                <input type="button" class='btn btn-light btn-sm-light w-100 px-md-2 py-md-3 mb-md-3' value="Lihat Spesifikasi" onClick="window.location.href ='<?php the_permalink()?>' " style='color:red; background:white !important'>
                                                <input type="button"  class="btn btn-info btn-sm-info w-100 px-md-2 py-md-3" value='DataSheet Product' onClick="window.location.href ='<?php echo get_post_meta($post->ID, 'link_download', true);?>' " style="color: white; background: #29ABE2 !important"> 
                                        </div>
                                        </div>
                            </div>
                    <?php
                    };
                    
                } else {
                    echo "Kosong";
                }
                $query->reset_postdata();
            
        };
    };
                ?>  
            </div>
            </div>
        </div>
    </div>
        
            
            </div>
        </div>

        <?php get_footer() ?>
    </body>
</html>
