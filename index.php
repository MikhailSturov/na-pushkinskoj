<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header(); ?>

<main class="page-main">
    <h1 class="visually-hidden">Центр Развития творчества Детей и юношества "На Пушкинской"</h1>
    <div class="slogan">
      <img src="<?php echo get_template_directory_uri() . '/assets/images/slogan.svg'; ?>" alt="Мир который познается в радость">
    </div>
    <section class="page-main__news news">
      <h2 class="news__title">Новости центра</h2>
      <div class="news__container important-news__container">
        <ul class="important-news__list">

        <?php 
            // параметры по умолчанию
              $posts = get_posts( array(
                'numberposts' => 2,
                'category'    => 'important',
                'tag'         => 'notice',
                'orderby'     => 'date',
                'order'       => 'DESC',
                'include'     => array(),
                'exclude'     => array(),
                'meta_key'    => '',
                'meta_value'  =>'',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
              ) );

              foreach( $posts as $post ){
                setup_postdata($post);
                  // формат вывода the_title() ...
                  ?>

          <li class="important-news__item">
            <a href="<?php the_permalink(); ?>" class="important-news__link">
              <?php the_post_thumbnail('thumbnail' , array('class' => "important-news__img")); ?>
              <div class="important-news__link-container">
                <h3 class="important-news__title"><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
              </div>
            </a>
          </li>

          <?php
              }

              wp_reset_postdata(); // сброс
                          ?>
  
        </ul>
      </div>
      <div class="news__container">
        <ul class="news__list">

            <?php 
            // параметры по умолчанию
              $posts = get_posts( array(
                'numberposts' => 4,
                'category'    => 'event',
                'tag'         => 'news',
                'orderby'     => 'date',
                'order'       => 'DESC',
                'include'     => array(),
                'exclude'     => array(),
                'meta_key'    => '',
                'meta_value'  =>'',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
              ) );

              foreach( $posts as $post ){
                setup_postdata($post);
                  // формат вывода the_title() ...
                  ?>

              <li class="news__item">
                            <a href="<?php the_permalink(); ?>" class="news__link">
                              <div class="news__title-container">
                                <h3 class="news__sub-title"><?php the_title(); ?></h3>
                                <time class="news__date" datetime=""><?php the_time('j F Y') ?></time>
                              </div>
                              <div class="news__paragraph-container">
                                <?php the_excerpt(); ?>
                                <?php the_post_thumbnail('thumbnail'); ?>
                              </div>
                            </a>
                          </li>

                  <?php
              }

              wp_reset_postdata(); // сброс
                          ?>


          </div>
        </ul>
        <a class="button button__all-news" href="http://na-pushkinskoj.vrn.ru/category/event">Все новости</a>
      </div>
    </section>

    <section class="page-main__educational-focus educational-focus">
      <img class="educational-focus__triangle--top" src="<?php echo get_template_directory_uri() . '/assets/images/triangle-white.svg'; ?>" width="100%" height="150px">
      <div class="educational-focus__container">
        <h2 class="educational-focus__title">Образовательные направления</h2>
        <ul class="educational-focus__list">
          <?php 
            $education_arr = get_field('educational_focus'); 
              foreach($education_arr as $education_id):
               $image_arr = get_field('educational_picture', $education_id);
               $image_url = $image_arr['url'];
          ?>
            <li class="educational-focus__item">
              <a class="educational-focus__link" href="<?php the_field('educational_link', $education_id); ?>">
                <img class="educational-focus__img" src="<?php echo $image_url; ?>">
                <h3 class="educational-focus__sub-title"><?php the_field('educational_title', $education_id); ?></h3>
                <p class="educational-focus__paragraph"><?php the_field('educational_description', $education_id); ?></p>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <img class="educational-focus__triangle--bottom" src="<?php echo get_template_directory_uri() . '/assets/images/triangle-white.svg'; ?>" width="100%" height="150px">
    </section>

    <section class="page-main__achieves achieves">
      <div class="achieves__container">
        <h2 class="achieves__title">Достижения центра</h2>
        <ul class="achieves__list">
          <li class="achieves__item achievement">
            <?php $achieves_1_arr = get_field('achieves_1'); ?>
            <span class="achievement__value"><?php echo $achieves_1_arr['achieves_number']; ?></span>
            <h3 class="achievement__title"><?php echo $achieves_1_arr['achieves_title']; ?></h3>
            <p class="achievement__paragraph"><?php echo $achieves_1_arr['achieves_description']; ?></p>
          </li>
          <li class="achieves__item achievement">
          <?php $achieves_2_arr = get_field('achieves_2'); ?>
            <span class="achievement__value"><?php echo $achieves_2_arr['achieves_number']; ?></span>
            <h3 class="achievement__title"><?php echo $achieves_2_arr['achieves_title']; ?></h3>
            <p class="achievement__paragraph"><?php echo $achieves_2_arr['achieves_description']; ?></p>
          </li>
          <li class="achieves__item achievement">
          <?php $achieves_3_arr = get_field('achieves_3'); ?>
            <span class="achievement__value"><?php echo $achieves_3_arr['achieves_number']; ?></span>
            <h3 class="achievement__title"><?php echo $achieves_3_arr['achieves_title']; ?></h3>
            <p class="achievement__paragraph"><?php echo $achieves_3_arr['achieves_description']; ?></p>
          </li>
        </ul>
      </div>
    </section>

    <?php 
      $achieves_1_arr = get_field('achieves_1'); 
      $achieves_1_number = $achieves_1_arr['achieves_number'];
      $achieves_1_title = $achieves_1_arr['achieves_title'];
      $achieves_1_description = $achieves_1_arr['achieves_description'];       
    ?>

    <section class="page-main__pages-links pages-links">
      <div class="pages-links__container">
        <?php wp_nav_menu(array(
          'theme_location' => 'pages',
          'container' => null,
          'menu_class' => 'pages-links__list',
          'menu_id' => ' '
        ));?>
      </div>
      <img class="separator" src="<?php echo get_template_directory_uri() . '/assets/images/separator.png'; ?>" alt="Разделитель">
    </section>

    <section class="page-main__banners banners">
      <div class="banners__container">
        <ul class="banners__list">
        <?php 
            $banners_arr = get_field('banners'); 
              foreach($banners_arr as $banner_id):
               $banner_image_arr = get_field('banner_picture', $banner_id);
               $banner_image_url = $banner_image_arr['url'];
          ?>
          <li class="banners__item banner">
            <a class="banner__link" href="<?php the_field('banner_link', $banner_id); ?>">
              <img class="banner__img" src="<?php echo $banner_image_url; ?>">
              <h3 class="banner__title"><?php the_field('banner_title', $banner_id); ?></h3>
            </a>
          </li>
          <?php  endforeach; ?>
        </ul>
      </div>
    </section>

    <section class="page-main__trash trash">
      <div class="trash__container">
        <div class="trash__item">
          <script src='https://pos.gosuslugi.ru/bin/script.min.js'></script> <style> #js-show-iframe-wrapper{position:relative;display:flex;align-items:center;justify-content:center;width:100%;min-width:293px;max-width:100%;background:linear-gradient(138.4deg,#38bafe 26.49%,#2d73bc 79.45%);color:#fff;cursor:pointer}#js-show-iframe-wrapper .pos-banner-fluid *{box-sizing:border-box}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2{display:block;width:240px;min-height:56px;font-size:18px;line-height:24px;cursor:pointer;background:#0d4cd3;color:#fff;border:none;border-radius:8px;outline:0}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:hover{background:#1d5deb}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:focus{background:#2a63ad}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:active{background:#2a63ad}@-webkit-keyframes fadeInFromNone{0%{display:none;opacity:0}1%{display:block;opacity:0}100%{display:block;opacity:1}}@keyframes fadeInFromNone{0%{display:none;opacity:0}1%{display:block;opacity:0}100%{display:block;opacity:1}}@font-face{font-family:LatoWebLight;src:url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Light.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Light.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Light.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:LatoWeb;src:url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Regular.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Regular.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Regular.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:LatoWebBold;src:url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Bold.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Bold.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Bold.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:RobotoWebLight;src:url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Light.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Light.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Light.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:RobotoWebRegular;src:url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Regular.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Regular.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Regular.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:RobotoWebBold;src:url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Bold.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Bold.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Bold.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:ScadaWebRegular;src:url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Regular.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Regular.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Regular.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:ScadaWebBold;src:url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Bold.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Bold.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Bold.ttf) format("truetype");font-style:normal;font-weight:400} </style> <style> #js-show-iframe-wrapper{background:var(--pos-banner-fluid-20__background)}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2{width:100%;min-height:52px;background:#fff;color:#0b1f33;font-size:16px;font-family:LatoWeb,sans-serif;font-weight:400;padding:0;line-height:1.2}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:active,#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:focus,#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:hover{background:#e4ecfd}#js-show-iframe-wrapper .bf-20{position:relative;display:grid;grid-template-columns:var(--pos-banner-fluid-20__grid-template-columns);grid-template-rows:var(--pos-banner-fluid-20__grid-template-rows);width:100%;max-width:var(--pos-banner-fluid-20__max-width);box-sizing:border-box;grid-auto-flow:row dense}#js-show-iframe-wrapper .bf-20__decor{background:var(--pos-banner-fluid-20__bg-url) var(--pos-banner-fluid-20__bg-url-position) no-repeat;background-size:cover;background-color:#f8efec;position:relative}#js-show-iframe-wrapper .bf-20__content{display:flex;flex-direction:column;padding:var(--pos-banner-fluid-20__content-padding);grid-row:var(--pos-banner-fluid-20__content-grid-row);justify-content:center}#js-show-iframe-wrapper .bf-20__text{margin:var(--pos-banner-fluid-20__text-margin);font-size:var(--pos-banner-fluid-20__text-font-size);line-height:1.4;font-family:LatoWeb,sans-serif;font-weight:700;color:#0b1f33}#js-show-iframe-wrapper .bf-20__bottom-wrap{display:flex;flex-direction:row;align-items:center}#js-show-iframe-wrapper .bf-20__logo-wrap{position:absolute;top:var(--pos-banner-fluid-20__logo-wrap-top);left:var(--pos-banner-fluid-20__logo-wrap-right);padding:var(--pos-banner-fluid-20__logo-wrap-padding);background:#fff;border-radius:0 0 8px 0}#js-show-iframe-wrapper .bf-20__logo{width:var(--pos-banner-fluid-20__logo-width);margin-left:1px}#js-show-iframe-wrapper .bf-20__slogan{font-family:LatoWeb,sans-serif;font-weight:700;font-size:var(--pos-banner-fluid-20__slogan-font-size);line-height:1.2;color:#005ca9}#js-show-iframe-wrapper .bf-20__btn-wrap{width:100%;max-width:var(--pos-banner-fluid-20__button-wrap-max-width)} </style > <div class="radius-10" id='js-show-iframe-wrapper'> <div class='pos-banner-fluid bf-20 radius-10'> <div class='bf-20__decor radius-10'> <div class='bf-20__logo-wrap' style="border-radius: 10px;"> <img class='bf-20__logo' src='https://pos.gosuslugi.ru/bin/banner-fluid/gosuslugi-logo-blue.svg' alt='Госуслуги' /> <div class='bf-20__slogan'>Решаем вместе</div > </div > </div > <div class='bf-20__content'> <div class='bf-20__text'> Есть предложения по организации учебного процесса или знаете, как сделать школу лучше? </div > <div class='bf-20__bottom-wrap'> <div class='bf-20__btn-wrap'> <!-- pos-banner-btn_2 не удалять; другие классы не добавлять --> <button class='pos-banner-btn_2' type='button' >Написать о проблеме </button > </div > </div> </div > </div > </div > <script> (function(){ "use strict";function ownKeys(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);if(t)o=o.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable});n.push.apply(n,o)}return n}function _objectSpread(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};if(t%2)ownKeys(Object(n),true).forEach(function(t){_defineProperty(e,t,n[t])});else if(Object.getOwnPropertyDescriptors)Object.defineProperties(e,Object.getOwnPropertyDescriptors(n));else ownKeys(Object(n)).forEach(function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))})}return e}function _defineProperty(e,t,n){if(t in e)Object.defineProperty(e,t,{value:n,enumerable:true,configurable:true,writable:true});else e[t]=n;return e}var POS_PREFIX_20="--pos-banner-fluid-20__",posOptionsInitialBanner20={background:"#f8b200","grid-template-columns":"100%","grid-template-rows":"262px auto","max-width":"100%","text-font-size":"20px","text-margin":"0 0 24px 0","button-wrap-max-width":"100%","bg-url":"url('https://pos.gosuslugi.ru/bin/banner-fluid/18/banner-fluid-bg-18-2.svg')","bg-url-position":"right bottom","content-padding":"26px 24px 24px","content-grid-row":"0","logo-wrap-padding":"16px 12px 12px","logo-width":"65px","logo-wrap-top":"0","logo-wrap-left":"0","slogan-font-size":"12px"},setStyles=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:POS_PREFIX_20;Object.keys(e).forEach(function(o){t.style.setProperty(n+o,e[o])})},removeStyles=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:POS_PREFIX_20;Object.keys(e).forEach(function(e){t.style.removeProperty(n+e)})};function changePosBannerOnResize(){var e=document.documentElement,t=_objectSpread({},posOptionsInitialBanner20),n=document.getElementById("js-show-iframe-wrapper"),o=n?n.offsetWidth:document.body.offsetWidth;if(o>340)t["button-wrap-max-width"]="209px";if(o>482)t["content-padding"]="24px",t["text-font-size"]="24px";if(o>568)t["grid-template-columns"]="1fr 292px",t["grid-template-rows"]="100%",t["content-grid-row"]="1",t["content-padding"]="32px 24px",t["bg-url-position"]="calc(100% + 35px) bottom";if(o>610)t["bg-url-position"]="calc(100% + 12px) bottom";if(o>726)t["bg-url-position"]="right bottom";if(o>783)t["grid-template-columns"]="1fr 390px";if(o>820)t["grid-template-columns"]="1fr 420px",t["bg-url-position"]="right bottom";if(o>1098)t["bg-url"]="url('https://pos.gosuslugi.ru/bin/banner-fluid/18/banner-fluid-bg-18-3.svg')",t["bg-url-position"]="calc(100% + 55px) bottom",t["grid-template-columns"]="1fr 557px",t["text-font-size"]="32px",t["content-padding"]="32px 32px 32px 50px",t["logo-width"]="78px",t["slogan-font-size"]="15px",t["logo-wrap-padding"]="20px 16px 16px";if(o>1422)t["max-width"]="1422px",t["grid-template-columns"]="1fr 720px",t["content-padding"]="32px 48px 32px 160px",t.background="linear-gradient(90deg, #f8b200 50%, #f8efec 50%)";setStyles(t,e)}changePosBannerOnResize(),window.addEventListener("resize",changePosBannerOnResize),window.onunload=function(){var e=document.documentElement,t=_objectSpread({},posOptionsInitialBanner20);window.removeEventListener("resize",changePosBannerOnResize),removeStyles(t,e)}; })() </script> <script>Widget("https://pos.gosuslugi.ru/form", 293811)</script>
        </div>  
      </div>
    </section>

  </main>

  <?php get_footer(); ?>