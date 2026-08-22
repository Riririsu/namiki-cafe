<?php
/**
 * Template Name: フロントページ（トップページ）
 * front-page.php は「表示設定」で固定ページをホームページに設定した場合に自動的に使用されます。
 */

get_header();
?>

<div class="m_slider js_slider" aria-label="メインビジュアル">
      <ul class="m_slider__list js_slider-list">
        <!-- スライド 1 -->
        <li class="m_slider__item">
          <div class="img_wrapper m_slider__img-wrap">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_01_SP.jpg"
              width="750"
              height="1000"
              alt="店内の様子1"
              class="m_slider__img m_slider__img--sp"
            />
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_01_PC.png"
              width="1600"
              height="700"
              alt="店内の様子1"
              class="m_slider__img m_slider__img--pc"
            />
          </div>
        </li>

        <!-- スライド 2 -->
        <li class="m_slider__item">
          <div class="img_wrapper m_slider__img-wrap">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_02_SP.jpg"
              width="750"
              height="1000"
              alt="店内の様子2"
              class="m_slider__img m_slider__img--sp"
            />
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_02_PC.png"
              width="1600"
              height="700"
              alt="店内の様子2"
              class="m_slider__img m_slider__img--pc"
            />
          </div>
        </li>

        <!-- スライド 3 -->
        <li class="m_slider__item">
          <div class="img_wrapper m_slider__img-wrap">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_03_SP.jpg"
              width="750"
              height="1000"
              alt="店内の様子3"
              class="m_slider__img m_slider__img--sp"
            />
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_03_PC.png"
              width="1600"
              height="700"
              alt="店内の様子3"
              class="m_slider__img m_slider__img--pc"
            />
          </div>
        </li>

        <!-- スライド 4 -->
        <li class="m_slider__item">
          <div class="img_wrapper m_slider__img-wrap">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_04_SP.jpg"
              width="750"
              height="1000"
              alt="店内の様子4"
              class="m_slider__img m_slider__img--sp"
            />
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_FV_04_PC.png"
              width="1600"
              height="700"
              alt="店内の様子4"
              class="m_slider__img m_slider__img--pc"
            />
          </div>
        </li>
      </ul>

      <p class="m_slider__catch">表参道で見つける<br />私だけのくつろぎ時間</p>
    </div>

    <main class="l_main">
      <!-- CONCEPT -->
      <section id="concept" class="page_top__concept">
        <div class="page_top__concept__inner l_container">
          <p class="u_eyebrow">CONCEPT</p>

          <div class="top_concept_contents-wrapper">
            <div class="top_concept_text-wrapper">
              <h2 class="page_top__concept__heading">
                忙しい日々に、<br />やさしい余白を。
              </h2>

              <div class="page_top__concept__body">
                <p class="page_top__concept__desc">
                  扉を開ければ、そこは時間がゆっくりと流れる場所。
                </p>
                <p class="page_top__concept__desc">
                  表参道の路地裏に佇む当カフェは、木の温もりと柔らかな光の中で、本格コーヒーと自家製スイーツを味わえる小さな隠れ家です。
                </p>
                <p class="page_top__concept__desc">
                  気持ちを少しリセットしたい時、一杯のコーヒーがあなたをそっと包み込みます。今日も、明日も、あなたの日常に寄り添う安らぎを。
                </p>
              </div>
            </div>

            <div class="page_top__concept__imgs">
              <div class="img_wrapper page_top__concept__img">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_concept_01.png"
                  width="200"
                  height="141"
                  alt="観葉植物とランプの置かれた店内"
                  class="page_top__concept__img-el"
                />
              </div>
              <div class="img_wrapper page_top__concept__img">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_concept_02.png"
                  width="200"
                  height="141"
                  alt="ドリップコーヒーを淹れる様子"
                  class="page_top__concept__img-el"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- MENU -->
      <section id="menu" class="page_top__menu">
        <div class="page_top__menu__inner">
          <p class="u_eyebrow">MENU</p>

          <div class="page_top__menu__featured">
            <span class="m_badge">季節限定</span>
            <div class="img_wrapper page_top__menu__featured-img">
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_menu_season.png"
                width="750"
                height="500"
                alt="季節のカフェ"
                class="page_top__menu__featured-img-el"
              />
            </div>
            <p class="page_top__menu__featured-name">季節のカフェ</p>
            <p class="page_top__menu__featured-price">¥500-</p>
          </div>

          <div class="m_tab js_tab">
            <ul class="m_tab__list" role="tablist">
              <li>
                <button
                  type="button"
                  class="m_tab__btn js_tab-btn is-active"
                  data-target="drink"
                  role="tab"
                  aria-selected="true"
                >
                  DRINK
                </button>
              </li>
              <li>
                <button
                  type="button"
                  class="m_tab__btn js_tab-btn"
                  data-target="food"
                  role="tab"
                  aria-selected="false"
                >
                  FOOD
                </button>
              </li>
              <li>
                <button
                  type="button"
                  class="m_tab__btn js_tab-btn"
                  data-target="lunch"
                  role="tab"
                  aria-selected="false"
                >
                  LUNCH
                </button>
              </li>
            </ul>

            <!-- ==========================================
          DRINK パネル
          ========================================== -->
            <div
              class="page_top__menu__list js_tab-panel"
              data-panel="drink"
              role="tabpanel"
            >
              <!-- 1〜3個目の特殊配置ブロック -->
              <ul class="page_top__menu__group-top">
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_1.png"
                      width="343"
                      height="239"
                      alt="ブレンドコーヒー"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">ブレンドコーヒー</p>
                  <p class="page_top__menu__price">¥500-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_2.png"
                      width="343"
                      height="239"
                      alt="エスプレッソ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">エスプレッソ</p>
                  <p class="page_top__menu__price">¥500-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_3.png"
                      width="343"
                      height="239"
                      alt="コールドブリュー"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">コールドブリュー</p>
                  <p class="page_top__menu__price">¥470-</p>
                </li>
              </ul>

              <!-- 4番目以降の通常2列/3列グリッドブロック -->
              <ul class="page_top__menu__group-bottom">
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_4.png"
                      width="343"
                      height="239"
                      alt="カフェラテ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">カフェラテ</p>
                  <p class="page_top__menu__price">¥600-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_4.png"
                      width="343"
                      height="239"
                      alt="ラテアート"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">ラテアート</p>
                  <p class="page_top__menu__price">¥900-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_5.png"
                      width="343"
                      height="239"
                      alt="抹茶ラテ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">抹茶ラテ</p>
                  <p class="page_top__menu__price">¥700-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_6.png"
                      width="343"
                      height="239"
                      alt="カフェモカ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">カフェモカ</p>
                  <p class="page_top__menu__price">¥600-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_7.png"
                      width="343"
                      height="239"
                      alt="ショコラテ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">ショコラテ</p>
                  <p class="page_top__menu__price">¥700-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_drink_8.png"
                      width="343"
                      height="239"
                      alt="スムージー"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">スムージー</p>
                  <p class="page_top__menu__price">¥800-</p>
                </li>
              </ul>
            </div>
            <div
              class="page_top__menu__list js_tab-panel is-hidden"
              data-panel="food"
              role="tabpanel"
            >
              <!-- 1〜3個目の特殊配置ブロック -->
              <ul class="page_top__menu__group-top">
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_food_1.png"
                      width="343"
                      height="239"
                      alt="チーズケーキ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">チーズケーキ</p>
                  <p class="page_top__menu__price">¥400-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_food_2.png"
                      width="343"
                      height="239"
                      alt="プリンアラモード"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">プリンアラモード</p>
                  <p class="page_top__menu__price">¥500-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_food_3.png"
                      width="343"
                      height="239"
                      alt="コーヒーゼリー"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">コーヒーゼリー</p>
                  <p class="page_top__menu__price">¥450-</p>
                </li>
              </ul>

              <!-- 4番目以降の通常2列/3列グリッドブロック -->
              <ul class="page_top__menu__group-bottom">
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_food_4.png"
                      width="343"
                      height="239"
                      alt="クロワッサン"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">クロワッサン</p>
                  <p class="page_top__menu__price">¥300-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_food_5.png"
                      width="343"
                      height="239"
                      alt="ショコラ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">ショコラ</p>
                  <p class="page_top__menu__price">¥600-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_food_6.png"
                      width="343"
                      height="239"
                      alt="野菜のキッシュ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">野菜のキッシュ</p>
                  <p class="page_top__menu__price">¥700-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_food_7.png"
                      width="343"
                      height="239"
                      alt="サンドウィッチ"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">サンドウィッチ</p>
                  <p class="page_top__menu__price">¥800-</p>
                </li>
              </ul>
            </div>
            <div
              class="page_top__menu__list js_tab-panel is-hidden"
              data-panel="lunch"
              role="tabpanel"
            >
              <!-- 1〜3個目ブロック -->
              <ul class="page_top__menu__group-top">
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_lunch_1.png"
                      width="343"
                      height="239"
                      alt="ランチセットA"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">ランチセットA</p>
                  <p class="page_top__menu__price">¥1000-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_lunch_2.png"
                      width="343"
                      height="239"
                      alt="ランチセットB"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">ランチセットB</p>
                  <p class="page_top__menu__price">¥1200-</p>
                </li>
                <li class="page_top__menu__item">
                  <div class="img_wrapper page_top__menu__thumb">
                    <img
                      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_lunch_3.png"
                      width="343"
                      height="239"
                      alt="ランチセットC"
                      class="page_top__menu__thumb-el"
                    />
                  </div>
                  <p class="page_top__menu__name">ランチセットC</p>
                  <p class="page_top__menu__price">¥1200-</p>
                </li>
              </ul>


            </div>
          </div>
        </div>
      </section>

      <section id="news" class="page_top__news">
        <div class="page_top__news__inner l_container">
          <p class="u_eyebrow">NEWS</p>

          <!-- ニュースリスト（最新3件） -->
          <div class="page_top__news__list">
            <?php
            $namiki_news_preview = new WP_Query(
                array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                )
            );
            ?>
            <?php if ( $namiki_news_preview->have_posts() ) : ?>
              <?php while ( $namiki_news_preview->have_posts() ) : $namiki_news_preview->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="page_top__news__item">
                  <div class="page_top__news__meta">
                    <time class="page_top__news__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php namiki_the_date_dot(); ?></time>
                    <span class="page_top__news__category"><?php namiki_the_category_label(); ?></span>
                  </div>
                  <h3 class="page_top__news__title"><?php the_title(); ?></h3>
                </a>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <p>現在お知らせはありません。</p>
            <?php endif; ?>
          </div>

          <!-- VIEW MORE リンク -->
          <div class="page_top__news__more-container">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="page_top__news__more-btn">VIEW MORE</a>
          </div>
        </div>
      </section>

      <section class="photo-section">
        <!-- スライドショーエリア -->
        <div class="about-slider-outer">
          <div class="about-slider-track">
            <!-- 【セットA（オリジナル）】 -->
            <div class="about-slide-group">
              <div class="slide-col-double">
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-01.png" alt="カフェ店内1" />
                </div>
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-02.png" alt="ドリップコーヒー" />
                </div>
              </div>
              <div class="slide-col-tall">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-03.png" alt="窓際の席" />
              </div>
              <div class="slide-col-slim">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-04.png" alt="テラス入り口" />
              </div>
              <div class="slide-col-wide">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-05.png" alt="カウンター内装" />
              </div>
              <div class="slide-col-double">
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-06.png" alt="ペンダントライト" />
                </div>
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-07.png" alt="窓辺の観葉植物" />
                </div>
              </div>
            </div>

            <!-- 【セットB（無限ループ用の複製)】 -->
            <div class="about-slide-group" aria-hidden="true">
              <div class="slide-col-double">
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-01.png" alt="カフェ店内1" />
                </div>
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-02.png" alt="ドリップコーヒー" />
                </div>
              </div>
              <div class="slide-col-tall">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-03.png" alt="窓際の席" />
              </div>
              <div class="slide-col-slim">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-04.png" alt="テラス入り口" />
              </div>
              <div class="slide-col-wide">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-05.png" alt="カウンター内装" />
              </div>
              <div class="slide-col-double">
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-06.png" alt="ペンダントライト" />
                </div>
                <div class="slide-img-s">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_gallery-07.png" alt="窓辺の観葉植物" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ABOUT -->
      <section id="about" class="page_top__about">
        <div class="page_top__about__inner">
          <p class="u_eyebrow">ABOUT</p>
          <div class="img_wrapper page_top__about__main-img">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_about_01.png"
              width="320"
              height="400"
              alt="店主"
              class="page_top__about__main-img-el"
            />
          </div>
          <div class="page_top__about__body">
            <p class="page_top__about__desc">
              今日もう少し頑張れたな。そんな自分に、ふと言い出してもらえる場所であたい。そんな想いから、この珈琲店は生まれました。
            </p>
            <p class="page_top__about__desc">
              両親が営む珈琲屋育てで育ち、その温もりに触れながら、いつか自分の店を開きたいという夢を抱いてきました。自然由来の素材で、7年間パティスリーで経験を積み、店の夢が広がったことを感じました。
            </p>
            <p class="page_top__about__desc">
              私たちが目指すのは「お客さまに」と思っていただける時間と空間を作ること。
            </p>
            <p class="page_top__about__desc">
              昔ながらの喫茶店の温もりと、今の暮らしに寄り添う機能とを兼ね備えた、ほっとひと息つけるひとときをお過ごしください。
            </p>
          </div>
          <div class="page_top__about__sub-imgs">
            <div class="img_wrapper">
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_about_02.png"
                width="240"
                height="180"
                alt="店内の様子1"
                class="page_top__about__sub-img-el"
              />
            </div>
            <div class="img_wrapper">
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_about_03.png"
                width="240"
                height="180"
                alt="店内の様子2"
                class="page_top__about__sub-img-el"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- SHOP INFO -->
      <section id="shop-info" class="page_top__shop-info">
        <div class="page_top__shop-info__inner">
          <div>
            <p class="u_eyebrow">SHOP INFO</p>
            <!-- FIXME: 下記文章を修正 -->
            <p class="page_top__shop-info__name">並木珈琲 NAMIKI COFFEE</p>
            <p class="page_top__shop-info__addr">
              〒○○○○<br />東京都渋谷区神宮前3丁目1-25<br />外苑前駅から徒歩5分
            </p>
            <dl class="page_top__shop-info__table">
              <div class="page_top__shop-info__row">
                <dt>営業時間</dt>
                <dd>10:00〜19:00</dd>
              </div>
              <div class="page_top__shop-info__row">
                <dt>定休日</dt>
                <dd>不定休</dd>
              </div>
              <div class="page_top__shop-info__row">
                <dt>TEL</dt>
                <dd>000-0000-0000</dd>
              </div>
              <div class="page_top__shop-info__row">
                <dt>席数</dt>
                <dd>28席</dd>
              </div>
              <!-- FIXME: 下記備考追記 -->
              <div class="page_top__shop-info__row">
                <dt>備考</dt>
                <dd>テイクアウト利用可／Wi-Fi完備／喫煙不可</dd>
              </div>
            </dl>
          </div>
          <div class="page_top__shop-info__map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.2805745334113!2d139.7114525741355!3d35.67009283058855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c98d68023bb%3A0xfa4b70dd1475ff44!2z44CSMTUwLTAwMDEg5p2x5Lqs6YO95riL6LC35Yy656We5a6u5YmN77yT5LiB55uu77yR4oiS77yS77yV!5e0!3m2!1sja!2sjp!4v1784699374245!5m2!1sja!2sjp"
              width="600"
              height="450"
              style="border: 0"
              allowfullscreen
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="店舗地図"
            ></iframe>
          </div>
        </div>
      </section>

      <!-- CONTACT -->
      <section id="contact" class="page_top__contact">
        <div class="page_top__contact__inner">
          <header class="page_top__contact__header">
            <h2 class="u_eyebrow">CONTACT</h2>
          </header>

          <div class="page_top__contact__content">
            <p class="page_top__contact__text">
              お問い合わせは、<br />
              お電話もしくはInstagramのDMより<br
                class="sp-only"
              />ご連絡ください
            </p>

            <!-- アクションボタン -->
            <div class="page_top__contact__buttons">
              <!-- Instagram -->
              <a
                href="https://instagram.com"
                target="_blank"
                rel="noopener"
                class="page_top__contact__btn"
              >
                <svg
                  class="page_top__contact__btn-icon icon-insta"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path
                    d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"
                  ></path>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
                <span>Instagram</span>
              </a>

              <!-- TEL -->
              <a href="tel:00000000000" class="page_top__contact__btn">
                <svg
                  class="page_top__contact__btn-icon icon-phone"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                  ></path>
                </svg>
                <span>000-0000-0000</span>
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
