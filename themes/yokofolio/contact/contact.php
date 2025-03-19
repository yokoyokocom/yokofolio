<?php
/*
Template Name: お問い合わせ
*/
?>

<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>
<main class="contact">
  <div class="contact__bg">
    <div class="contact__wrap">
      <div class="contact__box">
        <p class="contact__none">今、メールサーバー無い</p>
        <form class="form" action="<?php echo esc_url(home_url('/contact/confirm/')); ?>">
          <div class="form__content">
            <p class="form__title">お名前<span class="form__require"></span></p>
            <input type="text" name="contactName" placeholder="たろう">
          </div>
          <div class="form__content">
            <p class="form__title">メールアドレス<span class="form__require"></span></p>
            <input type="text" name="contactMail" placeholder="yahoo@gmail.com">
          </div>
          <div class="form__content">
            <p class="form__title">お問い合わせ内容<span class="form__require"></span></p>
            <textarea name="contactContent" placeholder="メールサーバーください" rows="4"></textarea>
          </div>
          <p class="form__error"></p>
          <div class="form__btn">
            <button class="submit" type="submit">入力内容を確認</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<script>
  const formSubmit = document.querySelector('.submit');
  const formError = document.querySelector('.form__error');
  formSubmit.addEventListener('click',function(e){
    e.preventDefault();
    formError.classList.add('show');
    formError.textContent = 'メールサーバーが無いため確認画面にいけません';
    formSubmit.textContent = 'ダメ';
  });
</script>

<?php get_footer(); ?>