
<template>
    <div style=" width: 300px; position: relative; margin: 20px auto ;">
        <DropZone :acceptedFiles="['xlsx']" @errorAdd="onError" :maxFiles="Number(1)"
            url="http://127.0.0.1:8000/file-import" method="POST" :uploadOnDrop="true" :multipleUpload="false"
            :parallelUpload="1" :headers="csrfHeader">
            <input type="hidden" name="csrf-token" :value="csrfToken">
        </DropZone>
    </div>




    <!-- Модалка -->
    <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Заказать звонок</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" v-on:click="closeModal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    Не то
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { DropZone } from 'dropzone-vue';

export default defineComponent({
    components: {
        DropZone,
    },
    setup() {
        return {
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
            csrfHeader: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }
    },
    methods: {
        onError() {
            document.getElementsByClassName('modal')[0].style.display = "block"
        },
        // modal
        closeModal() {

            document.getElementsByClassName('modal')[0].style.display = "none"

        }
    }
});



</script>


