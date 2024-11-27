<template>
    <Admin>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking Ruangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Booking Meeting</li>
                    </ol>
                </div>
                </div>
            </div>
        </section>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form</h3>
                        </div>
                        <form @submit.prevent="saveBookingRuangan()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="agenda">Agenda</label>
                                    <textarea v-model="form.agenda" id="agenda" class="form-control" placeholder="Input agenda anda"></textarea>
                                    <div v-if="errors.agenda" class="text-danger">{{ errors.agenda }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bagian</label>
                                    <input type="text" class="form-control" id="bagian" v-model="form.bagian" disabled>
                                    <div v-if="errors.bagian" class="text-danger">{{ errors.bagian }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Ruang Meeting</label>
                                    <multiselect v-model="form.ruang_meeting" :options="options" placeholder="Pilih Ruangan" />
                                    <div v-if="errors.ruang_meeting" class="text-danger">{{ errors.ruang_meeting }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <VueDatePicker v-model="form.tanggal" :format="format"/>
                                    <div v-if="errors.tanggal" class="text-danger">{{ errors.tanggal }}</div>
                                </div>
                                <div class="form-group">
                                    <lable for="mulai_meeting">Mulai Meeting</lable>
                                    <input v-model="form.mulai_meeting" type="time" class="form-control">
                                    <div v-if="errors.mulai_meeting" class="text-danger">{{ errors.mulai_meeting }}</div>
                                </div>
                                <div class="form-group">
                                    <lable for="selesai_meeting">Selesai Meeting</lable>
                                    <input v-model="form.selesai_meeting" type="time" class="form-control">
                                    <div v-if="errors.selesai_meeting" class="text-danger">{{ errors.selesai_meeting }}</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </Admin>
</template>
<script setup>
import Admin from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from 'vue';
import Multiselect from 'vue-multiselect';
import VueDatePicker from '@vuepic/vue-datepicker';
import { useToast } from "vue-toastification";

const props = defineProps({
    bagian: String,
    errors: Object
})

const toast = useToast();

const form = useForm({
    agenda: '',
    bagian: props.bagian,
    ruang_meeting: '',
    tanggal: '',
    mulai_meeting: '',
    selesai_meeting: '',
})

const options = ref([
  'Aula', 'Lantai 2', 'Lantai 3', 'Lantai 4', 'Lantai 8 A', 'Lantai 8 B', 'Lantai 10 A'
]);

const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}

const saveBookingRuangan = async () => {
    await form.post(route('ruangan.booking-store'), {
        onSuccess: () => {
            toast.success("Berhasil booking ruangan!");
            form.reset();
        },
        onError: () => {
            toast.error("Gagal booking ruangan silahkan coba lagi");
        },
    });
}
</script>

<style>
@import "vue-multiselect/dist/vue-multiselect.css";
@import '@vuepic/vue-datepicker/dist/main.css';
@import 'vue3-timepicker/dist/VueTimepicker.css';
</style>
