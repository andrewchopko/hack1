function checkForm(form)
  {
    if(form.password.value == "" && form.repassword.value == "") {
      alert("Помилка! Поле \"Пароль\" не може бути пустим.");
      form.password.focus();
      return false;
    }

    if(form.password.value != form.repassword.value ) {
      alert("Помилка! Паролі не ідентичні.");
      form.repassword.focus();
      return false;
    }

    return true;
  }