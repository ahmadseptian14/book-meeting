<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar bg-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
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
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Ruangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link :href="route('ruangan.index')" class="nav-link">
                                    <p>Data Booking Ruangan</p>
                                </Link>
                                <Link :href="route('ruangan.booking')" class="nav-link">
                                    <p>Booking Ruangan</p>
                                </Link>
                            </li>
                        </ul>
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
</style>
