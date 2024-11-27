<template>
    <aside class="main-sidebar bg-primary-2 elevation-4">
            <a href="index3.html" class="brand-link">
            <img src="/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <Link :href="route('index')" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <b>
                                Dashboard
                            </b>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('ruangan.index')" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Data Booking Ruangan
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('ruangan.booking')" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Booking Ruangan
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('ruangan.booking')" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Booking Vicon
                            </p>
                        </Link>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<style scoped>
.nav-sidebar .nav-link {
    color: white !important;
}
a{
    color: white !important;
    text-decoration: none;
}
.bg-primary-2 {
    background: #1d0c59;
}
</style>
