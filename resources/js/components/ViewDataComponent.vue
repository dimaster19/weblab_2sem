
<script>

export default {

    props: [
        'accountings'
    ],
    data() {
        return {
            elem: null,
            page: 10,
            newaccountings: this.accountings.data,
            nextpage: null,
            course: null,
            group: null,
            subject: null,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            modalType: null,
            dbID: null

        };
    },
    created() {


        this.elem = this.accountings['links']
        this.nextpage = this.accountings['current_page'] + 1
        console.log(this.nextpage)

        console.log(Object.keys(this.elem).length) // last elem of arr ['links']
        this.accountings['links'][0]['label'] = 'Prev'
        this.accountings['links'][Object.keys(this.elem).length - 1]['label'] = 'Next'


    },
    methods: {
        btnClick: function () {

            axios
                .get('/getdata?page=' + this.nextpage)
                .then(response => {
                    this.newaccountings = response.data.data
                    console.log(response)
                    console.log(this.newaccountings[0])
                    document.getElementById("lazy").style.display = "table-row-group";
                    document.getElementById("lazybutton").style.display = "none";


                })
                .catch(error => {
                    console.log(error);
                })
        },

        actionClick: function () {
            if (this.modalType === 'add') {

                this.group = document.getElementById("group").value
                this.course = document.getElementById("course").value
                this.subject = document.getElementById("subject").value
                console.log(this.group + ' - ' + this.course + ' - ' + this.subject)
                if (this.group && this.course && this.subject) {
                    axios
                        .post('/add-data', {
                            group: this.group,
                            course: this.course,
                            subject: this.subject,
                        })
                        .then(response => {

                            console.log(response)
                            if (response.data === 'added') alert('?????????????? ??????????????????')

                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                else alert('?????????????????? ?????? ????????')
            }
            else if (this.modalType === 'remove') {
                this.dbID = document.getElementById("del-input").value
                if (this.dbID) {
                    axios
                        .post('/del-data', {
                            id: this.dbID,
                        })
                        .then(response => {

                            console.log(response)
                            alert(response.data)

                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                else alert('?????????????? ID ????????????')

            }

            else if (this.modalType === 'edit') {
                this.dbID = document.getElementById("search-input").value
                this.group = document.getElementById("group").value
                this.course = document.getElementById("course").value
                this.subject = document.getElementById("subject").value
                if (this.dbID) {
                    axios
                        .post('/edit-data', {
                            id: this.dbID,
                            group: this.group,
                            course: this.course,
                            subject: this.subject,
                        })
                        .then(response => {

                            console.log(response)
                            alert(response.data)

                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                else alert('?????????????? ID ????????????')

            }



        },

        closeModal: function () {

            document.getElementsByClassName('addmodalbutton')[0].style.display = "none";
            document.getElementsByClassName('editmodalbutton')[0].style.display = "none";
            document.getElementById('course').removeAttribute('disabled');
            document.getElementById('group').removeAttribute('disabled');
            document.getElementById('subject').removeAttribute('disabled');
            document.getElementById('update-div').style.display = "none";
            document.getElementById('del-div').style.display = "none";

        },

        modalClick: function (e) {
            console.log(e)
            if (e !== 'removemodalbutton') document.getElementsByClassName(e)[0].style.display = "block";
            if (e === 'editmodalbutton') {
                document.getElementById('update-div').style.display = "flex";
                this.modalType = 'edit'
            }
            else if (e === 'removemodalbutton') {
                document.getElementById('del-div').style.display = "flex";
                document.getElementById('course').setAttribute('disabled', '');
                document.getElementById('group').setAttribute('disabled', '');
                document.getElementById('subject').setAttribute('disabled', '');
                this.modalType = 'remove'
            }
            else {
                this.modalType = 'add'

            }

            console.log(document.getElementsByClassName(e)[0]);

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
        <tbody id="lazy" style="display: none;">
            <tr v-for="accounting in this.newaccountings">
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

                    <div> {{ link.label }}</div>
                </a>
            </li>
        </ul>
    </nav>

    <div class="d-flex w-100 justify-content-center">

        <button type="button" id="lazybutton" v-on:click="btnClick" class="btn btn-primary mx-2">?????? ????????????</button>

        <button type="button" id="addmodalbutton" @click="modalClick($event.target.id)" class="btn btn-primary mx-2"
            data-bs-toggle="modal" data-bs-target="#addModal">????????????????</button>
        <button type="button" id="editmodalbutton" @click="modalClick($event.target.id)" class="btn btn-primary mx-2"
            data-bs-toggle="modal" data-bs-target="#addModal">????????????????</button>
        <button type="button" id="removemodalbutton" @click="modalClick($event.target.id)" class="btn btn-primary mx-2"
            data-bs-toggle="modal" data-bs-target="#addModal">??????????????</button>
    </div>


    <!-- crud operations -->

    <!-- Add -->


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" v-on:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" disabled>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Course</span>
                            <input type="text" id="course" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Group</span>
                            <input type="text" id="group" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Subject</span>
                            <input type="text" id="subject" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <div id="update-div" style="display: none!important;">
                        <input type="text"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                            class="form-control" id="search-input" placeholder="ID">

                    </div>
                    <div id="del-div" style="display: none!important;">
                        <input type="text"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                            class="form-control" id="del-input" placeholder="ID">
                        <button type="button" id='del-by-id-button' v-on:click="actionClick"
                            class="btn btn-primary del-by-id-button">Del</button>
                    </div>

                    <button type="button" id='addbutton' class="btn btn-primary  addmodalbutton" style="display: none;"
                        v-on:click="actionClick">Save</button>
                    <button type="button" id='editbutton' class="btn btn-primary editmodalbutton" style="display: none"
                        v-on:click="actionClick">Edit</button>
                

                </div>
            </div>
        </div>
    </div>
</template>




