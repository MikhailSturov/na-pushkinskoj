"use strict"

const writeUsForm = document.querySelector(".write-us__form");
const popupSuccessful = document.querySelector(".popup-successful");
const closePopup = popupSuccessful.querySelector(".button-close");

if (writeUsForm) {

  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form');
    form.addEventListener('submit', formSend);
    async function formSend(e) {
      e.preventDefault();
      let error = formValidate(form);
      let formData = new FormData(form);
      if (error === 0) {
        form.classList.add('_sending');
        let response = await fetch( '/wp-content/themes/skyland/mail/mail.php' , {
          method: 'POST',
          body: formData
        });
        if (response.ok) {
          form.reset();
          form.classList.remove('_sending');
          popupSuccessful.classList.remove("popup-successful--inactive");
        } else {
          alert('Ошибка');
          form.classList.remove('_sending');
        }
      } else {
        alert('Заполните обязательные поля');
      }
    }

    if (closePopup) {
      closePopup.addEventListener("click", function (evt) {
        evt.preventDefault();
        popupSuccessful.classList.add("popup-successful--inactive");
      });
    }

    function formValidate(form) {
      let error = 0;
      let formReq = document.querySelectorAll('._req');
      for (let i = 0; i < formReq.length; i++) {
        const input = formReq[i];
        formRemoveError(input)
        if (input.classList.contains('_email')) {
          if (emailTest(input)) {
            formAddError(input);
            error++;
          }
        } else if (input.getAttribute("type") === "checkbox" && input.checked === false) {
          formAddError(input);
          error++;
        } else {
          if (input.value === '') {
            formAddError(input);
            error++;
          }
        }
      }
      return error;

      function formAddError(input) {
        input.classList.add('_error');
      }

      function formRemoveError(input) {
        input.classList.remove('_error');
      }

      function emailTest(input) {
        return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
      }
    }
  });


}





