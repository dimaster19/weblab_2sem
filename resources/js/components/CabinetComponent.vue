<template>
    <h1>Личный кабинет</h1>
    <p>Добрый день {{ name }}!</p>
    <p>Это личный кабинет пользователя сайта.</p>
</template>

<script>
export default {
    data: () => ({
        name: null,
    }),

    mounted() {
        axios
            .post('/cabinet')
            .then(response =>{
                this.name = response['data'];
            } )
            .catch(error => {
                console.log(error);
                this.name = 'Error';

            })
    }
}
</script>


