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
                    <li class="breadcrumb-item"><Link :href="route('index')">Home</Link></li>
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
                        <div class="d-flex justify-content-end mb-3 position-relative">
                            <div class="input-group w-25">
                                <input
                                    type="text"
                                    v-model="searchQuery"
                                    placeholder="Cari"
                                    class="form-control rounded-5 pe-5"
                                />
                                <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <Link :href="route('ruangan.booking')" class="btn bg-primary-2 text-white">Booking Ruangan</Link>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bagian</th>
                                    <th>Ruangan</th>
                                    <th>Agenda</th>
                                    <th>Tanggal Booking</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(ruangan, index) in ruangans.data" :key="index">
                                    <td>{{ (ruangans.current_page - 1) * ruangans.per_page + (index + 1) }}</td>
                                    <td>{{ ruangan.bagian }}</td>
                                    <td>{{ ruangan.ruang_meeting }}</td>
                                    <td>{{ ruangan.agenda }}</td>
                                    <td>{{ ruangan.tanggal }}</td>
                                    <td>{{ ruangan.mulai_meeting }}</td>
                                    <td>{{ ruangan.selesai_meeting }}</td>
                                    <td>
                                        <button type="submit" class="btn bg-primary-2 text-white" @click="deleteBooking(ruangan.id)"><i class="fa fa-trash"></i></button>
                                    </td>
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
import { useForm, router, Link } from "@inertiajs/vue3";
import { useToast } from "vue-toastification"
import { ref, watch } from "vue";

defineProps({
  ruangans: [Object, Array]
});

const toast = useToast();
const searchQuery = ref("");
const form = useForm({});

const searchRuangans = () => {
    router.get(route('ruangan.index'), { search: searchQuery.value }, {
        preserveState: true, // Untuk mempertahankan state pagination
        replace: true,      // Supaya tidak reload halaman
    });
};

// Watcher untuk memantau perubahan di searchQuery
watch(searchQuery, (newValue) => {
    searchRuangans();
});

const deleteBooking = async (bookingId) => {
    await form.delete(route('ruangan.booking-delete', bookingId), {
        preserveState: true, // Menjaga pagination tetap di halaman saat ini
        preserveScroll: true, // Tidak menggeser posisi halaman`
        onSuccess: () => {
            toast.success("Berhasil menghapus data booking ruangan!");
        },
        onError: () => {
            toast.error("Gagal menghapus data booking ruangan");
        },
    });
};
</script>

<style scoped>
.bg-primary-2 {
    background: #1d0c59;
}
.bg-primary-2:hover {
    background: #17094a; /* Warna ketika di-hover */
}
</style>
