<?php get_header(); ?>

<main>
  <section class="mv">
    <div class="mv__wrap">
      <h1>
        <span class="red">Y</span>
        <span>o</span>
        <span>k</span>
        <span class="r-margin">o</span>
        <span class="green">P</span>
        <span>o</span>
        <span>r</span>
        <span>t</span>
        <span class="blue">F</span>
        <span>o</span>
        <span>l</span>
        <span>i</span>
        <span>o</span>
        <span class="yellow">.</span>
      </h1>
      <p class="mv__text">現役フロントエンドエンジニアの<br class="sp-only">お遊びポートフォリオ</p>
      <div class="mv__mark">
        <div class="circle"></div>
        <div class="triangle"></div>
        <div class="square"></div>
        <div class="cross"></div>
      </div>
    </div>
    <div class="mv__anime">
      <?php for($i = 1; $i <= 15; $i++): ?>
        <div class="item circle"></div>
        <div class="item square"></div>
        <div class="item triangle"></div>
        <div class="item cross"></div>
      <?php endfor; ?>
    </div>
  </section>

  <section class="news">
    <div class="news__wrap">
      <h2 class="news__head fadeInUpScroll"><span>お知らせ</span>NEWS</h2>
      <?php
      $newsArgs = array(
        'posts_per_page' => 3,
        'post_type' => 'post',
        'category_name' => 'news'
      );
      $newsQuery = new WP_Query($newsArgs);
      if ($newsQuery->have_posts()): ?>
        <ul class="news__list">
          <?php while ($newsQuery->have_posts()): $newsQuery->the_post(); ?>
            <li class="fadeInUpScroll">
              <a href="<?php the_permalink(); ?>">
                <p class="news__date"><?php the_date('Y.m.d'); ?></p>
                <p class="news__title"><?php the_title(); ?></p>
              </a>
            </li>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </ul>
        <?php if ($newsQuery->max_num_pages > 1): ?>
          <a class="template__btn" href="<?php echo esc_url(home_url('/news/')); ?>">過去のお知らせ</a>
        <?php endif; ?>
      <?php else: ?>
        <p class="news__none fadeInUpScroll">現在お知らせはありません。</p>
      <?php endif; ?>
    </div>
  </section>

  <section class="about">
    <div class="about__bg fadeInUpScroll">
      <div class="about__wrap">
        <h2 class="about__head fadeInUpScroll"><span>自己紹介</span>ABOUT</h2>
        <p class="about__text fadeInUpScroll">
          はじめまして、このサイトにお越しいただきありがとうございます。<br>
          北海道にて現役フロントエンドエンジニアの「よこ」と申します。</p>
        <p class="about__text fadeInUpScroll">
          異業種から約半年間職業訓練校（北関東学院）に通っておりました。<br>
          まだまだひよっこエンジニアですが、<br class="sp-only">日々学習し技術力を上げています！
        </p>
        <p class="about__text fadeInUpScroll">
          Webサイトを作るだけではなく、運用後のSEOにも強い会社に所属しております。<br>
          見た目は勿論、内部の記述にもこだわってコーディングをしています。
        </p>
        <p class="about__text fadeInUpScroll">
          ただ、デザイン力は一切無いので、ご勘弁ください。
        </p>
        <p class="about__text fadeInUpScroll">
          今はWordPressのテーマを<br class="sp-only">触る機会が多いですが、<br class="sp-only">Vue/Laravel等のフレームワークも<br class="sp-only">扱えるようになりたい！
        </p>
        <p class="about__text fadeInUpScroll">
          このサイトは<br class="sp-only">自分のポートフォリオ兼WordPressの<br class="sp-only">機能を色々確かめるサイトにします笑<br>
          URLを見るとわかると思いますが、<br class="sp-only">Xserverの無料サーバーなので<br class="sp-only">容量一杯にならないように適度に遊びます！
        </p>
      </div>
    </div>
  </section>

  <section class="skill">
    <div class="skill__wrap">
      <h2 class="skill__head fadeInUpScroll"><span>取得技術</span>SKILL</h2>
      <p class="skill__explain fadeInUpScroll">各項目ごとに使用可能な技術を一覧にしています。<br>記載しているもの全てが完璧に使いこなせる訳ではありません。</p>
      <section class="skill__area">
        <div class="skill__box">
          <h3 class="skill__kinds">CODING</h3>
          <p class="skill__explain">使用可能な言語、ライブラリ、フレームワーク</p>
          <ul class="skill__list">
            <li class="skill__item fadeInScroll">HTML5</li>
            <li class="skill__item fadeInScroll">CSS3</li>
            <li class="skill__item fadeInScroll">SCSS</li>
            <li class="skill__item fadeInScroll">PHP</li>
            <li class="skill__item fadeInScroll">Laravel</li>
            <li class="skill__item fadeInScroll">JavaScript Vanilla</li>
            <li class="skill__item fadeInScroll">Vue</li>
            <li class="skill__item fadeInScroll">jQuery</li>
            <li class="skill__item fadeInScroll">Liquid</li>
          </ul>
        </div>
        <div class="skill__img fadeInLeftScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg01.webp" alt="HTMLソースコードの画像" width="560" height="420" loading="lazy"></div>
      </section>
      <section class="skill__area">
        <div class="skill__box">
          <h3 class="skill__kinds">INFRASTRUCTURE</h3>
          <p class="skill__text">インフラ関連で対応出来る作業</p>
          <ul class="skill__list">
            <li class="skill__item fadeInScroll">ドメイン取得</li>
            <li class="skill__item fadeInScroll">サーバー管理</li>
            <li class="skill__item fadeInScroll">サーバー移管</li>
            <li class="skill__item fadeInScroll">レジストラ移管</li>
            <li class="skill__item fadeInScroll">DNSレコード変更</li>
            <li class="skill__item fadeInScroll">サイトバックアップ取得</li>
          </ul>
        </div>
        <div class="skill__img fadeInRightScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg02.webp" alt="サーバールームの画像" width="560" height="420" loading="lazy"></div>
      </section>
      <section class="skill__area">
        <div class="skill__box">
          <h3 class="skill__kinds">MEASUREMENT</h3>
          <p class="skill__text">サイトアクセス等の使用可能ツール</p>
          <ul class="skill__list">
            <li class="skill__item fadeInScroll">Google Analytics</li>
            <li class="skill__item fadeInScroll">Google Tag Manager</li>
            <li class="skill__item fadeInScroll">Google Search Console</li>
            <li class="skill__item fadeInScroll">Screaming Frog</li>
          </ul>
        </div>
        <div class="skill__img fadeInLeftScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg03.webp" alt="計測イメージの画像" width="560" height="420" loading="lazy"></div>
      </section>

      <section class="skill__area">
        <dev class="skill__box">
          <h3 class="skill__kinds">TOOL</h3>
          <p class="skill__text">作業関連で使用可能なツール、CMS</p>
          <ul class="skill__list">
            <li class="skill__item fadeInScroll">Docker</li>
            <li class="skill__item fadeInScroll">MAMP</li>
            <li class="skill__item fadeInScroll">GitLab</li>
            <li class="skill__item fadeInScroll">WordPress</li>
            <li class="skill__item fadeInScroll">Shopify</li>
            <li class="skill__item fadeInScroll">a-blog CMS</li>
            <li class="skill__item fadeInScroll">Lighthouse</li>
          </ul>
        </dev>
        <div class="skill__img fadeInRightScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg04.webp" alt="歯車の画像" width="560" height="420" loading="lazy"></div>
      </section>
      <section class="skill__area">
        <div class="skill__box">
          <h3 class="skill__kinds fadeInScroll">DESIGN</h3>
          <p class="skill__text">デザインに関連する使用可能ツール<br><small>※デザインメインの人間ではありません</small></p>
          <ul class="skill__list">
            <li class="skill__item fadeInScroll">Adobe XD</li>
            <li class="skill__item fadeInScroll">Adobe Photoshop</li>
            <li class="skill__item fadeInScroll">Figma</li>
            <li class="skill__item fadeInScroll">Canva</li>
          </ul>
        </div>
        <div class="skill__img fadeInLeftScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg05.webp" alt="Webデザインのイメージ画像" width="560" height="420" loading="lazy"></div>
      </section>
    </div>
  </section>

  <?php
  $args = array(
    'post_type' => 'works',
    'posts_per_page' => 5,
  );
  $worksQuery = new WP_Query($args);
  if ($worksQuery->have_posts()): ?>
    <section class="work">
      <div class="work__bg">
        <div class="work__wrap">
          <h2 class="work__head fadeInUpScroll"><span>制作実績</span>WORKS</h2>
          <div class="work__list splide fadeInScroll">
            <div class="splide__track">
              <div class="splide__list">
                <?php while ($worksQuery->have_posts()): $worksQuery->the_post(); ?>
                  <div class="splide__slide work__item">
                    <a href="<?php the_permalink(); ?>">
                      <div class="work__thumb">
                        <?php if (has_post_thumbnail()): ?>
                          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="388" height="218" loading="lazy">
                        <?php else: ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/temp/no-image.webp" alt="no image" width="388" height="218" loading="lazy">
                        <?php endif; ?>
                      </div>
                      <p class="work__title"><?php the_title(); ?></p>
                      <div class="work__content">
                        <p class="work__name">使用言語</p>
                        <p class="work__text"><?php the_field('worksLang'); ?></p>
                      </div>
                      <div class="work__content">
                        <p class="work__name">制作期間</p>
                        <p class="work__text"><?php the_field('worksTime'); ?></p>
                      </div>
                    </a>
                  </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
              </div>
            </div>
          </div>
          <a class="work__link white-color" href="<?php echo esc_url(home_url('/works/')); ?>">他の制作実績を見る</a>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="link">
    <div class="link__wrap">
      <h2 class="link__head fadeInUpScroll"><span>関連リンク</span>LINK</h2>
      <div class="link__list fadeInUpScroll">
        <div class="link__item">
          <a href="https://qiita.com/yokoyokocom" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/link_qiita.webp" alt="Qiita"></a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>