<template>
    <div class="container mt-5">
        <h2>Login</h2>
        <form @submit.prevent="submit()">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input v-model="form.email" type="email" id="email" class="form-control" />
                <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input v-model="form.password" type="password" id="password" class="form-control" />
                <div v-if="errors.password" class="text-danger">{{ errors.password }}</div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";

defineProps({ errors:Object })

const form = useForm({
    email: '',
    password: '',
});

const toast = useToast();

const submit = async () => {
    await form.post(route('login'), {
        onSuccess: (response) => {
            console.log(response);
            toast.success('Login berhasil!');
        },
        onError: (errors) => {
            console.log(errors);
            toast.error('Login gagal. Silakan cek input Anda.');
        },
    });
};
</script>
