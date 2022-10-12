<?php
/*
Template Name: Форма записи
*/
?>
<?php get_header('page'); ?>
<main class="page-main page-main--page page-main--write-us">
  <div class="page-main__wrapper page-main__wrapper--write-us">

    <section class="write-us">

      <h2 class="write-us__title">Пожалуйста, заполните форму
        ниже:</h2>

      <form class="write-us__form" action="#" id="form">

        <div class="write-us__cssload cssload__wrapper">
          <div class="cssload">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
          </div>
        </div>
        <div class="write-us__wrapper">
          <div class="write-us__contacts-wrapper">
            <fieldset class="write-us__name text-input text-input--name">
              <p class="text-input__item">
                <label class="text-input__title" for="text-input__surname">Фамилия</label>
                <input class="text-input__input _req" id="text-input__surname" type="text" name="surname"
                  placeholder="Укажите фамилию *">
              </p>
              <p class="text-input__item">
                <label class="text-input__title" for="text-input__name">Имя</label>
                <input class="text-input__input _req" id="text-input__name" type="text" name="name"
                  placeholder="Введите ваше имя *">
              </p>
              <p class="text-input__item">
                <label class="text-input__title" for="text-input__middle-name">Отчество</label>
                <input class="text-input__input _req" id="text-input__middle-name" type="text" name="middle-name"
                  placeholder="Укажите ваше отчество *">
              </p>
            </fieldset>
          </div>
          <div class="write-us__contacts-wrapper">
            <fieldset class="write-us__contacts text-input text-input--contacts">
              <legend class="text-input__title text-input__title--contacts">Контактная информация</legend>
              <ul class="text-input__list">
                <li class="text-input__item text-input__item--phone">
                  <label class="text-input__title text-input__title--phone" for="phone">Номер телефона </label>
                  <input class="text-input__input text-input__input--phone _req" type="tel" name="phone" id="phone"
                    placeholder="Номер, пожалуйста *">
                </li>

                <li class="text-input__item text-input__item--email">
                  <label class="text-input__title text-input__title--email" for="mail">Адрес почты </label>
                  <input class="text-input__input text-input__input--email _email" type="email" name="mail" id="mail"
                    placeholder="Введите почту">
                </li>
              </ul>
            </fieldset>


            <fieldset class="write-us__age text-input text-input--age">
              <label class="text-input__title" for="text-input__age">Возраст ребенка</label>
              <select class="text-input__select" id="text-input__age" type="select" name="age">
                <option class="text-input__option">5</option>
                <option class="text-input__option">6</option>
                <option class="text-input__option">7</option>
                <option class="text-input__option">8</option>
                <option class="text-input__option">9</option>
                <option class="text-input__option">10</option>
                <option class="text-input__option">11</option>
                <option class="text-input__option">12</option>
                <option class="text-input__option">13</option>
                <option class="text-input__option">14</option>
                <option class="text-input__option">15</option>
                <option class="text-input__option">16</option>
                <option class="text-input__option">17</option>
              </select>
              <span>лет.</span>
            </fieldset>
          </div>
        </div>

        <h4 class="spoiler__title">Выберите направление</h4>
        <div class="input-radio__container">

          <?php 
            $edu_arr = get_field('educational_focus'); 
            $count = 1;
            foreach($edu_arr as $edu_id):
              $course_str = get_field('educational_course', $edu_id);
              $course_arr = explode(",", $course_str); 
          ?>

          <details class="write-us__spoiler">
            <summary class="input-radio__title"><?php the_field('educational_title', $edu_id); ?></summary>
            <fieldset class="write-us__input-radio input-radio">
              <ul class="input-radio__list">
                <?php 
                foreach($course_arr as $course_name): 
              ?>
                <li class="input-radio__item">
                  <input class="input-radio__input visually-hidden" id="radio-<?php echo $count; ?>" type="radio"
                    name="course" value="<?php echo $course_name;?>,<?php the_field('educational_title', $edu_id);?>">
                  <label class="input-radio__label"
                    for="radio-<?php echo $count; ?>"><?php echo $course_name; ?></label>
                </li>
                <?php 
                $count = $count + 1; 
                endforeach; 
              ?>
              </ul>
            </fieldset>
          </details>
          <?php 
            $count = $count + 1;
            endforeach;
          ?>
        </div>

        <fieldset class="write-us__comment text-input text-input--comment">
          <legend class="text-input__title text-input__title--comment">Комментарий</legend>
          <textarea class="text-input__comment" id="text-input__message-text" name="text" rows="10"
            placeholder="Если остались вопросы, можете задать их здесь"></textarea>
        </fieldset>

        <fieldset class="write-us__agreement input-checkbox input-checkbox--agreement">
          <input class="input-checkbox__input visually-hidden _req" id="checkbox-1" type="checkbox" name="agreement">
          <label class="input-checkbox__label" for="checkbox-1">Я даю свое <a
              href="<?php the_field('agreement_file'); ?>">согласие</a> на обработку персональных
            данных.</label>
        </fieldset>

        <div class="write-us__feedback">
          <button class="write-us__button button button-send" type="submit">Отправить заявку</button>
          <span class="write-us__legend"><b>*</b> — Обязательные для заполнения поля</span>
        </div>
      </form>

    </section>

  </div>
</main>
<div class="visually-hidden" id="google-container" data-uri="<?php echo get_template_directory_uri(); ?>"></div>
<?php get_footer('form'); ?>
