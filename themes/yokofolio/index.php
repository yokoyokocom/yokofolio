<?php get_header(); ?>

<main>
  <section class="p-homeMv">
    <div class="p-homeMv__inner l-inner">
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
      <p class="p-homeMv__text">現役フロントエンドエンジニアの<br class="sp-only">お遊びポートフォリオ。</p>
      <div class="p-homeMv__mark">
        <div class="circle"></div>
        <div class="triangle"></div>
        <div class="square"></div>
        <div class="cross"></div>
      </div>
    </div>
    <div class="p-homeMv__anime">
      <?php for($i = 1; $i <= 15; $i++): ?>
        <div class="item circle"></div>
        <div class="item square"></div>
        <div class="item triangle"></div>
        <div class="item cross"></div>
      <?php endfor; ?>
    </div>
  </section>

  <section class="p-homeNews">
    <div class="p-homeNews__inner l-inner">
      <h2 class="c-homeHead fadeInUpScroll"><span class="jp">お知らせ</span><span class="blue">N</span>EWS</h2>
      <?php
      $newsArgs = array(
        'posts_per_page' => 3,
        'post_type' => 'post',
        'category_name' => 'news'
      );
      $newsQuery = new WP_Query($newsArgs);
      if ($newsQuery->have_posts()): ?>
        <ul class="p-homeNews__list">
          <?php while ($newsQuery->have_posts()): $newsQuery->the_post(); ?>
            <li class="fadeInUpScroll">
              <a href="<?php the_permalink(); ?>">
                <p class="p-homeNews__date"><?php the_date('Y.m.d'); ?></p>
                <p class="p-homeNews__title"><?php the_title(); ?></p>
              </a>
            </li>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </ul>
        <?php if ($newsQuery->max_num_pages > 1): ?>
          <a class="template__btn" href="<?php echo esc_url(home_url('/news/')); ?>">過去のお知らせ</a>
        <?php endif; ?>
      <?php else: ?>
        <p class="p-homeNews__none fadeInUpScroll">現在お知らせはありません。</p>
      <?php endif; ?>
    </div>
  </section>

  <section class="p-homeAbout">
    <div class="p-homeAbout__bg fadeInUpScroll">
      <div class="p-homeAbout__inner l-inner">
        <h2 class="p-homeAbout__head c-homeHead fadeInUpScroll"><span class="jp">じぶんのこと</span><span class="green">A</span>BOUT</h2>
        <p class="p-homeAbout__text fadeInUpScroll">
          はじめまして、このサイトにお越しいただきありがとうございます。<br>
          北海道にて現役フロントエンドエンジニアの「よこ」と申します。</p>
        <p class="p-homeAbout__text fadeInUpScroll">
          異業種から約半年間職業訓練校（北関東学院）に通っておりました。<br>
          まだまだひよっこエンジニアですが、<br class="sp-only">日々学習し技術力を上げています！
        </p>
        <p class="p-homeAbout__text fadeInUpScroll">
          Webサイトを作るだけではなく、制作後のSEOに強い会社に所属しております。<br>
          見た目は勿論、内部の記述にもこだわってコーディングをしています。
        </p>
        <p class="p-homeAbout__text fadeInUpScroll">
          ただ、デザイン力は一切無いので、ご勘弁ください。
        </p>
        <p class="p-homeAbout__text fadeInUpScroll">
          このサイトは<br class="sp-only">自分のポートフォリオ兼色々遊ぶ用のサイトです。<br>
          無料サーバーなので<br class="sp-only">容量一杯にならないように適度に遊びます！
        </p>
      </div>
    </div>
  </section>

  <section class="p-homeSkill">
    <div class="p-homeSkill__inner l-inner">
      <h2 class="c-homeHead fadeInUpScroll"><span class="jp">できること</span><span class="red">S</span>KILL</h2>
      <p class="p-homeSkill__explain fadeInUpScroll">各項目ごとに使用可能な技術を一覧にしています。<br>記載しているもの全てが完璧に使いこなせる訳ではありません。</p>
      <section class="p-homeSkill__area">
        <div class="p-homeSkill__box">
          <h3 class="p-homeSkill__kinds">CODING</h3>
          <p class="p-homeSkill__explain">使ったことある言語、ライブラリ、フレームワーク</p>
          <ul class="p-homeSkill__list">
            <li class="p-homeSkill__item fadeInScroll">HTML5</li>
            <li class="p-homeSkill__item fadeInScroll">CSS3</li>
            <li class="p-homeSkill__item fadeInScroll">SCSS</li>
            <li class="p-homeSkill__item fadeInScroll">PHP</li>
            <li class="p-homeSkill__item fadeInScroll">Laravel</li>
            <li class="p-homeSkill__item fadeInScroll">JavaScript Vanilla</li>
            <li class="p-homeSkill__item">Three.js</li>
            <li class="p-homeSkill__item fadeInScroll">Vue</li>
            <li class="p-homeSkill__item fadeInScroll">jQuery</li>
            <li class="p-homeSkill__item fadeInScroll">Liquid</li>
          </ul>
        </div>
        <div class="p-homeSkill__img anime-set"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg01.webp" alt="HTMLソースコードの画像" width="560" height="420" loading="lazy"></div>
      </section>
      <section class="p-homeSkill__area">
        <div class="p-homeSkill__box">
          <h3 class="p-homeSkill__kinds">INFRASTRUCTURE</h3>
          <p class="p-homeSkill__text">インフラ関連で対応出来る作業</p>
          <ul class="p-homeSkill__list">
            <li class="p-homeSkill__item fadeInScroll">ドメイン取得</li>
            <li class="p-homeSkill__item fadeInScroll">サーバー設定</li>
            <li class="p-homeSkill__item fadeInScroll">サーバー移管</li>
            <li class="p-homeSkill__item fadeInScroll">レジストラ移管</li>
            <li class="p-homeSkill__item fadeInScroll">DNSレコード変更</li>
            <li class="p-homeSkill__item fadeInScroll">サイトバックアップ取得</li>
          </ul>
        </div>
        <div class="p-homeSkill__img fadeInRightScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg02.webp" alt="サーバールームの画像" width="560" height="420" loading="lazy"></div>
      </section>
      <section class="p-homeSkill__area">
        <div class="p-homeSkill__box">
          <h3 class="p-homeSkill__kinds">MEASUREMENT</h3>
          <p class="p-homeSkill__text">アクセス解析等の使用可能ツール</p>
          <ul class="p-homeSkill__list">
            <li class="p-homeSkill__item fadeInScroll">Google Analytics</li>
            <li class="p-homeSkill__item fadeInScroll">Google Tag Manager</li>
            <li class="p-homeSkill__item fadeInScroll">Google Search Console</li>
            <li class="p-homeSkill__item fadeInScroll">Screaming Frog</li>
          </ul>
        </div>
        <div class="p-homeSkill__img fadeInLeftScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg03.webp" alt="計測イメージの画像" width="560" height="420" loading="lazy"></div>
      </section>

      <section class="p-homeSkill__area">
        <dev class="p-homeSkill__box">
          <h3 class="p-homeSkill__kinds">TOOL</h3>
          <p class="p-homeSkill__text">作業関連で使用可能なツール、CMS</p>
          <ul class="p-homeSkill__list">
            <li class="p-homeSkill__item fadeInScroll">Docker</li>
            <li class="p-homeSkill__item fadeInScroll">MAMP</li>
            <li class="p-homeSkill__item fadeInScroll">GitHub</li>
            <li class="p-homeSkill__item fadeInScroll">GitLab</li>
            <li class="p-homeSkill__item fadeInScroll">WordPress</li>
            <li class="p-homeSkill__item fadeInScroll">Shopify</li>
            <li class="p-homeSkill__item fadeInScroll">a-blog CMS</li>
            <li class="p-homeSkill__item fadeInScroll">Lighthouse</li>
          </ul>
        </dev>
        <div class="p-homeSkill__img fadeInRightScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg04.webp" alt="歯車の画像" width="560" height="420" loading="lazy"></div>
      </section>
      <section class="p-homeSkill__area">
        <div class="p-homeSkill__box">
          <h3 class="p-homeSkill__kinds fadeInScroll">DESIGN</h3>
          <p class="p-homeSkill__text">デザインに関連する使用可能ツール<br><small>※デザインメインの人間ではありません</small></p>
          <ul class="p-homeSkill__list">
            <li class="p-homeSkill__item fadeInScroll">Adobe XD</li>
            <li class="p-homeSkill__item fadeInScroll">Adobe Photoshop</li>
            <li class="p-homeSkill__item fadeInScroll">Figma</li>
            <li class="p-homeSkill__item fadeInScroll">Canva</li>
          </ul>
        </div>
        <div class="p-homeSkill__img fadeInLeftScroll"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/skill_bg05.webp" alt="Webデザインのイメージ画像" width="560" height="420" loading="lazy"></div>
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
    <section class="p-homeWork">
      <div class="p-homeWork__bg">
        <div class="p-homeWork__inner l-inner">
          <h2 class="p-homeWork__head c-homeHead fadeInUpScroll"><span class="jp">つくったもの</span><span class="yellow">W</span>ORKS</h2>
          <div class="p-homeWork__list splide fadeInScroll">
            <div class="splide__track">
              <div class="splide__list">
                <?php while ($worksQuery->have_posts()): $worksQuery->the_post(); ?>
                  <div class="splide__slide p-homeWork__item">
                    <a href="<?php the_permalink(); ?>">
                      <div class="p-homeWork__thumb">
                        <?php if (has_post_thumbnail()): ?>
                          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="388" height="218" loading="lazy">
                        <?php else: ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/temp/no-image.webp" alt="no image" width="388" height="218" loading="lazy">
                        <?php endif; ?>
                      </div>
                      <p class="p-homeWork__title"><?php the_title(); ?></p>
                      <div class="p-homeWork__content">
                        <p class="p-homeWork__name">使用言語</p>
                        <p class="p-homeWork__text"><?php the_field('worksLang'); ?></p>
                      </div>
                      <div class="p-homeWork__content">
                        <p class="p-homeWork__name">制作期間</p>
                        <p class="p-homeWork__text"><?php the_field('worksTime'); ?></p>
                      </div>
                    </a>
                  </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
              </div>
            </div>
          </div>
          <a class="p-homeWork__link c-linkBtn white-color" href="<?php echo esc_url(home_url('/works/')); ?>">他の制作実績を見る</a>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="p-homeLink">
    <div class="p-homeLink__inner l-inner">
      <h2 class="c-homeHead fadeInUpScroll"><span class="jp">これやってます</span>LINK</h2>
      <div class="p-homeLink__list fadeInUpScroll">
        <a href="https://github.com/yokoyokocom" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/link_github.webp" alt="GitHub" loading="lazy"></a>
        <a href="https://qiita.com/yokoyokocom" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/link_qiita.webp" alt="Qiita" loading="lazy"></a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>