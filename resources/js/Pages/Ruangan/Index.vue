<template>
    <Admin>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Booking Ruangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Booking Meeting</li>
                    </ol>
                </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                           <div class="d-flex justify-content-end mb-3">
                                <input
                                type="text"
                                v-model="searchQuery"
                                placeholder="Cari agenda, bagian, atau ruang meeting..."
                                class="form-control w-25"
                                />
                                <button @click="searchRuangans()" class="btn btn-primary ml-2">Cari</button>
                           </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Booking</h3>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bagian</th>
                                    <th>Agenda</th>
                                    <th>Tanggal Booking</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(ruangan, index) in ruangans.data" :key="index">
                                    <td>{{ (ruangans.current_page - 1) * ruangans.per_page + (index + 1) }}</td>
                                    <td>{{ ruangan.bagian }}</td>
                                    <td>{{ ruangan.agenda }}</td>
                                    <td>{{ ruangan.tanggal }}</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="card-footer clearfix">
                                <Pagination class="mt-4 mb-4 flex justify-end" :links="ruangans.links" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Admin>
</template>
<script setup>
import Admin from "@/Layouts/AdminLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { useForm, router } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
  ruangans: [Object, Array]
});

const searchQuery = ref("");

const searchRuangans = () => {
    router.get(route('ruangan.index'), { search: searchQuery.value });
};
</script>
