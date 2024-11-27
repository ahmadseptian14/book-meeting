<template>
    <div class="container mt-5">
        <h2>Register</h2>
        <form @submit.prevent="submit()">
            <div class="mb-3">
                <label for="name" class="form-label">Orgeh</label>
                <input v-model="form.orgeh" type="text" id="orgeh" class="form-control" />
                <div v-if="errors.orgeh" class="text-danger">{{ errors.orgeh }}</div>
            </div>
            <div class="mb-3">
                <label for="bagian" class="form-label">Bagian</label>
                <input v-model="form.bagian" type="text" id="bagian" class="form-control" />
                <div v-if="errors.bagian" class="text-danger">{{ errors.bagian }}</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input v-model="form.password" type="password" id="password" class="form-control" />
                <div v-if="errors.password" class="text-danger">{{ errors.password }}</div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" id="password_confirmation" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

defineProps({ errors: Object })

const form = useForm({
    orgeh: '',
    bagian: '',
    password: '',
    password_confirmation: '',
});

console.log(form);

const toast = useToast(); // Inisialisasi Toast

const submit = async () => {
    await form.post(route('register'), {
        onSuccess: (response) => {
            console.log(response);
            toast.success('Register berhasil!'); // Notifikasi sukses
        },
        onError: (errors) => {
            console.log(errors);
            toast.error('Register gagal. Silakan cek input Anda.'); // Notifikasi error
        },
    });
};
</script>
