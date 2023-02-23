
<template>
   <form method="post" action="/signup">
        <input type="hidden" name="_token" :value="csrf">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
                   required maxlength="255"  value="">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                   required maxlength="255"  value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Придумайте пароль"
                   required maxlength="255" minlength="8" value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password_confirmation"
                   placeholder="Пароль еще раз" minlength="8" required maxlength="255" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info text-white">Регистрация</button>
        </div>
    </form> 

</template>

<script>
 export default {
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          }),        
    }
</script>
