
<template>
    
    <h1>Вход в личный кабинет</h1>
    <form method="post" action="/signin">
        <input type="hidden" name="_token" :value="csrf">
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                   required maxlength="255" value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Ваш пароль"
                   required maxlength="255" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info text-white">Войти</button>
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


