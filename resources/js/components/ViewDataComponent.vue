
<script>

export default {

    props: [
        'accountings'
    ],
    data() {
        return {
            elem: null,
            page: 10,

        };
    },
    created() { 

        console.log(this.accountings)
        this.elem = this.accountings['links']
        console.log(Object.keys(this.elem).length) // last elem of arr ['links']
        this.accountings['links'][0]['label'] = 'Prev'
         this.accountings['links'][Object.keys(this.elem).length - 1]['label'] = 'Next'

        
    },
    methods: {
        clickCallback: function (el, elem) {

            elem = $(el).text()
            console.log(elem);
            axios
                .get('/view-data?page=')
                .then(response => {
                })
                .catch(error => {
                    console.log(error);
                })
        },
    },
};
</script>
<template>
    <h1>Data</h1>
    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course</th>
                <th scope="col">Group</th>
                <th scope="col">Subject</th>
                <th scope="col">Lectures</th>
                <th scope="col">Practices</th>
                <th scope="col">Labs</th>
                <th scope="col">Moduls</th>
                <th scope="col">Consultations_Sem</th>
                <th scope="col">Consultations_Ex</th>
                <th scope="col">Tests</th>
                <th scope="col">CourseWorks</th>
                <th scope="col">DiplomasBak</th>
                <th scope="col">DiplomasSpec</th>
                <th scope="col">DiplomasMag</th>
                <th scope="col">PracticeManagements</th>
                <th scope="col">StateExams</th>
                <th scope="col">TotalHours</th>
                <th scope="col">Month</th>
                <th scope="col">Type</th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="accounting in this.accountings.data">
                <th scope="row">{{ accounting.id }}</th>
                <th scope="row">{{ accounting.Course }}</th>
                <th scope="row">{{ accounting.Group }}</th>
            <th scope="row">{{ accounting.Subject }}</th>
            <th scope="row">{{ accounting.Lectures }}</th>
                <th scope="row">{{ accounting.Practices }}</th>
                <th scope="row">{{ accounting.Labs }}</th>
                <th scope="row">{{ accounting.Moduls }}</th>
                <th scope="row">{{ accounting.Consultations_Sem }}</th>
                <th scope="row">{{ accounting.Consultations_Ex }}</th>
                <th scope="row">{{ accounting.Tests }}</th>
                <th scope="row">{{ accounting.CourseWorks }}</th>
                <th scope="row">{{ accounting.DiplomasBak }}</th>
                <th scope="row">{{ accounting.DiplomasSpec }}</th>
                <th scope="row">{{ accounting.DiplomasMag }}</th>
                <th scope="row">{{ accounting.PracticeManagements }}</th>
                <th scope="row">{{ accounting.StateExams }}</th>
                <th scope="row">{{ accounting.TotalHours }}</th>
                <th scope="row">{{ accounting.Month }}</th>
                <th scope="row">{{ accounting.Type }}</th>
            </tr>
        </tbody>



    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" v-for="link in this.accountings.links"><a class="page-link" v-bind:href="link.url">
                    <div v-if="link.label == '&laquo; Previous'">Prev</div>
                    <div v-else-if="link.label == 'Next &raquo;'">Next</div>
                    <div v-else> {{ link.label }}</div>
                </a>
            </li>
        </ul>
    </nav>
    <!-- <paginate v-model="page" :page-count="this.accountings.last_page" :click-handler="clickCallback(this, elem)"
                :prev-text="'Prev'" :next-text="'Next'" :container-class="'pagination'" :page-class="'page-item'">
            </paginate>  -->
    <div class=""><button type="button" class="btn btn-primary">Primary</button></div>
</template>




