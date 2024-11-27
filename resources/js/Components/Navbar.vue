<template>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
            <li class="nav-item pt-1">
                <form @submit.prevent="logout()">
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

const toast = useToast();

const form = useForm({});

const logout = async () => {
    await form.post(route('logout'), {
        onSuccess: () => {
            toast.success('Berhasil Logout');
        },
        onError: () => {
            toast.error('Gagal logout. Silahkan coba lagi')
        }
    })
}
</script>
