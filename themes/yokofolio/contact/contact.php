<?php
/*
Template Name: お問い合わせ
*/
?>

<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>
<main class="p-contact">
  <div class="p-contact__bg">
    <div class="p-contact__inner l-inner">
      <div class="p-contact__box">
        <div class="p-contact__none">メールサーバーが無いため、ご用の方は<br><a href="mailto:yottya1226@gmail.com">yottya1226@gmail.com</a><br>までご連絡ください。</div>
        <form class="p-form" action="<?php echo esc_url(home_url('/contact/confirm/')); ?>">
          <div class="p-form__content">
            <p class="p-form__title">お名前<span class="p-form__require"></span></p>
            <input type="text" name="contactName" placeholder="ぽーと ふぉり男">
          </div>
          <div class="p-form__content">
            <p class="p-form__title">メールアドレス<span class="p-form__require"></span></p>
            <input type="text" name="contactMail" placeholder="yahoo@gmail.com">
          </div>
          <div class="p-form__content">
            <p class="p-form__title">お問い合わせ内容<span class="p-form__require"></span></p>
            <textarea name="contactContent" rows="4"></textarea>
          </div>
          <p class="p-form__error"></p>
          <div class="p-form__btn">
            <button class="submit" type="submit">入力内容を確認</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<script>
  const formSubmit = document.querySelector('.submit');
  const formError = document.querySelector('.p-form__error');
  formSubmit.addEventListener('click',function(e){
    e.preventDefault();
    formError.classList.add('show');
    formError.textContent = 'メールサーバーが無いため確認画面にいけません';
    formSubmit.textContent = 'ダメ';
  });
</script>

<?php get_footer(); ?>